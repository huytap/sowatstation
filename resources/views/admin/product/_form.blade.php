@section('css')
<style>
    .dropzone.dropzone-default .dz-remove {
        font-size: 12px!important;
    }
</style>
@endsection
@php
    $status = config('adminstatus');
@endphp
<div class="form-group">
    <label>Title</label>
    <input name="title" type="text" value="{{old('title')??$model['title']}}" class="form-control form-control-solid" placeholder="Title" />
    @error('title')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Sub title</label>
    <input name="sub_title" type="text" value="{{old('sub_title')??$model['sub_title']}}" class="form-control form-control-solid" placeholder="sub_title" />
    @error('sub_title')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Sowater</label>
    <select name="sowater_id" class="form-control form-control-solid">
        <option value="">Select sowater</option>
        @foreach (App\Models\Sowater::getList() as $c)
            <option value="{{$c['id']}}" {{ $c['id'] === $model['sowater_id'] ? 'selected' : '' }}>{{$c['full_name']}}</option>
        @endforeach
    </select>
    @error('category_id')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Cover List</label>
    <div class="custom-file">
        <input name="cover_upload_mobile" type="file" class="custom-file-input" id="customFile"/>
        <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
    @if(!empty($model->cover_mobile))
        <div style="padding-top:10px">
            <img src="{{asset('uploads/'.$model->cover_mobile)}}" width="100"/>        
        </div>
    @endif
    @error('cover_upload_mobile')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Cover Detail</label>
    <div class="custom-file">
        <input name="cover_upload" type="file" class="custom-file-input" id="customFile"/>
        <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
    @if(!empty($model->cover))
        <div style="padding-top:10px">
            <img src="{{asset('uploads/'.$model->cover)}}" width="100"/>        
        </div>
    @endif
    @error('cover_upload')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Description</label>
    <textarea name="description" id="content">{{old('description')??$model->description}}</textarea>
    @error('description')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Photos</label>
    <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_2">
        <div class="dropzone-msg dz-message needsclick">
            <h3 class="dropzone-msg-title">Drop files here and auto upload.</h3>
        </div>
    </div>
    @if(!empty($model->photos))
        <div style="padding-top:10px">
            <img src="{{asset('uploads/'.$model->photos)}}" width="100"/>        
        </div>
    @endif
    @error('photo_upload')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="alert alert-custom alert-outline-success fade show mb-5" role="alert">
    <div class="alert-icon"><i class="flaticon2-bell-4"></i></div>
    <div class="alert-text" id="fileStatus"></div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
<input type="hidden" id="gallery_id" name="gallery_id" value="">
<div class="form-group">
    <label>Status</label>
    <select class="form-control form-control-solid" name="status">
        @foreach($status as $key => $st)
            <option value="{{$key}}" {{ $model['status'] === $key ? 'selected' : '' }}>{{$st}}</option>
        @endforeach
    </select>
</div>
@section('js')
<script src="{{asset('assets/admin/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.6')}}"></script>
<script type="text/javascript">
var KTCkeditor = function () {
    // Private functions
    var demos = function () {
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    }
    return {
        // public functions
        init: function() {
            demos();
        }
    };
}();
// Initialization
jQuery(document).ready(function() {
    KTCkeditor.init();
});
</script>
@php 
$listItem = []; 
$id = 0;
if($model->id){
    $id = $model->id;
    $items = App\Models\Gallery::getList($model->id, 0, App\Helpers\Enum::PRODUCT);
    foreach($items as $item){
        $tmp = [];
        $tmp['photo'] = $item->photo;
        $tmp['name'] = $item->original_name;
        $tmp['size'] = $item->file_size;
        $tmp['type'] = $item->file_size;
        $tmp['accepted'] = true;
        $tmp['id'] = $item->id;
        array_push($listItem, $tmp);
    }
}
@endphp
<script type="text/javascript">
    var uploadedDocumentMap = {}
    $('#kt_dropzone_2').dropzone({
        url: "{{route('admin.uploadfile')}}", // Set the url for your upload script location
        paramName: "files", // The name that will be used to transfer the file
        maxFiles: 20,
        maxFilesize: 4, // MB
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        params: {"event_id": "{{$id}}", "type": 3},
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        init:function() {
            @if(!empty($listItem) && count($listItem)>0)
            var files = {!! json_encode($listItem) !!}
            for (var i in files) {
                var file = files[i]
                this.options.addedfile.call(this, file)
                file.previewElement.classList.add('dz-complete')
                this.options.thumbnail.call(this, file, "{{asset('uploads')}}/" + files[i].photo);
            }
            @endif
        },
        addRemoveLinks: true,
        removedfile: function(file) {
            var name = file.photo;             
            var id = file.id;
            $.ajax({
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: '{{route('admin.deletefile')}}',
                data: {name: name, id: id},
                sucess: function(data){
                    console.log('success: ' + data);
                }
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        success: function (file, response) {
            // $('form').append('<input type="hidden" name="listfiles[]" value="' + response.name + '">')
            // uploadedDocumentMap[file.name] = response.name
            $('#fileStatus').html('File upload success')
            var value = $("#gallery_id").val();
            var newValue =(value ? (value + ",") : "") + response.id;
            $("#gallery_id").val(newValue);
        },
        accept: function(file, done) {
            done();
        }
    });
</script>
@endsection