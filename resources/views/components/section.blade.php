@props([
    'id' => 'section',
])

<section id="{{ $id }}" class="p-2 grid place-items-center h-full md:px-[96px] md:py-[40px] mb-auto">
    {{ $slot }}
</section>
