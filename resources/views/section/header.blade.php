<section class="header relative">

    @php
        // dd($solution);
    @endphp
    @if(file_exists(public_path('/'.$solution->image)))
    <img class="absolute z-0 w-full h-full object-cover" src="{{ url($solution->image) }}" alt="">
    @else
    <img class="absolute z-0 w-full h-full object-cover" src="{{ url('images/header.png') }}" alt="">
    @endif
    
    <div class="container py-10 h-full top-0 relative z-10">
        <div class="flex gap-2 sm:gap-3 md:gap-4 lg:gap-5 xl:gap-6 flex-col">
            <ul class="effect-1 flex gap-2 text-white heading-4 font-medium">
                <li class="paragraph-2 breadcumb"><a href="/">Home</a></li>
                <li class="paragraph-2 breadcumb">/</li>
                <li class="paragraph-2 breadcumb"><a href="/#solutions">Solutions</a></li>
                <li class="paragraph-2 breadcumb">/</li>
                <li class="paragraph-2 breadcumb">{{$solution->title}}</li>
            </ul>

            <div class="flex flex-row gap-4 sm:gap-6 md:gap-8 lg:gap-9 xl:gap-10 items-center">
                <h1 class="effect-1 uppercase font-bold heading-1 text-white">{{$solution->title}}</h1>
                <div class="effect-2">
                    <div class="badge w-fit">
                        @if(file_exists(public_path('/'.$solution->icon)))
                        <img width="80" height="50" src="{{ url($solution->icon) }}" class="avatar avatar-sm"
                            style="object-fit: contain;" alt="" id="preview-icon-2">
                        @else
                        <img width="80" height="50" src="{{ url('images/insurance-ico.svg') }}" class="avatar avatar-sm"
                            style="object-fit: contain;" alt="" id="preview-icon-2">
                        @endif
                    </div>
                </div>
            </div>
            <div class="heading-desc-solution effect-3">
                {!! $solution->description!!}
            </div>
        </div>
    </div>
</section>
