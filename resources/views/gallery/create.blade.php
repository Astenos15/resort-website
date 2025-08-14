<x-layout>
    <x-section>
        <div>
            <x-title>Upload Gallery Images</x-title>
            <!-- Blade -->
            <form method="POST" action="/gallery" enctype="multipart/form-data" class="dropzone mt-6" id="gallery-dropzone">
                @csrf
            </form>
        </div>
    </x-section>

    <script>
        Dropzone.options.galleryDropzone = {
            paramName: "image",
            maxFilesize: 2, // MB
            acceptedFiles: '.jpg,.jpeg,.png,.gif,.avif',
            dictDefaultMessage: "Drag & drop images here or click to upload",

            success: function(file, response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Uploaded!',
                    text: 'Your image has been successfully uploaded.',
                    timer: 1500,
                    showConfirmButton: false
                });
                this.removeFile(file);
            },


            error: function(file, message) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: message
                });
            }
        };
    </script>

</x-layout>
