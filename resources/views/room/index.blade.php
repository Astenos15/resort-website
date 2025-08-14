<x-layout>
    <x-section id="rooms">
        <div class="grid lg:grid-cols-2 gap-x-8 gap-y-12 max-w-6xl">
            @foreach ($rooms as $room)
                <div class="flex flex-col text-slate-600">
                    <div class="mb-4 h-[300px] md:h-[400px] overflow-hidden">
                        <img src="{{ $room->image_path }}" alt="resort room" class="h-full w-full object-cover">
                    </div>
                    <div class="mb-4">
                        <h2 class="text-2xl font-bold">{{ $room->title }}</h2>
                        {!! Str::words(strip_tags($room->details), 20, '...') !!}
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-lg font-bold">₱{{ $room->price }}</p>
                        <div>
                            <a href="/rooms/{{ $room->id }}"
                                class="inline-block py-1 px-4 border-1 border-slate-600  hover:bg-slate-600 hover:text-amber-50 transition-all duration-300">Learn
                                More</a>
                            <a href="/contact"
                                class="inline-block py-1 px-4 border-1 border-amber-600 bg-amber-600 text-amber-50 hover:bg-amber-700 hover:border-amber-700 transition-all duration-300">Book
                                Now</a>
                        </div>
                    </div>

                </div>
            @endforeach






        </div>
    </x-section>
</x-layout>
