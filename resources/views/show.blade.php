<x-guest-layout>
    <div class="bg-purple-400 h-screen">
    @include('naviweb')
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="w-full h-auto">
        <div class="grid grid-cols-3 w-full bg-white">
            <div class="mt-4 col-span-2 p-4">
                @livewire('showpost')
            </div>
            <div class="px-4 bg-purple-100">
                <div class="m-2">
                    @include('front.sidebar')
                </div>
            </div>
        </div>
    </div>
    @include('footer')
    </div>
</x-guest-layout>
