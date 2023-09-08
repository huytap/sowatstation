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
    <input name="sub_title" type="text" value="{{old('sub_title')??$model['sub_title']}}" class="form-control form-control-solid" placeholder="Sub Title" />
    @error('sub_title')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Event date</label>
    <input name="date" type="text" value="{{old('date')??$model['date']}}" class="form-control form-control-solid" placeholder="Date" />
    @error('date')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Location</label>
    <input name="location" type="text" value="{{old('location')??$model['location']}}" class="form-control form-control-solid" placeholder="Location" />
    @error('location')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Address</label>
    <input name="address" type="text" value="{{old('address')??$model['address']}}" class="form-control form-control-solid" placeholder="Address" />
    @error('address')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Artist</label>
    <select name="sowater_id" class="form-control form-control-solid">
        <option value="">--Select artist--</option>
    @foreach (App\Models\Sowater::getList() as $so)
    
        <option value="{{$so->id}}" {{ $model->sowater_id == $so->id ? 'selected' : '' }}>{{$so->full_name}}</option>
    @endforeach
    </select>
    @error('sowater_id')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Cover</label>
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
    <label>Banner</label>
    <div class="custom-file">
        <input name="banner_upload" type="file" class="custom-file-input" id="customFile"/>
        <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
    
    @if(!empty($model->banner))
        <div style="padding-top:10px">
            <img src="{{asset('uploads/'.$model->banner)}}" width="100"/>        
        </div>
    @endif
    @error('banner_upload')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Short description</label>
    <textarea name="short_desc" class="form-control form-control-solid" id="content_">{{old('short_desc')??$model->short_desc}}</textarea>
    @error('short_desc')
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
    <label>Gallery</label>
    <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_2">
        <div class="dropzone-msg dz-message needsclick">
            <h3 class="dropzone-msg-title">Drop files here and auto upload.</h3>
        </div>
    </div>
    @if(!empty($model->photo))
        <div style="padding-top:10px">
            <img src="{{asset('uploads/'.$model->photo)}}" width="100"/>        
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
    $items = App\Models\Gallery::getList($model->id);
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
        params: {"event_id": "{{$id}}"},
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