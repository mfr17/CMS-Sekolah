<a {{ $attributes }} class="{{ request()->fullUrlIs(url($href)) ? 'hover:underline' : '' }}  me-4 md:me-6">
    {{ $slot }}
</a>
