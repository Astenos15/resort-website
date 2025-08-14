<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Library CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    {{-- App CSS --}}
    @production
        <link rel="stylesheet" href="{{ vite_asset('resources/js/app.js', 'css') }}">
    @else
        @vite('resources/js/app.js')
    @endproduction

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


    {{-- Library JS (deferred for speed) --}}
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <script src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js" defer></script>

    {{-- App JS --}}
    @production
        <script src="{{ vite_asset('resources/js/app.js') }}" defer></script>
    @endproduction
</body>

</html>
