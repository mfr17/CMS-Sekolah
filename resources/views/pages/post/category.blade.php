<x-app-layout>
    <div class="container mx-auto flex flex-wrap py-6">
        <header class="w-full container mx-auto">
            <div class="flex flex-col items-center py-12">
                @isset($categoryName)
                    <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                        Category : {{ $categoryName }}
                    </a>
                @endisset

            </div>
        </header>
        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            @foreach ($posts as $post)
                <article class="flex flex-col shadow my-4">
                    <!-- Article Image -->
                    <a href="{{ route('post.show', $post->slug) }}" class="hover:opacity-75">
                        @if (strpos($post->thumbnail, 'http') !== false)
                            <img src="{{ $post->thumbnail }}">
                        @else
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" class="h-96 object-contain">
                        @endif
                    </a>
                    <div class="bg-white flex flex-col justify-start p-6">
                        <a href="{{ route('post.category', $post->category) }}"
                            class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $post->category->name }}</a>
                        <a href="{{ route('post.show', $post->slug) }}"
                            class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
                        <p class="text-sm pb-3">
                            {{ $post->created_at->format('F j, Y') }}
                        </p>
                        <a href="{{ route('post.show', $post->slug) }}"
                            class="pb-6">{{ Str::limit($post->body, 150, '...') }}</a>
                        <a href="{{ route('post.show', $post->slug) }}"
                            class="uppercase text-gray-800 hover:text-black">Continue Reading <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            @endforeach

            <div class="flex items-center py-8">
                {{ $posts->links() }}
            </div>


        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">


            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Instagram</p>
                <div class="grid grid-cols-3 gap-3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=1">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=2">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=4">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=5">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=6">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=7">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=8">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=9">
                </div>
                <a href="#"
                    class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-instagram mr-2"></i> Follow @dgrzyb
                </a>
            </div>

        </aside>

    </div>
</x-app-layout>
