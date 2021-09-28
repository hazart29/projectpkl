<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Post') }}
        </h2>
    </x-slot>

    <div class="md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @livewire('post-crud')
        </div>
    </div>
</x-app-layout>
<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
</div>
