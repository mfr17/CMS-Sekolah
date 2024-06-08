<x-app-layout>
    <div class="container mx-auto flex flex-wrap py-6">
        <header class="w-full container mx-auto">
            <div class="flex flex-col items-center py-12">
                <h1 class="font-bold text-5xl text-gray-800 uppercase ">
                    Profil Sekolah
                </h1>

            </div>
        </header>
        <section class="w-full flex flex-col items-center px-3">

            @foreach ($profiles as $profile)
                <div class="flex flex-row shadow-sm my-4 w-full">;
                    <div class="bg-white flex flex-col justify-start p-6 w-full">
                        <div class="relative mb-3">
                            <h6 class="mb-0">
                                <button
                                    class="relative flex items-center w-full py-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500"
                                    data-collapse-target="animated-collapse-1">
                                    <x-heroicon-o-chevron-down
                                        class="h-5 w-5 text-base transition-transform group-open:rotate-180 mr-2" />
                                    <span>Visi</span>
                                </button>
                            </h6>

                            <div data-collapse="animated-collapse-1"
                                class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                <div class="px-4 pt-4 text-sm leading-normal text-blue-gray-500/80">
                                    {!! html_entity_decode($profile->vision) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row shadow-sm my-4 w-full">
                    <div class="bg-white flex flex-col justify-start p-6 w-full">
                        <div class="relative mb-3">
                            <h6 class="mb-0">
                                <button
                                    class="relative flex items-center w-full py-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500"
                                    data-collapse-target="animated-collapse-2">
                                    <x-heroicon-o-chevron-down
                                        class="h-5 w-5 text-base transition-transform group-open:rotate-180 mr-2" />
                                    <span>Misi</span>
                                </button>
                            </h6>

                            <div data-collapse="animated-collapse-2"
                                class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                <div class="px-4 pt-4 text-sm leading-normal text-blue-gray-500/80">
                                    {!! html_entity_decode($profile->mission) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row shadow-sm my-4 w-full">
                    <div class="bg-white flex flex-col justify-start p-6 w-full">
                        <div class="relative mb-3">
                            <h6 class="mb-0">
                                <button
                                    class="relative flex items-center w-full py-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500"
                                    data-collapse-target="animated-collapse-3">
                                    <x-heroicon-o-chevron-down
                                        class="h-5 w-5 text-base transition-transform group-open:rotate-180 mr-2" />
                                    <span>Sejarah</span>
                                </button>
                            </h6>

                            <div data-collapse="animated-collapse-3"
                                class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                <div class="px-4 pt-4 text-sm leading-normal text-blue-gray-500/80">
                                    {!! html_entity_decode($profile->history) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (!empty($profile->goals))
                    <div class="flex flex-row shadow-sm my-4 w-full">
                        <div class="bg-white flex flex-col justify-start p-6 w-full">
                            <div class="relative mb-3">
                                <h6 class="mb-0">
                                    <button
                                        class="relative flex items-center w-full py-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500"
                                        data-collapse-target="animated-collapse-3">
                                        <x-heroicon-o-chevron-down
                                            class="h-5 w-5 text-base transition-transform group-open:rotate-180 mr-2" />
                                        <span>Tujuan</span>
                                    </button>
                                </h6>

                                <div data-collapse="animated-collapse-3"
                                    class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                    <div class="px-4 pt-4 text-sm leading-normal text-blue-gray-500/80">
                                        {!! html_entity_decode($profile->goals) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </section>
    </div>
</x-app-layout>
