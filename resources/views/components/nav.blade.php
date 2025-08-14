<nav class="flex justify-between items-center py-6 px-2  md:py-[40px] md:px-[96px]">
    <a href="/" class="inline-block">
        <div class="text-amber-600">
            <p class="text-xl font-extrabold">Dan Beach Resort</p>
            <p class="text-xs">San Narciso Zambales</p>
        </div>
    </a>

    {{-- main-nav --}}

    <ul class="hidden lg:flex gap-4">
        <li>
            <a href="/"
                class="{{ request()->is(['/', 'home/*']) ? 'text-amber-600 font-extrabold' : 'text-slate-700  hover:text-teal-500 transition-all duration-300 tracking-tight' }}">Home</a>
        </li>
        <li>
            <a href="/rooms"
                class="{{ request()->is('rooms*') ? 'text-amber-600 font-extrabold ' : 'text-slate-700  hover:text-teal-500 transition-all duration-300 tracking-tight' }}">Rooms</a>
        </li>
        <li>
            <a href="/facilities"
                class="{{ request()->is('facilities*') ? 'text-amber-600 font-extrabold ' : 'text-slate-700  hover:text-teal-500 transition-all duration-300 tracking-tight' }}">Facilities</a>
        </li>
        <li>
            <a href="/gallery"
                class="{{ request()->is('gallery*') ? 'text-amber-600 font-extrabold ' : 'text-slate-700  hover:text-teal-500 transition-all duration-300 tracking-tight' }}">See
                the Views</a>
        </li>
        <li>
            <a href="/blogs"
                class="{{ request()->is('blogs*') ? 'text-amber-600 font-extrabold ' : 'text-slate-700  hover:text-teal-500 transition-all duration-300 tracking-tight' }}">Stories
                & Tips </a>
        </li>
        <li>
            <a href="/contacts"
                class="{{ request()->is('contacts*') ? 'text-amber-600 font-extrabold ' : 'text-slate-700  hover:text-teal-500 transition-all duration-300 tracking-tight' }}">Book
                Your Stay</a>
        </li>
    </ul>

    <div class="lg:hidden" x-data="{ open: false }">
        <button class="border-1 border-amber-600 text-amber-600 p-1 cursor-pointer capitalize" x-on:click="open = !open"
            x-text="open ? 'close' : 'menu'" x-transition.duration.900ms></button>

        <ul x-show="open" @click.away="open = false" class="fixed right-4 bg-amber-50 p-8 flex-col gap-12 text-xl"
            x-transition.duration.300ms>
            <li>
                <a href="/"
                    class="{{ request()->is(['/', 'home/*']) ? 'text-amber-600 font-extrabold' : 'text-slate-700  hover:text-teal-500 transition-all duration-300 tracking-tight' }}">Home</a>
            </li>
            <li>
                <a href="/rooms"
                    class="{{ request()->is('rooms*') ? 'text-amber-600 font-extrabold ' : 'text-slate-700  hover:text-teal-500 transition-all duration-300 tracking-tight' }}">Rooms</a>
            </li>
            <li>
                <a href="/facilities"
                    class="{{ request()->is('facilities*') ? 'text-amber-600 font-extrabold ' : 'text-slate-700  hover:text-teal-500 transition-all duration-300 tracking-tight' }}">Facilities</a>
            </li>
            <li>
                <a href="/gallery"
                    class="{{ request()->is('gallery*') ? 'text-amber-600 font-extrabold ' : 'text-slate-700  hover:text-teal-500 transition-all duration-300 tracking-tight' }}">See
                    the Views</a>
            </li>
            <li>
                <a href="/blogs"
                    class="{{ request()->is('blogs*') ? 'text-amber-600 font-extrabold ' : 'text-slate-700  hover:text-teal-500 transition-all duration-300 tracking-tight' }}">Stories
                    & Tips </a>
            </li>
            <li>
                <a href="/contacts"
                    class="{{ request()->is('contacts*') ? 'text-amber-600 font-extrabold ' : 'text-slate-700  hover:text-teal-500 transition-all duration-300 tracking-tight' }}">Book
                    Your Stay</a>
            </li>
        </ul>
    </div>

</nav>
