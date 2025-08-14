<x-layout>
    <x-section>
        <div class="flex flex-col max-w-4xl">
            <div class="mb-6">
                <img src="{{ $galleryImage->image_path }}" alt="gallery image">
            </div>
            <div class="flex gap-2">
                <a href="/gallery"
                    class="py-1 px-4 bg-amber-600 text-amber-50 hover:bg-amber-500 hover:translate-y-[-2px] hover:shadow-lg active:translate-y-0 active:shadow-0 transition-all duration-300">Back</a>
                <form id="delete-form-{{ $galleryImage->id }}" method="POST" action="/gallery/{{ $galleryImage->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button"
                        class="py-1 px-4 text-amber-50 bg-red-600 hover:bg-red-500 hover:translate-y-[-2px] hover:shadow-lg active:translate-y-0 active:shadow-0 transition-all duration-300"
                        onclick="confirmDelete({{ $galleryImage->id }})">
                        Delete
                    </button>
                </form>


            </div>
        </div>

        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            }
        </script>
    </x-section>
</x-layout>
