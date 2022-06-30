@section('css')
<style>
    .dropzone.dropzone-default .dz-remove {
        font-size: 12px!important;
    }
</style>
@endsection
@php
    $menu_current = 'Home Slide';
    $menu_current_sub = '';
    $route_parent = 'slide.index';
@endphp
@extends('layouts.admin')
@section('content')
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <h3 class="card-title">{{$menu_current_sub}}</h3>
    </div>
    <form class="form" action="{{route('slide.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value={{date('Y-m-d H:m:i')}}" name="created_at">
        <div class="card-body">
            <div class="form-group form-group-last">
                <div class="alert alert-custom alert-default" role="alert">
                    <div class="alert-icon">
                        <span class="svg-icon svg-icon-primary svg-icon-xl">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path
                                        d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z"
                                        fill="#000000"
                                        opacity="0.3"
                                    ></path>
                                    <path
                                        d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z"
                                        fill="#000000"
                                        fill-rule="nonzero"
                                    ></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <div class="alert-text">Drop files here and auto upload.</div>   
                </div>
            </div>
            <div class="form-group">
                <label>Home Slides</label>
                <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_2">
                    <div class="dropzone-msg dz-message needsclick">
                        <h3 class="dropzone-msg-title">Drop files here and auto upload.</h3>
                    </div>
                </div>
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
        </div>
    </form>
</div>
@endsection
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
if(!empty($items))
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
        params: {'event_id':0, 'type':0},
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
            // var value = $("#gallery_id").val();
            // var newValue =(value ? (value + ",") : "") + response.id;
            // $("#gallery_id").val(newValue);
        },
        accept: function(file, done) {
            done();
        }
    });
</script>
@endsection