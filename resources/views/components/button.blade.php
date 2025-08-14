@props([
    'type' => 'button',
])

@php
    $classes = match ($type) {
        'submit'
            => 'bg-amber-600 text-amber-50 border-1 border-amber-600 hover:bg-amber-500 hover:border-amber-500 hover:translate-y-[-2px] hover:shadow-lg active:translate-y-0 active:shadow-0 transition-all duration-300',
        'delete'
            => 'bg-red-600 text-red-50 border-1 border-red-600  hover:bg-red-500 hover:border-red-500 hover:text-amber-50 hover:translate-y-[-2px] hover:shadow-lg active:translate-y-0 active:shadow-0 transition-all duration-300',
        'transparent'
            => 'bg-transparent text-slate-950 border-1 border-slate-950 hover:bg-slate-950 hover:border-slate-950 hover:text-amber-50 hover:translate-y-[-2px] hover:shadow-lg active:translate-y-0 active:shadow-0 transition-all duration-300',
    };
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
