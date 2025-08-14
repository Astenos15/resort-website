<x-layout>
    <x-section id="facilities">
        @php
            // Get the first file in public/storage/home
            $files = glob(public_path('storage/facility/*'));
            $image = count($files) > 0 ? asset('storage/facility/' . basename($files[0])) : null;
        @endphp
        <div class="max-w-4xl mt-8 md:mt-0">
            <div class="mb-8">
                <img src="{{ $image }}" alt="facility image" class="object-cover">
            </div>
            <div class="facilities prose tracking-wide">
                <x-title>Facilities</x-title>
                {!! $facilities->facilities_text ?? null !!}
            </div>
        </div>
    </x-section>
</x-layout>
