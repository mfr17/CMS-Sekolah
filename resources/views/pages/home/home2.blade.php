<x-app-layout>
    <x-home.hero>
        <x-slot name='images'>
            <div class="relative overflow-hidden bg-cover bg-no-repeat"
                style="background-position: 50%; background-image: url({{ isset($heros[0]->image_path) ? $heros[0]->image_path : 'https://placehold.co/600x400' }}); height: 100%;">
                <div
                    class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsla(0,0%,0%,0.75)] bg-fixed">
                    <div class="flex h-full items-center justify-center">
                        <div class="px-6 text-center text-white md:px-12">
                            <h1 class="mt-2 mb-2 text-5xl font-bold tracking-tight md:text-6xl xl:text-7xl">
                                {{ isset($heros[0]->title) ? $heros[0]->title : 'Title' }}
                            </h1>
                            <p class="mb-14 text-lg font-light tracking-tight md:text-2xl xl:text-3xlxl">
                                {{ isset($heros[0]->description) ? $heros[0]->description : 'Description' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-home.hero>
    <x-home.header>
        <x-slot name='title'>
            {{ isset($headers[0]->opening_remarks_title) ? $headers[0]->opening_remarks_title : 'Title' }}
        </x-slot>
        <x-slot name='content'>
            {{ isset($headers[0]->opening_remarks_content) ? $headers[0]->opening_remarks_content : 'Content' }}
        </x-slot>
        <x-slot name='images'>
            <div class="w-full shrink-0 grow-0 basis-auto md:w-2/12 lg:w-1/6">
                <img src="{{ isset($headers[0]->image_path) ? $headers[0]->image_path : 'https://avatar.iran.liara.run/public' }}"
                    class="mb-6 w-1/2 md:w-full mx-auto" alt="Avatar" />
            </div>
        </x-slot>
        <x-slot name='messages'>
            <div class="w-full shrink-0 grow-0 basis-auto text-center md:w-10/12 md:pl-6 md:text-left lg:w-9/12">
                <h5 class="mb-6 text-xl font-semibold">
                    {{ isset($headers[0]->principal_message_title) ? $headers[0]->principal_message_title : 'Principal' }}
                </h5>
                <p>
                    {{ isset($headers[0]->principal_message_content) ? $headers[0]->principal_message_content : 'Principal Messages' }}
                </p>
            </div>
        </x-slot>
    </x-home.header>
    <x-home.blog>
        <x-slot name="post">
            @foreach ($posts as $post)
                <li class="w-full mx-auto group sm:max-w-sm">

                    <img src="{{ $post->thumbnail }}" loading="lazy" alt="{{ $post->title }}"
                        class="w-full rounded-lg" />
                    <div class="mt-3 space-y-2">
                        <span class=" text-slate-400 text-sm">{{ $post->created_at }} |
                            <a class=" text-slate-400 text-sm"
                                href="{{ route('post.category', $post->category) }}">{{ $post->category->name }}</a></span>
                        <a href="{{ route('post.show', $post->slug) }}">
                            <h3 class="text-lg text-gray-800 duration-150 group-hover:text-slate-600 font-semibold">
                                {{ $post->title }}
                        </a>

                        </h3>
                        <p class="text-gray-600 text-sm duration-150 group-hover:text-gray-800">
                            {{ $post->body }}
                        </p>
                    </div>
                </li>
            @endforeach
        </x-slot>
    </x-home.blog>
    <x-home.gallery>
        <x-slot name="gallery">
            @foreach ($posts as $post)
                <li class="w-full mx-auto group sm:max-w-sm">
                    <img src="{{ $post->thumbnail }}" loading="lazy" alt="{{ $post->title }}"
                        class="w-full rounded-lg" />
                    {{-- <a href="{{  }}">
                    </a> --}}
                </li>
            @endforeach
        </x-slot>
    </x-home.gallery>
</x-app-layout>
