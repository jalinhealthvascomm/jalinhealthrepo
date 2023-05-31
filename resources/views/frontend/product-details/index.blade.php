@extends('layouts.frontend')



@section('content')

@include('frontend.product-details.header')

<div class="product-details-content pt-10 lg:pt-20 overflow-hidden">

    <div class="container side-content flex flex-col lg:flex-row gap-2">
        <div class="effect-1 left-content relative lg:w-4/12 flex justify-end">
            <svg xmlns="http://www.w3.org/2000/svg" width="752" height="752" viewBox="0 0 752 752" fill="none"
                class="absolute -z-10 top-[-360px] left-[-100px] lg:left-[80px]">
                <g opacity="0.25" filter="url(#filter0_f_1084_631)">
                    <circle cx="376" cy="376" r="126" fill="#007FFF" />
                </g>
                <defs>
                    <filter id="filter0_f_1084_631" x="0" y="0" width="752" height="752" filterUnits="userSpaceOnUse"
                        color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                        <feGaussianBlur stdDeviation="125" result="effect1_foregroundBlur_1084_631" />
                    </filter>
                </defs>
            </svg>

            @if ($productDetails->childs[0])
                @if(file_exists(public_path('/'.$productDetails->childs[0]->image)))
                <img src="{{ url($productDetails->childs[0]->image) }}" alt="{{$productDetails->title}}" class="w-full lg:max-w-[400px]">
                @else
                <img src="{{ url('images/product-detail-left-image.png') }}" alt="{{$productDetails->title}}" class="w-full lg:max-w-[400px]">
                @endif
                
            @endif
            
            <svg xmlns="http://www.w3.org/2000/svg" width="752" height="752" viewBox="0 0 752 752" fill="none"
                class="hidden lg:block absolute -z-10 lg:bottom-[-360px] lg:left-[-300px]">
                <g opacity="0.25" filter="url(#filter0_f_1084_631)">
                    <circle cx="376" cy="376" r="126" fill="#007FFF" />
                </g>
                <defs>
                    <filter id="filter0_f_1084_631" x="0" y="0" width="752" height="752" filterUnits="userSpaceOnUse"
                        color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                        <feGaussianBlur stdDeviation="125" result="effect1_foregroundBlur_1084_631" />
                    </filter>
                </defs>
            </svg>
        </div>
        <div class="effect-1 right-content lg:w-8/12">
            @if ($productDetails->childs[0])
                {!! $productDetails->childs[0]->content !!}
            @endif
        </div>
    </div>

    <div class="effect-1 container content-image py-5 lg:py-10 relative -z-[11]">
        @if ($productDetails->childs[1])
            @if(file_exists(public_path('/'.$productDetails->childs[1]->image)))
            <img src="{{ url($productDetails->childs[1]->image) }}" alt="{{$productDetails->title}}" class="w-full">
            @else
            <img src="{{ url('images/product-image.jpg') }}" alt="{{$productDetails->title}}" class="w-full">
            @endif        
        
        @endif
    </div>

    <div class="effect-1">
        <article class="sub-detail container py-5 md:pt-[50px]  xl:pt-[60px] sm:pb-12 md:pb-14 lg:pb-16 xl:pb-20">
            <p class="paragraph-1 text-gray-3 font-medium">See additional benefits of the most trusted core administration and claims management engines on the market</p>
        </article>
        <section>
            <div class="container">
                <div
                    class="grid grid-cols-1 md:grid-cols-2 gap-y-7 sm:gap-y-8 md:gap-y-10 gap-x-6 sm:gap-x-10 md:gap-x-16 lg:gap-x-[80px] xl:gap-x-[156px]">
                    @forelse ($productDetails->contentFeatures as $feature)
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
                            <h2 class="paragraph-1 text-gray-2 font-medium">{!! $feature->description !!}</h2>
                        </div>
                    </div>
                    @empty

                    @endforelse

                </div>
            </div>
        </section>
    </div>

    <section class="effect-1 relative pt-[300px] pb-[165px] solutions-featured">

        <img class="z-0 object-left md:object-center object-cover xl:object-fill absolute top-0 left-0 h-full w-full"
            src="{{ asset('images/footer.png') }}" alt="images">

        <div class="container relative z-10 lg:pt-12">
            <h2
                class="effect-1 paragraph-1 text-white leading-snug xl:leading-relaxed font-medium mx-auto text-center max-w-[1200px]">
                Easy to configure, agile enough to address demanding business needs, <br> and flexible enough to capitalize on new growth opportunities, Jalin Health platforms deliver
            </h2>

            <div class="flex sm:gap-4 mt-10 gap-3 md:gap-4 lg:gap-5 xl:gap-6">
                @if ($productDetails->contentBenefit && count($productDetails->contentBenefit) > 0)
                <div class="left-side w-1/2 flex flex-col gap-4 lg:gap-6">
                    @foreach ($productDetails->contentBenefit as $key => $item)
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
                            <p class="text-white font-normal heading-3">{!! $item->description !!}</p>
                        </div>
                        @endif
                    @endforeach
                </div>
                @endif

                @if ($productDetails->contentBenefit && count($productDetails->contentBenefit)/2 > 0)
                    <div class="right-side w-1/2 flex flex-col gap-6">
                        @foreach ($productDetails->contentBenefit as $key => $item)
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
                                <p class="text-white font-normal heading-3">{!! $item->description !!}</p>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    @endif
            </div>
        </div>
    </section>
    
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

    const btnScrollToTop = document.querySelector('.scrolltop');
    const highPerfDiv = document.querySelector('.content-image');

    if (highPerfDiv) {
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
    }

</script>
@endpush
