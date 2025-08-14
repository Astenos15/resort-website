<x-layout>
    <x-section id="home-edit">
        <div class="w-full shadow-lg">
            <form method="POST" action="/contacts" class="bg-white p-2 md:p-8" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h2 class="text-2xl text-amber-600 font-bold">Edit ContactPage</h2>
                <div class="flex flex-col mt-6 mb-4">
                    <label for="image" class="py-2 font-bold">Upload Image</label>
                    <input type="file" id="image" name="image" class="bg-slate-100 p-2" accept="image/*">
                    @error('image')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label for="booking_text" class="py-2 font-bold">Booking Instructions</label>
                    <input id="booking_text" type="hidden" name="booking_text"
                        value="{{ old('booking_text', $contact->booking_text) }}">
                    <trix-editor input="booking_text"></trix-editor>

                    @error('booking_text')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label for="directions_text" class="py-2 font-bold">"How to find you" Instructions</label>
                    <input id="directions_text" type="hidden" name="directions_text"
                        value="{{ old('directions_text', $contact->directions_text) }}">
                    <trix-editor input="directions_text"></trix-editor>

                    @error('directions_text')
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
