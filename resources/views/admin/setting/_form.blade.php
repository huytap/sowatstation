@php
    $status = config('adminstatus');
@endphp
<div class="form-group">
    @if(!isset($model['id']))
    <label for="">Chose Type</label>
    <select name="type" id="" class="form-control">
        <option value="0">Only Text Content</option>
        <option value="1">Only Text Normal</option>
        <option value="2">Text Content & Image</option>
        <option value="3">Text Normal & Image</option>
    </select>
    @endif
    <label>Key</label>
    @if($model['key'])
    <input readonly type="text" value="{{$model['key']}}" class="form-control form-control-solid" placeholder="Key" />
    @else
        <input name="key" type="text" value="{{old('key')??$model['key']}}" class="form-control form-control-solid" placeholder="Key" />
    @endif
    @error('key')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
@if(isset($model['type']) && in_array($model['type'], [2,3]))
<div class="form-group">
    <label>Image</label>
    <div class="custom-file">
        <input name="cover_upload" type="file" class="custom-file-input" id="customFile"/>
        <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
    @if(!empty($model->photo))
        <div style="padding-top:10px">
            <img src="{{asset('uploads/'.$model->photo)}}" width="100"/>        
        </div>
    @endif
    @error('cover_upload')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
@endif
<div class="form-group">
    <label>Value</label>
    <textarea name="value" id="content" class="form-control form-control-solid">{{old('value')??$model->value}}</textarea>
    @error('value')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
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
@if($model->type==0 || $model->type==2)
var KTCkeditor = function () {
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
        init: function() {
            demos();
        }
    };
}();
jQuery(document).ready(function() {
    KTCkeditor.init();
});
@endif
</script>
@endsection