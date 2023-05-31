@extends('layouts.frontend')

@push('header')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" /> --}}
<link href="/css/tw-elements.min.css" rel="stylesheet">
@endpush

@section('content')

@include('section.header-sub-solution')
<div class=" effect-1" style="box-shadow: 0px 0px 80px rgba(0, 127, 255, 0.16);">
    <ul class="mb-5 mt-5 lg:mt-0 flex list-none gap-4 justify-center items-center flex-wrap border-b-0 pl-0 md:flex-row" role="tablist"
        data-te-nav-ref>

        @forelse ($subSolutions as $key => $subSolution)
        <li role="presentation">
            <a class="transition-all duration-200 my-2 block border-x-0 border-t-0 border-b-2 border-transparent lg:px-7 lg:pt-4 lg:pb-3.5 text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 hover:cursor-pointer focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400
                text-base sm:text-lg md:text-xl lg:text-2xl"
                id="tab-menu-{{$subSolution->slug}}"
                data-te-toggle="pill" data-te-target="#tabs-{{$subSolution->id}}"
                data-te-nav-{{ $key == 0 ? 'active' : '' }} role="tab" aria-controls="tabs-{{$subSolution->id}}"
                aria-selected="{{$key == 0 ? 'true' : 'false'}}" onclick="selectedSubSolution({{$subSolution}})">
                {{$subSolution->title}}
            </a>
        </li>
        @empty

        @endforelse
    </ul>
</div>

