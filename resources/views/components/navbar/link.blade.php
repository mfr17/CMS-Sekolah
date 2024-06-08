<a {{ $attributes }}
    class="{{ request()->fullUrlIs(url($href)) ? 'text-white bg-sky-700 lg:bg-transparent lg:text-sky-700 lg:p-0 dark:text-white' : 'text-gray-500 hover:bg-gray-50 lg:hover:bg-transparent lg:hover:text-sky-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-sky-600 dark:hover:text-white lg:dark:hover:bg-transparent' }} block py-2 pl-3 pr-4 ">
    {{ $slot }}
</a>
