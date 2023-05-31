@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between test">
    <div class="container flex justify-evenly pt-6 lg:pt-16">
        @if (url($paginator->onFirstPage()))
        <span class="relative gap-4 hidden lg:flex items-center">
            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12.7207 2C7.1817 2 2.69143 6.47715 2.69143 12C2.69143 17.5228 7.1817 22 12.7207 22C18.2597 22 22.75 17.5228 22.75 12C22.75 6.47715 18.2597 2 12.7207 2Z"
                    stroke="#828282" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12.7188 8L8.70704 12L12.7188 16" stroke="#828282" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M16.7305 12L8.70704 12" stroke="#828282" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="paragraph-2 text-gray-3 font-medium">Previous</span>
        </span>
        @else
        <a href="{{ url($paginator->previousPageUrl()) }}" class="relative gap-4 hidden lg:flex items-center">
            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12.7207 2C7.1817 2 2.69143 6.47715 2.69143 12C2.69143 17.5228 7.1817 22 12.7207 22C18.2597 22 22.75 17.5228 22.75 12C22.75 6.47715 18.2597 2 12.7207 2Z"
                    stroke="#828282" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12.7188 8L8.70704 12L12.7188 16" stroke="#828282" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M16.7305 12L8.70704 12" stroke="#828282" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span
                class="paragraph-2 text-gray-3 font-medium ease-in-out duration-150 hover:bg-primary hover:text-gray-6">Previous</span>
        </a>
        @endif

        <div class="flex gap-4">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <span aria-disabled="true">
                <span
                    class="relative flex items-center px-3 py-1 paragraph-2 font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
            </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <span aria-current="page">
                <span
                    class="relative flex items-center px-3 py-1 paragraph-2 font-medium text-gray-6 bg-primary rounded-full">{{ $page }}</span>
            </span>
            @else
            <a href="{{ url($url) }}"
                class="relative flex items-center px-3 py-1 paragraph-2 font-medium text-gray-3 bg-white border-2 border-transparent rounded-full hover:text-primary hover:border-primary transition ease-in-out duration-150"
                aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                {{ $page }}
            </a>
            @endif
            @endforeach
            @endif
            @endforeach
        </div>

        @if ($paginator->hasMorePages())
        <a href="{{ url($paginator->nextPageUrl()) }}" class="relative gap-4 lg:flex items-center hidden">
            <span class="paragraph-2 text-gray-3 font-medium">Next</span>
            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12.2832 22C17.8222 22 22.3125 17.5228 22.3125 12C22.3125 6.47715 17.8222 2 12.2832 2C6.74417 2 2.25391 6.47715 2.25391 12C2.25391 17.5228 6.74417 22 12.2832 22Z"
                    stroke="#828282" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12.2852 16L16.2969 12L12.2852 8" stroke="#828282" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M8.27344 12H16.2969" stroke="#828282" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </a>
        @else
        <span class="relative gap-4 lg:flex items-center hidden">
            <span class="paragraph-2 text-gray-3 font-medium">Next</span>
            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12.2832 22C17.8222 22 22.3125 17.5228 22.3125 12C22.3125 6.47715 17.8222 2 12.2832 2C6.74417 2 2.25391 6.47715 2.25391 12C2.25391 17.5228 6.74417 22 12.2832 22Z"
                    stroke="#828282" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12.2852 16L16.2969 12L12.2852 8" stroke="#828282" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M8.27344 12H16.2969" stroke="#828282" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </span>
        @endif
    </div>
</nav>
@endif
