<x-layout>
    <x-section>
        <div class="w-full text-slate-700">
            <x-title>Edit Room</x-title>
            <form method="POST" action="/rooms/{{ $room->id }}" class="bg-white p-4" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col lg:w-1/4 mb-2">
                    <label for="image" class="font-bold">Image Upload</label>
                    <input type="file" id="image" name="image" class="bg-slate-100 py-1 px-2" accept="image/*">
                    @error('image')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col lg:w-1/4 mb-2">
                    <label for="title" class="font-bold">Room Name</label>
                    <input type="text" id="title" name="title" class="bg-slate-100 py-1 px-2"
                        placeholder="VIP Room..." value="{{ old('title', $room->title) }}">
                    @error('title')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col lg:w-1/4 mb-6">
                    <label for="price" class="font-bold">Price</label>
                    <input type="text" id="price" name="price" class="bg-slate-100 py-1 px-2"
                        placeholder="8000" value="{{ old('price', $room->price) }}">
                    @error('price')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-4">
                    <label for="inclusions" class="py-2 font-bold">Inclusions</label>
                    <input id="inclusions" type="hidden" name="inclusions"
                        value="{{ old('inclusions', $room->inclusions) }}">
                    <trix-editor input="inclusions"></trix-editor>

                    @error('inclusions')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-4">
                    <label for="details" class="py-2 font-bold">Details</label>
                    <input id="details" type="hidden" name="details" value="{{ old('details', $room->details) }}">
                    <trix-editor input="details"></trix-editor>

                    @error('details')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <x-button type="submit" class="px-4 py-1">Submit</x-button>
                </div>
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
