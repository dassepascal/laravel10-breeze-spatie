<nav x-data="{open : false}" class="bg-red-500">
    <div class="px-2 sm:px-4">
        <div class="flex items-center justify-between h-14">
            <img class="h-8" src="https://svgsilh.com/svg/42527.svg" alt="rabbit">
            <button @click="open = !open" class="md:hidden w-8 h-8 bg-red-700 text-gray-300 p-1 rounded-md focus:outline-none">
                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z">
                    </path>
                </svg>
            </button>
            @if(Route::has('login'))
                <div class="hidden md:block space-x-2">
                    @auth
                        <x-item title="Accueil" active="true"/>
                        <x-item title="Ventes"/>
                        <x-item title="Clients"/>
                        <x-item title="Produits"/>
                    @else
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-nav-link>
                        {{-- <x-item title="login" active="true"/> --}}
                        {{-- <x-item title="register"/> --}}
                    @endauth
                </div>
            @endif
            {{-- <div class="hidden md:block space-x-2">
                <x-item title="Accueil" active="true"/>
                <x-item title="Ventes"/>
                <x-item title="Clients"/>
                <x-item title="Produits"/>
            </div> --}}
        </div>
        <div :class="{'hidden' : open}" @click.away="open = false" class="md:hidden">
            @if (Route::has('login'))
                <div class="px-2 pb-2 space-y-1">
                    @auth
                        <x-item title="Accueil" active="true" block="true"/>
                        <x-item title="Ventes" block="true"/>
                        <x-item title="Clients" block="true"/>
                        <x-item title="Produits" block="true"/>
                    @else
                        <x-item title="login" active="true" block="true"/>
                        <x-item title="register" block="true"/>
                    @endauth
                </div>

            @endif
            {{-- <div class="px-2 pb-2 space-y-1">
                <x-item title="Accueil" active="true" block="true"/>
                <x-item title="Ventes" block="true"/>
                <x-item title="Clients" block="true"/>
                <x-item title="Produits" block="true"/>
            </div> --}}
        </div>
    </div>
</nav>
