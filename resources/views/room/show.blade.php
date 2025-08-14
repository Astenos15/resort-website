<x-layout>
    <x-section>
        <div class="flex flex-col max-w-4xl text-slate-700">
            <div class="mb-4 lg:h-[600px]">
                <img src="{{ $room->image_path }}" alt="room image" class="h-full w-full object-cover">
            </div>
            <h2 class="flex justify-between text-2xl font-bold mb-12 pb-2 border-b border-b-slate-400">
                {{ $room->title }}<span>₱{{ $room->price }}</span>
            </h2>
            <h2 class="text-2xl font-bold mb-2">Inclusions</h2>
            <div
                class="[&>ul]:flex [&>ul]:flex-col [&>ul]:lg:flex-row [&>ul]:lg:items-center [&>ul]:gap-2 [&>ul]:tracking-wider mb-12">
                {!! $room->inclusions !!}
            </div>
            <h2 class="text-2xl font-bold mb-2">Details</h2>
            <div class="[&>div]:tracking-wider mb-6">
                {!! $room->details !!}
            </div>
            <div class="mt-6 flex items-center justify-between">
                <div>
                    <a href="/rooms"
                        class="inline-block border-1 border-slate-700 py-1 px-4  hover:bg-slate-600 hover:text-amber-50 transition-all duration-300">Back</a>
                    <a href="/contacts"
                        class="inline-block border-1 border-amber-600 bg-amber-600 py-1 px-4 text-amber-50 hover:border-amber-500  hover:bg-amber-500 hover:text-amber-50 transition-all duration-300">Book
                        Now</a>
                </div>

                <div class="flex items-center gap-2">
                    <a href="/rooms/edit/{{ $room->id }}"
                        class="inline-block px-4 py-1 bg-blue-500 border-1 border-blue-500 text-amber-50 hover:bg-blue-400 hover:translate-y-[-2px] hover:shadow-lg active:translate-y-0 active:shadow-0 transition-all duration-300">Edit</a>
                    <form id="delete-form-{{ $room->id }}" method="POST" action="/rooms/{{ $room->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                            class="py-1 px-4 text-amber-50 border-1 border-red-600 bg-red-600 hover:bg-red-500 hover:translate-y-[-2px] hover:shadow-lg active:translate-y-0 active:shadow-0 transition-all duration-300"
                            onclick="confirmDelete({{ $room->id }})">
                            Delete
                        </button>
                    </form>
                </div>

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
