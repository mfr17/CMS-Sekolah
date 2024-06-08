<x-app-layout>

    <div class="container mx-auto flex flex-wrap">
        <x-header
            style="background-position: 50%; background-image: url({{ isset($heros[0]->image_path) ? $heros[0]->image_path : 'https://placehold.co/1200x500' }}); height: 100%;">
            <x-slot name="title">{{ isset($heros[0]->title) ? $heros[0]->title : 'Title' }}</x-slot>
            <x-slot name="description">{{ isset($heros[0]->description) ? $heros[0]->description : 'Content' }}</x-slot>
        </x-header>
        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3 pt-8">

            @foreach ($posts as $post)
                <article class="flex flex-col border border-slate-200 shadow-sm my-4">
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
                            {{ $post->publish_at->diffForHumans() }}
                        </p>
                        <a href="{{ route('post.show', $post->slug) }}" class="pb-6">{!! Str::limit($post->body, 150, '...') !!}</a>
                        <a href="{{ route('post.show', $post->slug) }}"
                            class="uppercase font-semibold text-sky-800 hover:text-sky-400">Selengkapnya</a>
                    </div>
                </article>
            @endforeach

            <div class="flex items-center py-8">
                {{ $posts->links() }}
            </div>


        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3 pt-8">
            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Profil Sekolah</p>
                @foreach ($profiles as $profile)
                    @if ($profile->type == 'image')
                        <div class="aspect-square">
                            <img class="hover:opacity-75" src="{{ $profile->url }}" alt="{{ $profile->title }}">
                        </div>
                    @elseif($profile->type == 'video')
                        <div class='aspect-video'>
                            <iframe class='h-full w-full' src="{{ $profile->url }}" frameborder="0">
                            </iframe>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Informasi</p>
                @foreach ($informations as $information)
                    @if ($information->type == 'image')
                        <div class="aspect-square">
                            <img class="hover:opacity-75" src="{{ $information->url }}"
                                alt="{{ $information->title }}">
                        </div>
                    @elseif($information->type == 'video')
                        <div class='aspect-video'>
                            <iframe class='h-full w-full' src="{{ $information->url }}" frameborder="0">
                            </iframe>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="w-full
                                bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Galeri</p>
                <div class="grid grid-cols-3 gap-3">
                    @foreach ($galleries as $gallery)
                        @if ($gallery->type == 'image')
                            <img class="hover:opacity-75" src="{{ $gallery->url }}">
                        @elseif ($gallery->type == 'video')
                            <div class='aspect-square'>
                                <iframe class='w-full' src="{{ $gallery->url }}" frameborder="0">
                                </iframe>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
            {{-- <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Information</p>
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
            </div> --}}
        </aside>

    </div>
</x-app-layout>
