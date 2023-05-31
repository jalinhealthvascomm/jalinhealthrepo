@extends('layouts.frontend')

@php
    
    
@endphp

@section('content')

@include('frontend.resource.header')

<div class="resources-content pt-10 pb-40 overflow-hidden">

    <div class="" id="main-resources"></div>

    {{-- <div class="container pt-20">
        <h2 class="font-bold heading-2 text-navy pb-8">Discover more topics you care about</h2>
        <ul class="flex gap-3">
            @foreach ($categories as $category)
                @if ($category->id == 1)
                    <li class="">
                        <button onclick="allResources()" id="{{ $category->slug }}" class="px-6 py-3 font-bold text-base chips {{ (Request::is(['resources']) ? 'chips__active' : 'text-gray-4') }}">All</button>
                    </li>
                @else
                    <li class="">
                        {<a href="{{url('/resources/category/'.$category->slug)}}" class="px-6 py-3 font-bold text-base chips {{ (Request::is(['resources/category/'.$category->slug]) ? 'chips__active' : 'text-gray-4') }}">{{ $category->title }}</a>
                        <button onclick="selectedCat('{{$category->slug }}')" id="{{ $category->slug }}" class="px-6 py-3 font-bold text-base chips text-gray-4">{{ $category->title }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div> --}}

    {{-- <div class="container py-10"> --}}

        {{-- <div class="grid grid-cols-1 gap-7 lg:grid-cols-4 lg:gap-12 list-resources">
            @foreach ($resources as $resource)
            <article class="card card-resource">
                <div class="card-content justify-between flex-grow">
                    @if (!empty($resource->image))
                        @if(file_exists(public_path('/'.$resource->image)))
                        <img src="{{ url($resource->image) }}" alt="{{ $resource->title }}" class="w-full object-cover min-h-[260px]">
                        @else
                        <img src="{{ url('/images/not-found-icon.png') }}" alt="{{ $resource->title }}" class="w-full object-cover min-h-[260px]">
                        @endif
                    @else
                    <img src="{{ url('/images/not-found-icon.png') }}" alt="{{ $resource->title }}" class="w-full object-cover min-h-[260px]">
                    @endif
                    
                    <div class="px-4">
                        <span class="text-gray-3 paragraph-2">
                            @if ($resource->resourceCategory->id !== 1)
                             {{$resource->resourceCategory->title}}
                            @endif
                        </span>
                        <a href="{{ '/resources/'. $resource->slug }}">
                            <h2 class="paragraph-1 font-bold">{{ $resource->title }}</h2>
                        </a>
                    </div>
                </div>
                <div class="card-footer card-footer__end px-4 pb-4">
                    <a href="{{ '/resources/'. $resource->slug }}" class="paragraph-2 text-primary font-medium">See Detail</a>
                </div>
            </article> 
            @endforeach
        </div> --}}

        {{-- @if (count($resources) < 1 || empty($resources))
        <div class="effect-1 looping-notfound w-full lg:min-h-[500px]">
            <div class="flex justify-center items-center mb-10">
                <img src="{{ $noResultData->contentMetas[0] ? $noResultData->contentMetas[0]->value : url('/images/not-found-icon.png') }}" alt="" class="w-[174px] h-auto object-cover">
            </div>

            <div class="">
                <div class=" flex justify-center mb-6">
                    <h1 class="paragraph-1 uppercase font-bold text-navy">{{ $noResultData->excerpt }}<h1>
                </div>
                <div class="flex justify-center text-center">
                    <p class="paragraph-1 text-gray-3 w-[60%]">{{ $noResultData->content }}</p>
                </div>
            </div>
        </div>
        @endif --}}

    {{-- </div> --}}

    {{-- @if (!empty($resources))
    {{ $resources->appends(Request::all())->onEachSide(5)->links() }}
    @endif --}}

    

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
    const highPerfDiv = document.querySelector('.resources-content');

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

    function selectedCat(slug){
        axios({
            method: 'get',
            url: '/api/resources/category/' + slug,
        })
        .then(function (response) {
        })
        .catch(function (error) {
        })
    }

    function allResources(){
        axios({
            method: 'get',
            url: '/api/resources',
        })
        .then(function (response) {
        })
        .catch(function (error) {
        })
    }
</script>


<script src="/js/resources.js"></script>

@endpush
