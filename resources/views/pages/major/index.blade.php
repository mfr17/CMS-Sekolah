<x-app-layout>
    <div class="container mx-auto flex flex-wrap py-6">
        <header class="w-full container mx-auto">
            <div class="flex flex-col items-center py-12">
                <h1 class="font-bold text-5xl text-gray-800 uppercase ">
                    Program Keahlian
                </h1>

            </div>
        </header>
        <section class="w-full flex flex-col items-center px-3">
            @foreach ($majors as $major)
                <div class="flex flex-row shadow-sm my-4 w-full">
                    <span>
                        <img src="{{ asset('storage/' . $major->thumbnail) }}" class="h-72 w-72 object-cover">
                    </span>
                    <div class="bg-white flex flex-col justify-start p-6 w-full">
                        <span class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $major->name }}</span>
                        <div class="pb-6">{!! $major->description !!}</div>
                        <div class="relative mb-3">
                            <h6 class="mb-0">
                                <button
                                    class="relative flex items-center w-full py-4 font-semibold text-left transition-all ease-in border-b border-solid cursor-pointer border-slate-100 text-slate-700 rounded-t-1 group text-dark-500"
                                    data-collapse-target="animated-collapse-{{ $major->id }}">
                                    <x-heroicon-o-chevron-down
                                        class="h-5 w-5 text-base transition-transform group-open:rotate-180 mr-2" />
                                    <span>Tenaga Pendidik</span>
                                </button>
                            </h6>

                            <div data-collapse="animated-collapse-{{ $major->id }}"
                                class="h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                <div class="px-4 pt-4 text-sm leading-normal text-blue-gray-500/80">
                                    {!! html_entity_decode($major->instructor) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </section>
    </div>
</x-app-layout>
