<section class="my-32">
    <div class="mx-auto md:px-8">
        <div class="space-y-5 sm:text-center sm:max-w-md sm:mx-auto">
            <h1 class="text-gray-800 text-3xl font-bold sm:text-4xl">News</h1>
        </div>
        <ul class="grid gap-x-8 gap-y-10 mt-16 sm:grid-cols-2 lg:grid-cols-3">
            {{ $post }}
        </ul>
        <div class="mt-8 space-y-5 sm:text-center sm:max-w-md sm:mx-auto flex justify-center">
            <button
                class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none">
                <a href="{{ route('post.index') }}">See More</a>
            </button>
        </div>

    </div>
</section>
