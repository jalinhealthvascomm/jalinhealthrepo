@extends('layouts.frontend')


@push('header')
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
@endpush

@section('content')

@include('frontend.search.header')

<div class="search pb-20 lg:pb-32 overflow-hidden">

    <div class="container search-result effect-1 pt-5 pb-10 lg:pt-10 lg:pb-14">
        <h3 class="font-[#828282] md:text-lg text-sm font-bold text-[#828282] pb-5 tracking-wider">{{ count($results) }} <span class="font-normal">Result from your search </span> <span id="keyword">{{ $keyword }}</span></h3>
    </div>

    <div class="effect-1 result-list container flex gap-10 flex-col" id="result-list">
        @forelse ($results as $item)
        <div class="looping-search flex flex-col gap-4">
            <h1 class="heading-3 text-navy font-bold">{{ $item->title }}</h1>
            <div class="search-content">
                {!! $item->content !!}
            </div>
            
            <a href="{{ url($item->url) }}" class="text-primary flex items-center gap-5 paragraph-1">see more
                <svg class="w-3 h-3" width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.3 11.275C9.1 11.075 9.004 10.8334 9.012 10.55C9.02067 10.2667 9.125 10.025 9.325 9.82505L12.15 7.00005H1C0.716667 7.00005 0.479 6.90405 0.287 6.71205C0.0956668 6.52072 0 6.28338 0 6.00005C0 5.71672 0.0956668 5.47905 0.287 5.28705C0.479 5.09572 0.716667 5.00005 1 5.00005H12.15L9.3 2.15005C9.1 1.95005 9 1.71238 9 1.43705C9 1.16238 9.1 0.925049 9.3 0.725049C9.5 0.525049 9.73767 0.425049 10.013 0.425049C10.2877 0.425049 10.525 0.525049 10.725 0.725049L15.3 5.30005C15.4 5.40005 15.471 5.50838 15.513 5.62505C15.5543 5.74172 15.575 5.86672 15.575 6.00005C15.575 6.13338 15.5543 6.25838 15.513 6.37505C15.471 6.49172 15.4 6.60005 15.3 6.70005L10.7 11.3C10.5167 11.4834 10.2877 11.575 10.013 11.575C9.73767 11.575 9.5 11.475 9.3 11.275Z" fill="#007FFF"/>
                </svg>
            </a>
        </div>
        @empty
        <div class="effect-1 looping-notfound w-full lg:min-h-[500px]">
            <div class="flex justify-center items-center mb-10">
                <img src="{{ $noDataResult->contentMetas[0] ? $noDataResult->contentMetas[0]->value : url('/images/not-found-icon.png') }}" alt="" class="w-[174px] h-auto object-cover">
            </div>

            <div class="">
                <div class=" flex justify-center mb-6">
                    <h1 class="paragraph-1 uppercase font-bold text-navy">{{ $noDataResult->excerpt }}<h1>
                </div>
                <div class="flex justify-center text-center">
                    <p class="paragraph-1 text-gray-3 w-1/2">{{ $noDataResult->content }}</p>
                </div>
            </div>
        </div>
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
    const highPerfDiv = document.querySelector('.search-result');

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


    function highlight(text, el) {
        var inputText = el;
        var innerHTML = inputText.innerHTML;
        var index = innerHTML.toLowerCase().search(text.toLowerCase());
        if (index >= 0) { 
            innerHTML = innerHTML.substring(0,index) + "<span class='highlight'>" + innerHTML.substring(index,index+text.length) + "</span>" + innerHTML.substring(index + text.length);
            inputText.innerHTML = innerHTML;
        }

        var re = new RegExp(text,"g");
        innerHTML.replace(re,'<span class="highlight">'+text+'</span>');
    }
    

    var keyword = document.getElementById('keyword');
    // highlight(keyword.innerHTML);

    let varz = document.querySelectorAll('.search-content p');
    varz.forEach(element => {
        highlight(keyword.innerHTML, element);
    });
</script>
@endpush
