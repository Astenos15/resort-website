<x-layout>
    <x-section>
        @php
            // Get the first file in public/storage/home
            $files = glob(public_path('storage/contact/*'));
            $image = count($files) > 0 ? asset('storage/contact/' . basename($files[0])) : null;
        @endphp
        <div class="max-w-4xl text-slate-700">
            <div class="mb-12">
                <img src="{{ $image }}" alt="contact image">
            </div>
            <div
                class="prose mb-6 [&>ul]:list-disc [&>ul]:pl-[15px] [&>ul]:font-semibold [&>ul]:text-amber-600 leading-8 tracking-wide">
                <h2 class="text-2xl font-bold text-amber-600 mb-2">How to Book a Room</h2>
                {!! $contact->booking_text !!}
            </div>
            <div class="mb-8 leading-8 tracking-wide">
                <h2 class="text-2xl font-bold text-amber-600 mb-2">How to find us</h2>
                {!! $contact->directions_text !!}
            </div>
            <div>
                <p class="font-semibold"><em>"We look forward to welcoming you to our resort! Thank you for your
                        understanding as we provide
                        personalized booking assistance"</em></p>
            </div>
        </div>
    </x-section>
</x-layout>
