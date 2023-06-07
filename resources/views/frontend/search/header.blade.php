<section class="search-page header relative flex items-center">
    
    @if(file_exists(public_path('/'.$noDataResult->image)))
    <img class="absolute z-0 w-full h-full object-cover" src="{{ url($noDataResult->image) }}" alt="">
    @else
    <img class="absolute z-0 w-full h-full object-cover" src="{{ url('images/search-header.jpg') }}" alt="">
    @endif
    <div class="container py-10 h-full top-0 relative z-10">
        <div class="flex gap-2 sm:gap-3 md:gap-4 lg:gap-5 xl:gap-6 flex-col">
            <div class="flex flex-row gap-4 sm:gap-6 md:gap-8 lg:gap-9 xl:gap-10 items-center justify-center">
                @empty(!$results)
                <h1 class="effect-1 uppercase font-bold heading-1 text-white">Search Result</h1>
                @endempty
            </div>
            {{-- <div class="heading-sub-title effect-3 text-center" style="justify-content: center!important;">
                <p>{{$noDataResult->content}}</p>
            </div> --}}
        </div>
    </div>
</section>
