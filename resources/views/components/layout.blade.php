<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Library CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css">
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

    {{-- App CSS --}}
    @production
        <link rel="stylesheet" href="{{ vite_asset('resources/js/app.js', 'css') }}">
    @else
        @vite('resources/js/app.js')
    @endproduction

    {{-- Library JS (deferred for speed) --}}
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <script src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js" defer></script>

    {{-- Title --}}
    <title>Resort</title>
</head>

<body class="bg-amber-50 text-slate-950">
    <div class="grid grid-rows-[auto_1fr_auto] h-screen">
        <header>
            <x-nav />
        </header>
        <main>{{ $slot }}</main>
        <x-footer />
    </div>

    {{-- Your Dropzone config (runs after libraries load) --}}
    <script defer>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof Dropzone !== 'undefined') {
                Dropzone.options.galleryDropzone = {
                    paramName: "image",
                    maxFilesize: 2,
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
            } else {
                console.error("Dropzone library not loaded!");
            }
        });
    </script>

    {{-- App JS --}}
    @production
        <script src="{{ vite_asset('resources/js/app.js') }}" defer></script>
    @endproduction
</body>

</html>
