@section('css')
<style>
    .dropzone.dropzone-default .dz-remove {
        font-size: 12px!important;
    }
</style>
@endsection
@php
    $status = config('adminstatus');
    //if($model['sowater_id']){
        $model['sowater_id'] = explode(',', $model['sowater_id']);
    //}
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
    <label>Background color</label>
    <input type="text" name="background" class="form-control form-control-solid" value="{{old('background')??$model->background}}" placeholder="#cccccc"/>
    @error('background')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Link join us</label>
    <input type="text" name="link_join_us" class="form-control form-control-solid" value="{{old('link_join_us')??$model->link_join_us}}" placeholder="Link"/>
    @error('link_join_us')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
<div class="form-group">
    <label>Sowater/Artist</label>

    <select class="form-control selectpicker" name="sowater_id[]" multiple data-actions-box="true">
        @foreach (App\Models\Sowater::getList2() as $c)
            <option value="{{$c['id']}}" {{ in_array($c['id'],$model['sowater_id']) ? 'selected' : '' }}>{{$c['full_name']}}</option>
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
    <label>Cover Detail Desk</label>
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
{{-- <div class="form-group">
    <label>Cover Detail Mobile</label>
    <div class="custom-file">
        <input name="cover_banner" type="file" class="custom-file-input" id="customFile2"/>
        <label class="custom-file-label" for="customFile2">Choose file</label>
    </div>
    @if(!empty($model->cover_detail))
        <div style="padding-top:10px">
            <img src="{{asset('uploads/'.$model->cover_detail)}}" width="100"/>        
        </div>
    @endif
    @error('cover_banner')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div> --}}
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
    <label>Media</label>
    <textarea name="photos" id="photos">{{old('photos')??$model->photos}}</textarea>
    @error('photos')
        <div class="fv-plugins-message-container">
            <div data-field="memo" data-validator="notEmpty" class="fv-help-block">{{$message}}</div>
        </div>
    @enderror
</div>
{{-- <div class="form-group">
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
</div> --}}
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
    <label>Status</label>
    <select class="form-control form-control-solid" name="status">
        @foreach($status as $key => $st)
            <option value="{{$key}}" {{ $model['status'] === $key ? 'selected' : '' }}>{{$st}}</option>
        @endforeach
    </select>
</div>
@section('js')
<script src="{{asset('assets/admin/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.6')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js?v=7.0.6')}}"></script>
<script>
    //Define an adapter to upload the files
    class MyUploadAdapter {
       constructor(loader) {
          // The file loader instance to use during the upload. It sounds scary but do not
          // worry — the loader will be passed into the adapter later on in this guide.
          this.loader = loader;

          // URL where to send files.
          this.url = '{{ route('ckeditor.upload') }}';

          //
       }
       // Starts the upload process.
       upload() {
          return this.loader.file.then(
             (file) =>
                new Promise((resolve, reject) => {
                   this._initRequest();
                   this._initListeners(resolve, reject, file);
                   this._sendRequest(file);
                })
          );
       }
       // Aborts the upload process.
       abort() {
          if (this.xhr) {
             this.xhr.abort();
          }
       }
       // Initializes the XMLHttpRequest object using the URL passed to the constructor.
       _initRequest() {
          const xhr = (this.xhr = new XMLHttpRequest());
          // Note that your request may look different. It is up to you and your editor
          // integration to choose the right communication channel. This example uses
          // a POST request with JSON as a data structure but your configuration
          // could be different.
          // xhr.open('POST', this.url, true);
          xhr.open("POST", this.url, true);
          xhr.setRequestHeader("x-csrf-token", "{{ csrf_token() }}");
          xhr.responseType = "json";
       }
       // Initializes XMLHttpRequest listeners.
       _initListeners(resolve, reject, file) {
          const xhr = this.xhr;
          const loader = this.loader;
          const genericErrorText = `Couldn't upload file: ${file.name}.`;
          xhr.addEventListener("error", () => reject(genericErrorText));
          xhr.addEventListener("abort", () => reject());
          xhr.addEventListener("load", () => {
             const response = xhr.response;
             // This example assumes the XHR server's "response" object will come with
             // an "error" which has its own "message" that can be passed to reject()
             // in the upload promise.
             //
             // Your integration may handle upload errors in a different way so make sure
             // it is done properly. The reject() function must be called when the upload fails.
             if (!response || response.error) {
                return reject(response && response.error ? response.error.message : genericErrorText);
             }
             // If the upload is successful, resolve the upload promise with an object containing
             // at least the "default" URL, pointing to the image on the server.
             // This URL will be used to display the image in the content. Learn more in the
             // UploadAdapter#upload documentation.
             resolve({
                default: response.url,
             });
          });
          // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
          // properties which are used e.g. to display the upload progress bar in the editor
          // user interface.
          if (xhr.upload) {
             xhr.upload.addEventListener("progress", (evt) => {
                if (evt.lengthComputable) {
                   loader.uploadTotal = evt.total;
                   loader.uploaded = evt.loaded;
                }
             });
          }
       }
       // Prepares the data and sends the request.
       _sendRequest(file) {
          // Prepare the form data.
          const data = new FormData();
          data.append("upload", file);
          // Important note: This is the right place to implement security mechanisms
          // like authentication and CSRF protection. For instance, you can use
          // XMLHttpRequest.setRequestHeader() to set the request headers containing
          // the CSRF token generated earlier by your application.
          // Send the request.
          this.xhr.send(data);
       }
       // ...
    }

    function SimpleUploadAdapterPlugin(editor) {
       editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
          // Configure the URL to the upload script in your back-end here!
          return new MyUploadAdapter(loader);
       };
    }

    //Initialize the ckeditor
    ClassicEditor.create(document.querySelector("#content"), {
       extraPlugins: [SimpleUploadAdapterPlugin],
    }).catch((error) => {
       console.error(error);
    });
    // ClassicEditor.create(document.querySelector("#photos"), {
    //     extraPlugins: [SimpleUploadAdapterPlugin],
    //     ckfinder: {
    //         uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
    //     },
    //     toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ],
    //     startupMode: 'source'
    // }).catch((error) => {
    //    console.error(error);
    // });