<div class="effect-1">
    <div class="">
        @forelse ($subSolutions as $key => $subSolution)
        <div class="hidden opacity-0 {{ $key == 0 ? 'opacity-100' : '' }} transition-opacity duration-300 ease-linear data-[te-tab-active]:block"
            id="tabs-{{$subSolution->id}}" role="tabpanel" aria-labelledby="tabs-{{$subSolution->title}}-tab"
            data-te-tab-{{$key == 0 ? 'active' : ''}}>
            <article class="container sub-detail pt-5 md:pt-[50px]  xl:pt-[60px] pb-10 sm:pb-12 md:pb-14 lg:pb-16 xl:pb-20">
                <div class="">
                    {!! $subSolution->detail!!}
                </div>
            </article>

            <section>
                <div class="container">
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 gap-y-7 sm:gap-y-8 md:gap-y-10 lg:gap-y-14 xl:gap-y-20 gap-x-6 sm:gap-x-10 md:gap-x-16 lg:gap-x-[80px] 2xl:gap-x-[156px]">
                        @forelse ($subSolution->features as $feature)
                        <div class="flex gap-5 sm:gap-6 lg:gap-7 xl:gap-[30px]">
                            <span class="">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.6654 27.6667L29.4154 15.9167L27.082 13.5834L17.6654 23L12.9154 18.25L10.582 20.5834L17.6654 27.6667ZM19.9987 36.6667C17.6931 36.6667 15.5265 36.2289 13.4987 35.3534C11.4709 34.4789 9.70703 33.2917 8.20703 31.7917C6.70703 30.2917 5.51981 28.5278 4.64536 26.5C3.76981 24.4723 3.33203 22.3056 3.33203 20C3.33203 17.6945 3.76981 15.5278 4.64536 13.5C5.51981 11.4723 6.70703 9.70837 8.20703 8.20837C9.70703 6.70837 11.4709 5.5206 13.4987 4.64504C15.5265 3.7706 17.6931 3.33337 19.9987 3.33337C22.3043 3.33337 24.4709 3.7706 26.4987 4.64504C28.5265 5.5206 30.2904 6.70837 31.7904 8.20837C33.2904 9.70837 34.4776 11.4723 35.352 13.5C36.2276 15.5278 36.6654 17.6945 36.6654 20C36.6654 22.3056 36.2276 24.4723 35.352 26.5C34.4776 28.5278 33.2904 30.2917 31.7904 31.7917C30.2904 33.2917 28.5265 34.4789 26.4987 35.3534C24.4709 36.2289 22.3043 36.6667 19.9987 36.6667Z"
                                        fill="#23B6AE" />
                                </svg>
                            </span>

                            <div class="flex flex-col gap-5 sm:gap-6 md:gap-8 xl:gap-10">
                                <h2 class="heading-2 text-navy font-medium">{{ $feature->features }}</h2>

                                <div class=" feature-item">
                                    {!! $feature->description!!}
                                </div>
                            </div>
                        </div>
                        @empty

                        @endforelse

                    </div>
                </div>
            </section>

            <section class="relative pt-[300px] pb-[165px] solutions-featured">

                <img class="z-0 object-left md:object-center object-cover xl:object-fill absolute top-0 left-0 h-full w-full"
                    src="{{ asset('images/footer.png') }}" alt="images">

                <div class="container relative z-10">
                    <h2
                        class="heading-1 text-white leading-snug xl:leading-relaxed font-medium mx-auto text-center max-w-[709px]">
                        More about features <br> of Jalin Health Solution for Payers
                    </h2>
                    <div class="flex sm:gap-4 mt-10 gap-3 md:gap-4 lg:gap-5 xl:gap-6 sm:gap-x-10 md:gap-x-16 lg:gap-x-[80px] 2xl:gap-x-[156px]">
                        
                        @if ($subSolution->otherFeature && count($subSolution->otherFeature) > 0)
                        <div class="left-side w-1/2 flex flex-col gap-4 lg:gap-6">
                            @foreach ($subSolution->otherFeature as $key => $item)
                                @if ($key % 2 === 0)
                                <div class="flex items-center md:items-start gap-4">
                                    <span class="pt-1.5">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.6 13.8L8.425 11.625C8.24167 11.4417 8.01667 11.35 7.75 11.35C7.48333 11.35 7.25 11.45 7.05 11.65C6.86667 11.8333 6.775 12.0667 6.775 12.35C6.775 12.6333 6.86667 12.8667 7.05 13.05L9.9 15.9C10.0833 16.0833 10.3167 16.175 10.6 16.175C10.8833 16.175 11.1167 16.0833 11.3 15.9L16.975 10.225C17.1583 10.0417 17.25 9.81667 17.25 9.55C17.25 9.28333 17.15 9.05 16.95 8.85C16.7667 8.66667 16.5333 8.575 16.25 8.575C15.9667 8.575 15.7333 8.66667 15.55 8.85L10.6 13.8ZM12 22C10.6167 22 9.31667 21.7373 8.1 21.212C6.88333 20.6873 5.825 19.975 4.925 19.075C4.025 18.175 3.31267 17.1167 2.788 15.9C2.26267 14.6833 2 13.3833 2 12C2 10.6167 2.26267 9.31667 2.788 8.1C3.31267 6.88333 4.025 5.825 4.925 4.925C5.825 4.025 6.88333 3.31233 8.1 2.787C9.31667 2.26233 10.6167 2 12 2C13.3833 2 14.6833 2.26233 15.9 2.787C17.1167 3.31233 18.175 4.025 19.075 4.925C19.975 5.825 20.6873 6.88333 21.212 8.1C21.7373 9.31667 22 10.6167 22 12C22 13.3833 21.7373 14.6833 21.212 15.9C20.6873 17.1167 19.975 18.175 19.075 19.075C18.175 19.975 17.1167 20.6873 15.9 21.212C14.6833 21.7373 13.3833 22 12 22Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    {!!$item->features!!}
                                </div>
                                @endif
                            @endforeach
                        </div>
                        @endif

                        @if ($subSolution->otherFeature && count($subSolution->otherFeature)/2 > 0)
                        <div class="right-side w-1/2 flex flex-col gap-6">
                            @foreach ($subSolution->otherFeature as $key => $item)
                                @if ($key % 2 !== 0)
                                <div class="flex items-center md:items-start gap-4">
                                    <span class="pt-1.5">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.6 13.8L8.425 11.625C8.24167 11.4417 8.01667 11.35 7.75 11.35C7.48333 11.35 7.25 11.45 7.05 11.65C6.86667 11.8333 6.775 12.0667 6.775 12.35C6.775 12.6333 6.86667 12.8667 7.05 13.05L9.9 15.9C10.0833 16.0833 10.3167 16.175 10.6 16.175C10.8833 16.175 11.1167 16.0833 11.3 15.9L16.975 10.225C17.1583 10.0417 17.25 9.81667 17.25 9.55C17.25 9.28333 17.15 9.05 16.95 8.85C16.7667 8.66667 16.5333 8.575 16.25 8.575C15.9667 8.575 15.7333 8.66667 15.55 8.85L10.6 13.8ZM12 22C10.6167 22 9.31667 21.7373 8.1 21.212C6.88333 20.6873 5.825 19.975 4.925 19.075C4.025 18.175 3.31267 17.1167 2.788 15.9C2.26267 14.6833 2 13.3833 2 12C2 10.6167 2.26267 9.31667 2.788 8.1C3.31267 6.88333 4.025 5.825 4.925 4.925C5.825 4.025 6.88333 3.31233 8.1 2.787C9.31667 2.26233 10.6167 2 12 2C13.3833 2 14.6833 2.26233 15.9 2.787C17.1167 3.31233 18.175 4.025 19.075 4.925C19.975 5.825 20.6873 6.88333 21.212 8.1C21.7373 9.31667 22 10.6167 22 12C22 13.3833 21.7373 14.6833 21.212 15.9C20.6873 17.1167 19.975 18.175 19.075 19.075C18.175 19.975 17.1167 20.6873 15.9 21.212C14.6833 21.7373 13.3833 22 12 22Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    {!!$item->features!!}
                                </div>
                                @endif
                            @endforeach
                        </div>
                        @endif
                        
                    </div>
                </div>
            </section>
        </div>
        @empty

        @endforelse

    </div>
