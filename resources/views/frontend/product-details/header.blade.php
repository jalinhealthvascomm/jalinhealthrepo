
<section class="product-details header relative">
    @if(file_exists(public_path('/'.$productDetails->image)))
    <img class="absolute z-0 w-full h-full object-cover" src="{{ url($productDetails->image) }}" alt="">
    @else
    <img class="absolute z-0 w-full h-full object-cover" src="{{ url('images/header-services-details.jpg') }}" alt="">
    @endif
    
    <div class="container py-10 h-full top-0 relative z-10">
        <div class="flex gap-2 sm:gap-3 md:gap-4 lg:gap-5 xl:gap-6 flex-col">
            <ul class="effect-1 flex gap-2 text-white paragraph-2 font-medium">
                <li class="paragraph-2"><a href="/">Home</a></li>
                <li class="paragraph-2">/</li>
                <li class="paragraph-2"><a href="{{ '/'. $productServicesParent->slug }}">Product & Services</a></li>
                <li class="paragraph-2">/</li>
                <li class="paragraph-2">{{$productDetails->title}}</li>
            </ul>

            <div class="flex flex-row gap-4 sm:gap-6 md:gap-8 lg:gap-9 xl:gap-10 items-center justify-start">
                <h1 class="effect-1 uppercase font-bold heading-1 text-white">{{$productDetails->title}}</h1>
            </div>
            <div class="heading-sub-title effect-3">
                {!! $productDetails->excerpt!!}
            </div>
        </div>
    </div>
</section>
