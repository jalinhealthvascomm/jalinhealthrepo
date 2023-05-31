@extends('layouts.frontend')

@php
    
@endphp
@section('content')

@include('section.header-sub-solution')

<section class="bg-white effect-2" style="box-shadow: 0px 0px 80px rgba(0, 127, 255, 0.16);">
    <div class="container">
        <ul class="flex justify-around sm:justify-center  sm:gap-10">
            <li class="relative py-4 menu-effect-2">
                <a href="#">Operation</a>
                <span class="h-1 bottom-0 absolute left-0 w-full"
                    style="background: linear-gradient(112.58deg, #3C97F4 14.69%, #3BC2FC 100%);"></span>
            </li>
            <li class="relative py-4 menu-effect-3">
                <a href="#">Collaboration</a>
                <span class="h-1 bottom-0 absolute left-0 w-full"
                    style="background: linear-gradient(112.58deg, #FFFF 14.69%, #FFFF 100%);"></span>
            </li>
            <li class="relative py-4 menu-effect-4">
                <a href="#">Reporting</a>
                <span class="h-1 bottom-0 absolute left-0 w-full"
                    style="background: linear-gradient(112.58deg, #FFFF 14.69%, #FFFF 100%);"></span>
            </li>
        </ul>

    </div>
</section>

<article class="sub-detail pt-20 md:pt-[50px]  xl:pt-[60px] pb-20 sm:pb-12 md:pb-14 lg:pb-16 xl:pb-20">
    <div class="container effect-3">
            {!! $subSolution->detail!!}
    </div>
</article>

