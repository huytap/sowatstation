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
    <label>Priority</label>
    <input name="priority" type="text" value="{{old('priority')??$model['priority']}}" class="form-control form-control-solid" placeholder="Priority" />
    @error('priority')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Link url</label>
    <input name="link_url" type="text" value="{{old('link_url')??$model['link_url']}}" class="form-control form-control-solid" placeholder="Link url" />
    @error('link_url')
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
    @if(!empty($model->photo))
        <div style="padding-top:10px">
            <img src="{{asset('uploads/'.$model->photo)}}" width="100"/>        
        </div>
    @endif
    @error('banner_upload')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Banner mobile</label>
    <div class="custom-file">
        <input name="banner_mobile" type="file" class="custom-file-input" id="customFile2"/>
        <label class="custom-file-label" for="customFile2">Choose file</label>
    </div>
    @if(!empty($model->photo_mobile))
        <div style="padding-top:10px">
            <img src="{{asset('uploads/'.$model->photo_mobile)}}" width="100"/>        
        </div>
    @endif
    @error('banner_mobile')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
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