</script>
<script>
    CKEDITOR.replace('photos', {
        // allowedContent: 'h1 h2 h3 h4 h5 h6 p span a[!href,!target]',
        height: '800px',
        'filebrowserBrowseUrl' : '{{route('ckfinder_browser')}}',
                //'filebrowserBrowseUrl' : '{{asset("ckfinder/ckfinder.html")}}',
                //  'filebrowserImageBrowseUrl' : '{{asset("ckfinder/ckfinder.html")}}',
                //  'filebrowserFlashBrowseUrl' : '{{asset("ckfinder/ckfinder.html?type=Flash")}}',
                //  'filebrowserUploadUrl' : '{{asset("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")}}',
                //  'filebrowserImageUploadUrl' : '{{asset("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")}}',
                //  'filebrowserFlashUploadUrl' : '{{asset("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")}}',
    //  filebrowserWindowWidth: '1000',
    //  filebrowserWindowHeight: '700'
   });
 </script>
 <script scr="/js/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
// var KTCkeditor = function () {
//     // Private functions
//     var demos = function () {
//         ClassicEditor
//             .create( document.querySelector( '#content' ),{
//                 ckfinder: {
//                     uploadUrl: '{{route('ckeditor.upload').'?_token='.csrf_token()}}'
//                 }
//             } )
//             .then( editor => {
//                 console.log( editor );
//             } )
//             .catch( error => {
//                 console.error( error );
//             } );
//     }
//     return {
//         // public functions
//         init: function() {
//             demos();
//         }
//     };
// }();
// // Initialization
// jQuery(document).ready(function() {
//     KTCkeditor.init();
// });
</script>
@php 
// $listItem = []; 
$id = 0;
// if($model->id){
//     $id = $model->id;
//     $items = App\Models\Gallery::getList($model->id, 0, App\Helpers\Enum::PROJECT);
//     foreach($items as $item){
//         $tmp = [];
//         $tmp['photo'] = $item->photo;
//         $tmp['name'] = $item->original_name;
//         $tmp['size'] = $item->file_size;
//         $tmp['type'] = $item->file_size;
//         $tmp['accepted'] = true;
//         $tmp['id'] = $item->id;
//         array_push($listItem, $tmp);
//     }
// }
@endphp
<script type="text/javascript">
    // var uploadedDocumentMap = {}
    // $('#kt_dropzone_2').dropzone({
    //     url: "{{route('admin.uploadfile')}}", // Set the url for your upload script location
    //     paramName: "files", // The name that will be used to transfer the file
    //     maxFiles: 20,
    //     maxFilesize: 4, // MB
    //     headers: {
    //         'X-CSRF-TOKEN': "{{ csrf_token() }}"
    //     },
    //     params: {"event_id": "{{$id}}", "type": 2},
    //     acceptedFiles: ".jpeg,.jpg,.png,.gif",
    //     init:function() {
    //         @if(!empty($listItem) && count($listItem)>0)
    //         var files = {!! json_encode($listItem) !!}
    //         for (var i in files) {
    //             var file = files[i]
    //             this.options.addedfile.call(this, file)
    //             file.previewElement.classList.add('dz-complete')
    //             this.options.thumbnail.call(this, file, "{{asset('uploads')}}/" + files[i].photo);
    //         }
    //         @endif
    //     },
    //     addRemoveLinks: true,
    //     removedfile: function(file) {
    //         var name = file.photo;             
    //         var id = file.id;
    //         $.ajax({
    //             type: 'post',
    //             dataType: 'json',
    //             headers: {
    //                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
    //             },
    //             url: '{{route('admin.deletefile')}}',
    //             data: {name: name, id: id},
    //             sucess: function(data){
    //                 console.log('success: ' + data);
    //             }
    //         });
    //         var _ref;
    //         return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    //     },
    //     success: function (file, response) {
    //         // $('form').append('<input type="hidden" name="listfiles[]" value="' + response.name + '">')
    //         // uploadedDocumentMap[file.name] = response.name
    //         $('#fileStatus').html('File upload success')
    //         var value = $("#gallery_id").val();
    //         var newValue =(value ? (value + ",") : "") + response.id;
    //         $("#gallery_id").val(newValue);
    //     },
    //     accept: function(file, done) {
    //         done();
    //     }
    // });
</script>
@endsection