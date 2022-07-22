@php
    $status = config('adminstatus');
    $type = [1 => 'Sowater', 'Artist', 'Both']
@endphp
@section('css')
<style>
    .dropzone.dropzone-default .dz-remove{
        font-size: 12px!important;
    }
</style>
@endsection
{{-- <div class="form-group">
    <label>Sowater Name</label>
    <input name="name" type="text" value="{{old('name')??$model['name']}}" class="form-control form-control-solid" placeholder="Sowater Name" />
    @error('name')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div> --}}
<div class="form-group">
    <label>Full Name</label>
    <input name="full_name" type="text" value="{{old('full_name')??$model['full_name']}}" class="form-control form-control-solid" placeholder="Full Name" />
    @error('full_name')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
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
    <label>Priority</label>
    <input name="priority" type="text" value="{{old('priority')??$model['priority']}}" class="form-control form-control-solid" placeholder="Priority" />
    @error('priority')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Background color</label>
    <input type="text" name="background" class="form-control form-control-solid" value="{{old('background')??$model->background}}" placeholder="#cccccc"/>
    @error('background')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
{{-- <div class="form-group">
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
</div> --}}
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
    <label>About</label>
    <textarea name="about" id="content">{{old('about')??$model->about}}</textarea>
    @error('about')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Biography</label>
    <textarea name="biography" id="content2">{{old('biography')??$model->biography}}</textarea>
    @error('biography')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Sowater/Artist</label>
    <select class="form-control form-control-solid" name="type">
        @foreach($type as $key => $st)
            <option value="{{$key}}" {{ $model['type'] === $key ? 'selected' : '' }}>{{$st}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
<h3>SEO</h3>
</div>
<div class="form-group">
    <label>Meta Title</label>
    <input type="text" name="meta_title" class="form-control form-control-solid" value="{{old('meta_title')??$model->meta_title}}" placeholder="Meta title"/>
    @error('meta_title')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Meta Description</label>
    <textarea class="form-control" name="meta_description" id="meta_desc">{{old('meta_description')??$model->meta_description}}</textarea>
    @error('meta_description')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Meta thumnail</label>
    <div class="custom-file">
        <input name="meta_thumnail_upload" type="file" class="custom-file-input" id="customFiles"/>
        <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
    @if(!empty($model->meta_thumnail))
        <div style="padding-top:10px">
            <img src="{{asset('uploads/'.$model->meta_thumnail)}}" width="100"/>        
        </div>
    @endif
    @error('meta_thumnail_upload')
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
            ClassicEditor
                .create( document.querySelector( '#content2' ) )
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
    @endsection