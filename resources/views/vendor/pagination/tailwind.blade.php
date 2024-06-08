@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center">
        <div class="flex-1 flex items-center justify-center">
            @if ($paginator->onFirstPage())
                {{-- <span
                    class="relative  inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    {!! __('pagination.previous') !!}
                </span> --}}
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">
                    {!! __('Prev') !!}
                </a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">
                        {{ $element }}
                    </span>
                @endif

                @if (is_array($element))
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($element as $page => $url)
                        @if ($count < 4 || $page == $paginator->lastPage())
                            @if ($page == $paginator->currentPage())
                                <span
                                    class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                    class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center"
                                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endif
                        @php
                            $count++;
                        @endphp
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">
                    {!! __('Next') !!}
                </a>
            @else
                {{-- <span
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    {!! __('pagination.next') !!}
                </span> --}}
            @endif
        </div>
    </nav>
@endif
