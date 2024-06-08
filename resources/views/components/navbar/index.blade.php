<nav class="bg-sky-500 border-gray-200 py-2.5 dark:bg-sky-900">
    <div class="flex flex-wrap items-center justify-between max-w-screen-2xl px-4 mx-auto">
        <a href="/" class="flex items-center">
            <img src="./images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Logo" />
        </a>
        <div class="flex items-center lg:order-2">

            <button data-collapse-toggle="mobile-menu-2" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-300  lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-sky-800 dark:focus:ring-gray-400"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0 list-none">
                <li>
                    <x-navbar.link href="{{ route('home') }}">Beranda</x-navbar.link>
                </li>
                <li>
                    <x-navbar.link href="{{ route('profile') }}">Profil</x-navbar.link>
                </li>
                <li>
                    <x-navbar.link href="{{ route('major') }}">Program Keahlian</x-navbar.link>
                </li>
                <li>
                    <x-navbar.link href="{{ route('contact') }}">Kontak</x-navbar.link>
                </li>
                <li>
                    <x-navbar.link href="https://e-rapor.smkn1sebulu.sch.id">E-Rapor</x-navbar.link>
                </li>

            </ul>
        </div>
    </div>
</nav>
