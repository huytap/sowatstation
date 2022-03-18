@php
    $status = config('adminstatus');
@endphp
@section('css')
<style>
    .dropzone.dropzone-default .dz-remove{
        font-size: 12px!important;
    }
</style>
@endsection
<div class="form-group">
    <label>Sowater Name</label>
    <input name="full_name" type="text" value="{{old('full_name')??$model['full_name']}}" class="form-control form-control-solid" placeholder="Sowater Name" />
    @error('full_name')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
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
    <label>Show On Homepage</label>
    <label class="checkbox">
        @if($model['show_homepage'] == 1)
            <input type="checkbox" name="show_homepage" checked />
        @else
            <input type="checkbox" name="show_homepage" {{ old('show_homepage')?'checked' : '' }} />
        @endif
        <span></span>
    </label>
    @error('show_homepage')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Show On Column</label>
    <input name="on_column" type="text" value="{{old('on_column')??$model['on_column']}}" class="form-control form-control-solid" />
    @error('on_column')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Avatar</label>
    <div class="custom-file">
        <input name="avatar_upload" type="file" class="custom-file-input" id="customFile"/>
        <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
    
    @if(!empty($model->avatar))
        <div style="padding-top:10px">
            <img src="{{asset('uploads/'.$model->avatar)}}" width="100"/>        
        </div>
    @endif
    @error('avatar_upload')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Avatar Hover</label>
    <div class="custom-file">
        <input name="avatarhover_upload" type="file" class="custom-file-input" id="customFile"/>
        <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
    
    @if(!empty($model->avatar_hover))
        <div style="padding-top:10px">
            <img src="{{asset('uploads/'.$model->avatar_hover)}}" width="100"/>        
        </div>
    @endif
    @error('avatarhover_upload')
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