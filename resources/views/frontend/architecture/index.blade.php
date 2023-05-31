@extends('layouts.frontend')

@push('header')
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
@endpush

@section('content')

@include('frontend.architecture.header')

<div class="architecture-content pt-5 lg:pt-10 pb-20 lg:pb-14 overflow-hidden">

    <div class="container">
        <a href="{{ route('services-details.index') }}" class="font-medium paragraph-1 text-gray-3">
            <i class="fas fa-arrow-left" aria-hidden="true"></i> <span class="ml-4 paragraph-1 font-medium ">Back to Services</span>
        </a>
    </div>

    <div class="container relative effect-1 pt-5 pb-10 lg:pt-10 lg:pb-14">
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
        <article class="sub-detail pb-4 sm:pb-10 2xl:pb-12">
            <div class="flex flex-col items-center gap-1 lg:gap-4 2xl:gap-6">
                <p class="paragraph-1 text-gray-3 font-medium" style="font-weight: 500!important;">From hosting to hardware architecture, everything is safe.</p>
            </div>
        </article>
        <svg xmlns="http://www.w3.org/2000/svg" width="752" height="752" viewBox="0 0 752 752" fill="none"
                class="hidden lg:block absolute -z-10 lg:left-[-300px]">
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
        <section>
            <div class="client-services">
                <div
                    class="grid grid-cols-1 md:grid-cols-2 gap-y-7 sm:gap-y-8 md:gap-y-10 gap-x-6 sm:gap-x-10 md:gap-x-16 lg:gap-x-[80px] xl:gap-x-[156px]">
                    @forelse ($architecture->contentFeatures as $feature)
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
                            <h2 class="heading-2 text-gray-2 font-medium">{!! $feature->features !!}</h2>
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

    const btnScrollToTop = document.querySelector('.scrolltop');
    const highPerfDiv = document.querySelector('.sub-detail');

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
