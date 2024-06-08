<x-app-layout>

    <div class="container mx-auto flex flex-wrap py-6">

        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                @if (strpos($posts->thumbnail, 'http') !== false)
                    <img src="{{ $posts->thumbnail }}">
                @else
                    <img src="{{ asset('storage/' . $posts->thumbnail) }}" class="h-96 object-contain">
                @endif
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="{{ route('post.category', $posts->category) }}"
                        class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $posts->category->name }}</a>
                    <span class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $posts->title }}</span>
                    <p class="text-sm pb-8">{{ $posts->created_at->format('F j, Y') }}</p>
                    <p class="pb-3">{!! $posts->body !!}</p>

                </div>
            </article>
        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3 pt-8">
            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Profil</p>
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
        </aside>
    </div>

</x-app-layout>
