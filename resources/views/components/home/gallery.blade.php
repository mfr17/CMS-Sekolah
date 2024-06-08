<section class="my-32">
    <div class="mx-auto md:px-8">
        <div class="space-y-5 sm:text-center sm:max-w-md sm:mx-auto">
            <h1 class="text-gray-800 text-3xl font-bold sm:text-4xl">Gallery</h1>
        </div>
        <ul class="grid gap-x-4 gap-y-16 mt-16 sm:grid-cols-2 lg:grid-cols-3">
            {{ $gallery }}
        </ul>
        <div class="mt-8 sm:text-center">
            <button
                class="block mx-auto px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none">
                See More
            </button>
        </div>
    </div>
</section>
