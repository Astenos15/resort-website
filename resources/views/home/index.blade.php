<x-layout>
    <x-section id="hero">
        @php
            // Get the first file in public/storage/home
            $files = glob(public_path('storage/home/*'));
            $backgroundImage = count($files) > 0 ? asset('storage/home/' . basename($files[0])) : null;
        @endphp

        <style>
            #hero {

                background-image: linear-gradient(120deg,
                        #fffbeb 0%,
                        #fffbeb 50%,
                        transparent 50%),
                    url('{{ $backgroundImage }}');
                background-size: cover;
                background-position: center;
            }
        </style>

        <div class="grid md:grid-cols-2">
            <div class="relative text-center md:text-left">
                <div class="overlay absolute top-0 left-0 bg-amber-50 h-full w-full opacity-50 z-10 md:opacity-0">&nbsp;
                </div>
                <div class="z-20 relative">
                    <h1 class="text-4xl lg:text-8xl font-extrabold tracking-tighter mb-6">
                        {{ $home->hero_text ?? null }}
                    </h1>
                    <div class='flex gap-2 justify-center md:justify-start'>
                        <a href="/facilities"
                            class="inline-block px-6 py-2 border-1 border-slate-950  hover:text-amber-50 hover:translate-y-[-4px] hover:border-slate-950 hover:bg-slate-950 active:translate-y-0 transition-all duration-300">Learn
                            more</a>
                        <a href="/contacts"
                            class="inline-block px-6 py-2 border-1 border-amber-600 bg-amber-600 text-amber-50 hover:translate-y-[-4px] hover:border-amber-500 hover:bg-amber-500 active:translate-y-0 transition-all duration-300">Book
                            now</a>
                    </div>
                </div>

            </div>
        </div>
    </x-section>
</x-layout>
