@extends('layouts.frontend')

@push('header')
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
@endpush

@section('content')

@include('frontend.about-us.header')

<div class="about-us-content pt-5 lg:pt-20 overflow-hidden relative">
    <span class="absolute w-[252px] h-[252px] bg-primary/25 blur-[100px] top-[0] left-[352px]"></span>
    @empty(!$sectionOverview)
    <div class="overview effect-1 container">
        <div class="flex flex-col lg:flex-row gap-10 lg:gap-1">
            <div class="w-full lg:w-1/2 flex flex-col gap-7">
                <h4 class="font-medium text-4xl text-navy">{{ $sectionOverview->title }}</h4>
                <div class="content">
                    {!! $sectionOverview->content !!}
                </div>
            </div>
            <div class="w-full lg:w-1/2 flex justify-center relative">
                @if(file_exists(public_path('/'.$sectionOverview->image)))
                <img src="{{url($sectionOverview->image)}}" alt="{{$sectionOverview->title}}" title="{{$sectionOverview->title}}" class="relative z-10 object-cover object-center">
                @else
                <img src="{{url('images/about-overview.png')}}" alt="{{$sectionOverview->title}}" title="{{$sectionOverview->title}}" class="relative z-10 object-cover object-center">
                @endif
                
                <span
                    class="absolute w-[200px] h-[200px] bg-primary/50 blur-[125px] bottom-0 left-0 transform -translate-y-[5%] translate-x-1/2"></span>
            </div>
        </div>
    </div>
    @endempty
    
    @empty(!$sectionValue)
    <div class="effect-1 container pt-10 lg:pt-20">
        <div class="section-title flex flex-col gap-2 lg:gap-4 text-center pb-5 lg:pb-10">
            <h3 class="font-medium text-3xl text-navy">{{ $sectionValue->title }}</h3>
            <div class="content">
                {!! $sectionValue->content !!}
            </div>
        </div>

        <div class="grid-value grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-10">
            @foreach ($sectionValue->childs as $item)
            <div>
                <div class="img-chip relative mb-10">
                    @if (!empty($item->image))
                        @if(file_exists(public_path('/'.$item->image)))
                        <img src="{{url($item->image)}}" alt="{{ $item->title }}" title="{{ $item->title }}" height="49" class="h-[49px]">
                        @else
                        <img src="{{url('images/not-found-icon.png')}}" alt="{{ $item->title }}" title="{{ $item->title }}" height="49" class="h-[49px]">
                        @endif
                        
                    @else
                        <img src="{{url('images/not-found-icon.png')}}" alt="{{ $item->title }}" title="{{ $item->title }}" height="49" class="h-[49px]">
                    @endif
                </div>
                <h4 class="text-2xl font-medium text-navy ">{{ $item->title }}</h4>
            </div>
            @endforeach
        </div>
    </div>
    @endempty

    <div class="effect-1 content-value container pt-10 lg:pt-20">
        <div class="flex flex-col lg:flex-row gap-10">
            <div class="w-full lg:w-4/12 flex justify-center relative">
                @if (!empty($sectionValueContent->image))
                    @if(file_exists(public_path('/'.$sectionValueContent->image)))
                    <img src="{{ url($sectionValueContent->image) }}" alt="{{$seoDescription}}" title="{{$title}}" class="relative z-10">
                    @else
                    <img src="{{ url('images/about-value-content.png') }}" alt="{{$seoDescription}}" title="{{$title}}" class="relative z-10">
                    @endif
                
                @else
                {{-- url('/images/not-found-icon.png') --}}
                <img src="{{ url('images/about-value-content.png') }}" alt="{{$seoDescription}}" title="{{$title}}" class="relative z-10">
                @endif
                
            </div>
            <div class="hidden lg:block lg:w-10 bg-primary rounded-md"></div>
            <div class="w-full lg:w-6/12 flex items-center">
                <div class="content">
                    {!! $sectionValueContent->content !!}
                </div>
            </div>
        </div>
    </div>

    <div class="effect-1 partner container py-10 lg:py-20" id="partner">
        <div class="flex flex-col lg:flex-row gap-10 lg:gap-1">
            <div class="w-full lg:w-1/2 flex flex-col gap-7">
                <h4 class="font-medium text-3xl text-navy w-full lg:w-[70%]">{{ $sectionPartner->excerpt }}</h4>
                <div class="content w-full lg:w-[85%]">
                    {!! $sectionPartner->content !!}
                </div>
            </div>
            <div class="w-full lg:w-1/2 flex justify-center relative">
                @if (!empty($sectionPartner->image))
                    @if(file_exists(public_path('/'.$sectionPartner->image)))
                    <img src="{{url($sectionPartner->image)}}" alt="" class="relative z-10 object-cover object-center">
                    @else
                    <img src="{{url('images/about-partner.png')}}" alt="" class="relative z-10 object-cover object-center">
                    @endif
                @else
                {{-- url('/images/not-found-icon.png') --}}
                <img src="{{url('/images/about-partner.png')}}" alt="" class="relative z-10 object-cover object-center">
                @endif
                {{-- <span class="absolute w-[200px] h-[200px] bg-primary/50 blur-[125px] bottom-0 left-0 transform -translate-y-[5%] translate-x-1/2"></span> --}}
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-10 pt-10 lgp:t-20 w-fit mx-auto">
            @foreach ($sectionPartner->childs as $item)
                <a @if ($item->excerpt !== '#')
                    href="{{ $item->excerpt }}" target="_blank"
                @endif  class="w-full flex justify-center">
                    <img src="{{ $item->image }}" alt="{{$item->content}}" title="{{$item->title}}" class="object-contain">
                </a>
            @endforeach
        </div>
    </div>

    <div class="effect-1 about-us-cta relative py-10" style="background: linear-gradient(112.58deg, #3C97F4 14.69%, #3BC2FC 100%);
        box-shadow: 0px 30px 60px rgba(0, 0, 0, 0.15);">
        <svg class="absolute top-0 left-0" width="566" height="239" viewBox="0 0 566 239" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_f_1286_1806)">
                <ellipse cx="140.229" cy="490.12" rx="140.229" ry="490.12"
                    transform="matrix(-0.931362 -0.364096 -0.85182 0.523835 426.375 -234.788)"
                    fill="url(#paint0_linear_1286_1806)" />
            </g>
            <defs>
                <filter id="filter0_f_1286_1806" x="-809.285" y="-540.922" width="1375.12" height="1023.64"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                    <feGaussianBlur stdDeviation="125" result="effect1_foregroundBlur_1286_1806" />
                </filter>
                <linearGradient id="paint0_linear_1286_1806" x1="140.229" y1="0" x2="140.229" y2="980.24"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#23B6AE" />
                    <stop offset="0.9999" stop-color="#F3A100" stop-opacity="0.72" />
                    <stop offset="1" stop-color="#23B6AE" />
                </linearGradient>
            </defs>
        </svg>

        <svg class="absolute top-0 left-0" width="676" height="239" viewBox="0 0 676 239" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <g opacity="0.5" filter="url(#filter0_f_1286_1805)">
                <ellipse cx="140.229" cy="490.12" rx="140.229" ry="490.12"
                    transform="matrix(-0.931362 -0.364096 -0.85182 0.523835 536.215 -84.1436)" fill="#DFDFDF" />
            </g>
            <defs>
                <filter id="filter0_f_1286_1805" x="-699.445" y="-390.278" width="1375.12" height="1023.64"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                    <feGaussianBlur stdDeviation="125" result="effect1_foregroundBlur_1286_1805" />
                </filter>
            </defs>
        </svg>

        <svg class="absolute bottom-1/2 transform translate-y-1/2 lg:right-10" width="306" height="239"
            viewBox="0 0 306 239" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect opacity="0.1" x="-10.8789" y="35.4785" width="255.414" height="255.414" rx="40"
                transform="rotate(-20 -10.8789 35.4785)" fill="white" />
        </svg>

        <svg class="absolute bottom-0 right-0" width="881" height="239" viewBox="0 0 881 239" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <g opacity="0.5" filter="url(#filter0_f_1286_1807)">
                <ellipse cx="369.686" cy="546.627" rx="369.686" ry="546.627"
                    transform="matrix(-0.931362 -0.364096 -0.85182 0.523835 1639.89 146.313)" fill="white" />
            </g>
            <defs>
                <filter id="filter0_f_1286_1807" x="0.8125" y="-268.42" width="1658.28" height="1132.95"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                    <feGaussianBlur stdDeviation="125" result="effect1_foregroundBlur_1286_1807" />
                </filter>
            </defs>
        </svg>

        <div class="flex justify-between container relative z-10">
            <div class="cta-content w-full lg:w-9/12 xl:w-7/12">
                <p class="text-2xl text-white mb-2" style="color: white!important;">{{ $sectionCta->excerpt }}</p>
                <h2 class="text-4xl text-white mb-4">{{ $sectionCta->title }}</h2>
                <div class="content">
                    {!! $sectionCta->content !!}
                </div>
            </div>
            <div class="flex items-end justify-end w-full lg:w-4/12 gap-9">
                <a href="{{url('/contact-us')}}" class="font-bold bg-white text-primary border-[2px] border-transparent py-3 px-6 rounded-full
                    transition-all duration-300
                    hover:bg-primary hover:text-white hover:border-white">
                    Contact Us
                </a>
                <a href="{{url('/contact-us#schedule-demo')}}" class="font-bold bg-transparent text-white border-[2px] border-white py-3 px-6 rounded-full
                transition-all duration-300
                hover:bg-white hover:text-primary hover:border-primary">
                    Demo
                </a>
            </div>
        </div>
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
    const highPerfDiv = document.querySelector('.partner');

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
