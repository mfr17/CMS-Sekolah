<section class="my-32 text-center">
    <div class="flex justify-center">
        <div class="max-w-[800px]">
            <h2 class="mb-2 text-2xl font-bold tracking-tight md:text-3xl xl:text-4xl">
                {{ $title }}
            </h2>
            <p class="text-xl font-light text-black dark:text-primary-400">
                {{ $content }}
            </p>
        </div>
    </div>
</section>
<section class="mb-32">
    <div class="flex flex-wrap">
        {{ $images }}
        {{ $messages }}
    </div>
</section>
