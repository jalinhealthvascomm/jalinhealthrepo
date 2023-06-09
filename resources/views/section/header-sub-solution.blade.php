<section class="header relative">

    <img class="header-img absolute z-0 w-full h-full object-cover" src="{{ url($subSolutions[0]->image) }}" alt="">
    <div class="container py-10 h-full top-0 relative z-10">
        <div class="">
            <ul class="effect-1 flex gap-2 text-white heading-4 font-medium">
                <li class="paragraph-2 breadcumb"><a href="/">Home</a></li>
                <li class="paragraph-2 breadcumb">/</li>
                <li class="paragraph-2 breadcumb"><a href="/#solutions">Solutions</a></li>
                <li class="paragraph-2 breadcumb">/</li>
                <li class="paragraph-2 breadcumb"><a href="{{'/solutions/'.$solution->slug}}">{{$solution->title}}</a></li>
                <li class="paragraph-2 breadcumb">/</li>
                <li class="paragraph-2" id="sub-heading-breadcumb">{{$subSolutions[0]->title}}</li>
            </ul>

            <div class="flex flex-col-reverse gap-4 sm:gap-6 md:gap-8 lg:gap-9 xl:gap-10 items-center">
                <h1 class="effect-1 uppercase font-bold heading-1 text-white" id="sub-heading-title">{{$subSolutions[0]->title}}</h1>
                <div class="effect-2">
                    <div class="badge w-fit">
                        @if(file_exists(public_path('/'.$subSolutions[0]->icon)))
                        <img width="80" height="50" src="{{ url($subSolutions[0]->icon) }}" class="avatar avatar-sm"
                            style="object-fit: contain;" alt="" id="preview-icon-2">
                        @else
                        <img width="80" height="50" src="{{ url('images/insurance-icon.svg') }}" class="avatar avatar-sm"
                            style="object-fit: contain;" alt="" id="preview-icon-2">
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="effect-2 heading-desc-sub-solution effect-3 mx-auto mt-5" id="sub-heading-desc">
                {!! $subSolutions[0]->description!!}
            </div>
        </div>
    </div>
</section>
