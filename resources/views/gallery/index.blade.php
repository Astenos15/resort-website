<x-layout>
    <x-section id="gallery">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 max-w-4xl">
            @foreach ($galleryImages as $image)
                <a href="/gallery/{{ $image->id }}">
                    <div class="w-full h-full cursor-pointer">
                        <img src="{{ $image->image_path }}" alt="gallery image" class="h-full w-full">
                    </div>
                </a>
            @endforeach
        </div>
        {{-- Pagination Links --}}
        <div class="p-4">
            {{ $galleryImages->links() }}
        </div>
    </x-section>
</x-layout>