<section>
    <div class="container">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-7 sm:gap-y-8 md:gap-y-10 lg:gap-y-14 xl:gap-y-20 gap-x-6 sm:gap-x-10 md:gap-x-16 lg:gap-x-[80px] xl:gap-x-[156px]">
            @forelse ($features as $feature)
            <div class="flex gap-5 sm:gap-6 lg:gap-7 xl:gap-[30px]">
                <span class="effect-1">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.6654 27.6667L29.4154 15.9167L27.082 13.5834L17.6654 23L12.9154 18.25L10.582 20.5834L17.6654 27.6667ZM19.9987 36.6667C17.6931 36.6667 15.5265 36.2289 13.4987 35.3534C11.4709 34.4789 9.70703 33.2917 8.20703 31.7917C6.70703 30.2917 5.51981 28.5278 4.64536 26.5C3.76981 24.4723 3.33203 22.3056 3.33203 20C3.33203 17.6945 3.76981 15.5278 4.64536 13.5C5.51981 11.4723 6.70703 9.70837 8.20703 8.20837C9.70703 6.70837 11.4709 5.5206 13.4987 4.64504C15.5265 3.7706 17.6931 3.33337 19.9987 3.33337C22.3043 3.33337 24.4709 3.7706 26.4987 4.64504C28.5265 5.5206 30.2904 6.70837 31.7904 8.20837C33.2904 9.70837 34.4776 11.4723 35.352 13.5C36.2276 15.5278 36.6654 17.6945 36.6654 20C36.6654 22.3056 36.2276 24.4723 35.352 26.5C34.4776 28.5278 33.2904 30.2917 31.7904 31.7917C30.2904 33.2917 28.5265 34.4789 26.4987 35.3534C24.4709 36.2289 22.3043 36.6667 19.9987 36.6667Z"
                            fill="#23B6AE" />
                    </svg>
                </span>

                <div class="flex flex-col gap-5 sm:gap-6 md:gap-8 xl:gap-10">
                    <h2 class="menu-effect-1 heading-2  text-navy font-medium">{{ $feature->features }}</h2>

                    <div class="effect-2 feature-item">
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

    <img class="z-0 object-left md:object-center object-cover xl:object-fill absolute top-0 left-0 h-full w-full" src="{{ asset('images/footer.png') }}" alt="images">

    <div class="container relative z-10">
        <h2 class="effect-1 heading-1 text-white leading-snug xl:leading-relaxed font-medium mx-auto text-center max-w-[709px]">
            More about features <br> of Jalin Health Solution for Payers
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4 md:gap-0 mt-10"
            x-data="
            {
                featured:
                {
                    featured1:
                        [
                            {
                                title : 'Claim management, including auto-adjudicationand batch re-adjudication',
                            },
                            {
                                title : 'Flexible benefit plan administration (multiple product, multiple line of business support)',
                            },
                            {
                                title : 'Referral and authorization management',
                            },
                            {
                                title : 'Robust member and eligibility management',
                            },
                            {
                                title : 'Premium billing administration',
                            }
                        ],

                    featured2:
                        [
                            {
                                title : 'Real-time portals and batch EDI services',
                            },
                            {
                                title : 'Real-time claim editing',
                            },
                            {
                                title : 'Intelligent alerts and reporting',
                            },
                            {
                                title : 'Capitation capabilities',
                            },
                            {
                                title : 'Easy-to-manage multi-level security',
                            },
                            {
                                title : 'Configurable add-ons such as external Medicare grouper and pricer routines'
                            }
                        ]

                }
            }"
        >
            <div class="flex flex-col gap-3 md:gap-4 lg:gap-5 xl:gap-6 effect-2">
                @forelse ($featured1 as $item)
                <div class="flex items-center md:items-start gap-4" >
                    <span class="pt-1.5">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.6 13.8L8.425 11.625C8.24167 11.4417 8.01667 11.35 7.75 11.35C7.48333 11.35 7.25 11.45 7.05 11.65C6.86667 11.8333 6.775 12.0667 6.775 12.35C6.775 12.6333 6.86667 12.8667 7.05 13.05L9.9 15.9C10.0833 16.0833 10.3167 16.175 10.6 16.175C10.8833 16.175 11.1167 16.0833 11.3 15.9L16.975 10.225C17.1583 10.0417 17.25 9.81667 17.25 9.55C17.25 9.28333 17.15 9.05 16.95 8.85C16.7667 8.66667 16.5333 8.575 16.25 8.575C15.9667 8.575 15.7333 8.66667 15.55 8.85L10.6 13.8ZM12 22C10.6167 22 9.31667 21.7373 8.1 21.212C6.88333 20.6873 5.825 19.975 4.925 19.075C4.025 18.175 3.31267 17.1167 2.788 15.9C2.26267 14.6833 2 13.3833 2 12C2 10.6167 2.26267 9.31667 2.788 8.1C3.31267 6.88333 4.025 5.825 4.925 4.925C5.825 4.025 6.88333 3.31233 8.1 2.787C9.31667 2.26233 10.6167 2 12 2C13.3833 2 14.6833 2.26233 15.9 2.787C17.1167 3.31233 18.175 4.025 19.075 4.925C19.975 5.825 20.6873 6.88333 21.212 8.1C21.7373 9.31667 22 10.6167 22 12C22 13.3833 21.7373 14.6833 21.212 15.9C20.6873 17.1167 19.975 18.175 19.075 19.075C18.175 19.975 17.1167 20.6873 15.9 21.212C14.6833 21.7373 13.3833 22 12 22Z"
                                fill="white" />
                        </svg>
                    </span>

                    <p class="text-white font-normal heading-3">{{$item['title']}}</p>

                </div>
                @empty
                    
                @endforelse
            </div>

            <div class="flex flex-col gap-3 md:gap-4 lg:gap-5 xl:gap-6 effect-2">
                @forelse ($featured2 as $item)
                <div class="flex items-center md:items-start gap-4" >
                    <span class="pt-1.5">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.6 13.8L8.425 11.625C8.24167 11.4417 8.01667 11.35 7.75 11.35C7.48333 11.35 7.25 11.45 7.05 11.65C6.86667 11.8333 6.775 12.0667 6.775 12.35C6.775 12.6333 6.86667 12.8667 7.05 13.05L9.9 15.9C10.0833 16.0833 10.3167 16.175 10.6 16.175C10.8833 16.175 11.1167 16.0833 11.3 15.9L16.975 10.225C17.1583 10.0417 17.25 9.81667 17.25 9.55C17.25 9.28333 17.15 9.05 16.95 8.85C16.7667 8.66667 16.5333 8.575 16.25 8.575C15.9667 8.575 15.7333 8.66667 15.55 8.85L10.6 13.8ZM12 22C10.6167 22 9.31667 21.7373 8.1 21.212C6.88333 20.6873 5.825 19.975 4.925 19.075C4.025 18.175 3.31267 17.1167 2.788 15.9C2.26267 14.6833 2 13.3833 2 12C2 10.6167 2.26267 9.31667 2.788 8.1C3.31267 6.88333 4.025 5.825 4.925 4.925C5.825 4.025 6.88333 3.31233 8.1 2.787C9.31667 2.26233 10.6167 2 12 2C13.3833 2 14.6833 2.26233 15.9 2.787C17.1167 3.31233 18.175 4.025 19.075 4.925C19.975 5.825 20.6873 6.88333 21.212 8.1C21.7373 9.31667 22 10.6167 22 12C22 13.3833 21.7373 14.6833 21.212 15.9C20.6873 17.1167 19.975 18.175 19.075 19.075C18.175 19.975 17.1167 20.6873 15.9 21.212C14.6833 21.7373 13.3833 22 12 22Z"
                                fill="white" />
                        </svg>
                    </span>

                    <p class="text-white font-normal heading-3">{{$item['title']}}</p>

                </div>
                @empty
                    
                @endforelse
            </div>
        </div>

    </div>

</section>

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
@endpush