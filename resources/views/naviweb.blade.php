<div class="px-4 py-5 sm:px-6 bg-purple-400 text-xl">
    <div class="grid grid-cols-4 gap-4 inline-block justify-center align-middle">
        <div class="">
            <!-- Will grow and shrink as needed taking initial size into account -->
            <a href="{{ route('index') }}">
                <x-jet-application-mark class="block h-8 w-auto" />
            </a>
        </div>
        <div class="col-span-3  text-center">
            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex justify-end">
                <x-jet-nav-link href="{{ route('index') }}" :active="request()->routeIs('index')">
                    {{ __('Home') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="{{ route('showpost') }}" :active="request()->routeIs('showpost')">
                    {{ __('Serba-serbi desa') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="{{ route('post') }}" :active="request()->routeIs('post')">
                    {{ __('Contact us') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                    {{ __('About') }}
                </x-jet-nav-link>
            </div>
        </div>
    </div>
</div>
