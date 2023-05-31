@extends('layouts.frontend')

@push('header')
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
@endpush

@php
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );  
@endphp

@section('content')

@include('frontend.product-and-service.header')

<div class=" container relative pt-10 lg:pt-20 pb-32 lg:pb-40 overflow-hidden">
    <svg xmlns="http://www.w3.org/2000/svg" width="752" height="752" viewBox="0 0 752 752" fill="none"
        class="absolute -z-10 lg:top-[-300px] lg:left-[200px]">
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
    <div class="effect-1 product-service-card grid grid-cols-1 lg:grid-cols-2 gap-10">
        @forelse ($productAndService->childs as $item)
        <div class="effect-2 card py-6 lg:py-9 px-8 lg:px-14">
            <div class="badge max-w-[80px] max-h-[80px]">
                @if(file_exists(public_path('/'.$item->image)))
                {!! file_get_contents(url($item->image), false, stream_context_create($arrContextOptions)) !!}
                @else
                {!! file_get_contents(url('images/product-service-card.svg'), false, stream_context_create($arrContextOptions)) !!}
                @endif
                
            </div>
            <h6 class="uppercase font-semibold heading-2 text-navy">{{ $item->title }}</h6>
            {!! $item->content !!}
            <div class="flex gap-5 justify-end items-center">
                <a href="{{ $item->contentMetas[0]->value ?? '/'}}"
                    class="text-primary paragraph-1 font-bold">Details</a>
                <i class="fas fa-arrow-right ms-1 text-primary font-bold" aria-hidden="true"></i>
            </div>
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

    const btnScrollToTop = document.querySelector('.scrolltop');
    const highPerfDiv = document.querySelector('.collaboration');

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
