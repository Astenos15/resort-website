<x-layout>
    <x-section id="home-edit">
        <div class="md:w-3/4 lg:w-1/2 shadow-lg">
            <form method="POST" action="/home" class="bg-white p-2 md:p-8" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h2 class="text-2xl text-amber-600 font-bold">Edit Homepage</h2>
                <div class="flex flex-col mt-6 mb-4">
                    <label for="image" class="py-2 font-bold">Upload Image</label>
                    <input type="file" id="image" name="image" class="bg-slate-100 p-2">
                    @error('image')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label for="hero_text" class="py-2 font-bold">Write Text</label>
                    <input type="text" id="hero_text" name="hero_text" class="bg-slate-100 p-2"
                        value="{{ old('hero_text', $home->hero_text ?? '') }}">
                    @error('hero_text')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <x-button type="submit" class="px-6 py-1">Submit</x-button>
            </form>
        </div>


        @if (session('success') || session('error') || session('warning') || session('info'))
            <script>
                Swal.fire({
                    icon: '{{ session('success') ? 'success' : (session('error') ? 'error' : (session('warning') ? 'warning' : 'info')) }}',
                    title: '{{ session('success') ? 'Success' : (session('error') ? 'Error' : (session('warning') ? 'Warning' : 'Info')) }}',
                    text: '{{ session('success') ?? (session('error') ?? (session('warning') ?? session('info'))) }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif
    </x-section>
</x-layout>
