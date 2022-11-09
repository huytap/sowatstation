class MyUploadAdapter {
    constructor(loader) {
       this.loader = loader;
       this.url = urlUpload;
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
       const data = new FormData();
       data.append("upload", file);
       this.xhr.send(data);
    }
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
 ClassicEditor.create(document.querySelector("#photos"), {
    extraPlugins: [SimpleUploadAdapterPlugin, SourceEditing], 
 }).then(editor => {
     window.editor = editor;
 }).catch((error) => {
    console.error(error);
 });

 function SourceEditing(editor1){
     const source = document.querySelector('#photos');
     const source_toggle = document.createElement('button');
     source_toggle.textContent = 'Source mode'
     source_toggle.classList.add('source-toggle');
     source_toggle.setAttribute('aria-pressed', 'false');
     source_toggle.setAttribute('type', 'button');
     source_toggle.addEventListener('click', function() {
         const editor = $("#photos").next().find('.ck-editor__main');
         if (source_toggle.getAttribute('aria-pressed') === 'false') {
             source_toggle.setAttribute('aria-pressed', 'true');
             source.value = window.editor.getData();
             $(editor).css('display', 'none');
             source.style.display = 'block';
         }
         else {
             source_toggle.setAttribute('aria-pressed', 'false');
             window.editor.setData(source.value);
             $(editor).css('display', 'block');
             source.style.display = 'none';
         }
     });
    setTimeout(function(){
        const editor_toolbar = $("#photos").next().find('.ck-toolbar').append(source_toggle);
    }, 1000);
 }