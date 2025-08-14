<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Dropzone --}}
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css">
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    {{-- Swal --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Trix --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    {{-- Builds --}}
    @production
        <link rel="stylesheet" href="{{ vite_asset('resources/js/app.js', 'css') }}">
        <script src="{{ vite_asset('resources/js/app.js') }}" defer></script>
    @else
        @vite('resources/js/app.js')
    @endproduction

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

</body>

</html>