</div>

@endsection

@push('footer-js')
<script>
    function isInViewport(el) {
        const rect = el.getBoundingClientRect();
        return (
            rect.top <= 10
        );
    }
</script>

<script>

    window.onload = function(){
        let url = new URL(window.location.href);
        let urlPath = url.href.split('/');

        if (urlPath[urlPath.length - 1].startsWith('detail')) {
            let menuTabSelect = urlPath[urlPath.length - 1].split('#');
            if (menuTabSelect) {
                let menuTabSelected = document.getElementById('tab-menu-' + menuTabSelect[1]);
                menuTabSelected.click();
            }
        }
        
    };

    function selectedSubSolution(subSolution) {
        let title = document.getElementsByTagName('title');
        if (title[0]) {
            title[0].innerHTML = subSolution.title ?? subSolution.title;
        }

        let seoDesc = document.querySelector('[name="description"]');
        if (seoDesc) {
            seoDesc.content = subSolution.seo_description ?? '';
        }

        let seoKeyword = document.querySelector('[name="keywords"]');
        if (seoKeyword) {
            seoKeyword.content = subSolution.seo_keywords  ?? '';
        }

        let subHeadingTitle = document.getElementById('sub-heading-title').innerHTML = subSolution.title;
        let subHeadingDesc = document.getElementById('sub-heading-desc').innerHTML = subSolution.description;
        let subHeadingBreadcumb = document.getElementById('sub-heading-breadcumb').innerHTML = subSolution.title;

        let header = document.querySelector('.header-img');
        if (header) {
            header.src = '/'+subSolution.image  ?? '/images/header.png';
        }

        // preview-icon-2
        let headerIcon = document.getElementById('preview-icon-2');
        if (headerIcon) {
            headerIcon.src = '/'+subSolution.icon  ?? '/images/insurance-icon.svg';
        }
        
    }

    const btnScrollToTop = document.querySelector('.scrolltop');
    const highPerfDiv = document.querySelector('.solutions-featured');
    var topPos = highPerfDiv.getBoundingClientRect().top;

    document.addEventListener('scroll', function () {
        topPos = highPerfDiv.getBoundingClientRect().top;
        if (topPos < window.innerHeight && topPos < 100) {
            btnScrollToTop.classList.add('btn-show');
        } else {
            btnScrollToTop.classList.remove('btn-show');
        }
    }, {
        passive: true
    });

</script>

{{-- <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script> --}}
<script src="{{ mix('js/tw-elements.umd.min.js') }}"></script>
@endpush
