@php
    $status = config('adminstatus');
@endphp
<div class="form-group">
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
// var KTCkeditor = function () {
//     var demos = function () {
//         ClassicEditor
//             .create( document.querySelector( '#content' ) )
//             .then( editor => {
//                 console.log( editor );
//             } )
//             .catch( error => {
//                 console.error( error );
//             } );
//     }

//     return {
//         init: function() {
//             demos();
//         }
//     };
// }();
// jQuery(document).ready(function() {
//     KTCkeditor.init();
// });
</script>
@endsection