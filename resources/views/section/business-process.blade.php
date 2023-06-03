
@php
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );     
@endphp

<section id="solutions" class="business-process py-20">
    <div class="container">
        <div class="effect-2 flex flex-col gap-6 items-center section-title">
            {!! $cardList['elements']['content-headline']['content']!!}
            {!! $cardList['elements']['section-title']['content']!!}
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-7 md:gap-8 lg:gap-10 xl:gap-[42px] mt-20">
            <!--  card 1 -->
            <div class="card-wrapper">
                <div class="effect-1 card-process p-2.5 rounded-lg h-fit" style="box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.08);">
                    <div class="card-border gap-4 sm:gap-6 md:gap-10 flex flex-col rounded-lg p-6">
                        <div class="flex flex-col gap-4 sm:gap-6 md:gap-8">
                            <div class="badge bg-[#007FFF] w-[80px] h-[80px] flex items-center justify-center rounded-full mx-auto">
                                {{-- <img width="45" height="45" src="{{ url($cardList['elements']['solution-card-item-1']['icon']) }}" class="avatar avatar-sm"
                                style="object-fit: contain;" alt="" id="preview-icon-2"> --}}
                                @if(file_exists(public_path('/'.$cardList['elements']['solution-card-item-1']['icon'])))
                                {!! file_get_contents(url($cardList['elements']['solution-card-item-1']['icon']), false, stream_context_create($arrContextOptions)) !!}
                                @else
                                {!! file_get_contents(url('/images/insurance-ico.svg'), false, stream_context_create($arrContextOptions)) !!}
                                @endif
                                
                            </div>
                            <h3 class="text-navy text-center heading-3 uppercase font-bold">
                                {{$cardList['elements']['solution-card-item-1']['content']}}
                            </h3>
                        </div>

                        <a href="{{$cardList['elements']['solution-card-item-1']['url']}}" class="btn rounded-full w-full md:w-1/2 text-center mx-auto bg-primary font-bold text-white ">Detail</a>
                    </div>
                </div>
            </div>

            <!--  card 2 -->
            <div class="card-wrapper">
            <div class="effect-1 card-process p-2.5 rounded-lg h-fit" style="box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.08);">
                <div class="card-border gap-4 sm:gap-6 md:gap-10 flex flex-col rounded-lg p-6">
                    <div class="flex flex-col gap-4 sm:gap-6 md:gap-8">
                        <div class="badge bg-[#007FFF] w-[80px] h-[80px] flex items-center justify-center rounded-full mx-auto">
                            {{-- <img width="45" height="45" src="{{ url($cardList['elements']['solution-card-item-2']['icon']) }}" class="avatar avatar-sm"
                            style="object-fit: contain;" alt="" id="preview-icon-2"> --}}
                            @if(file_exists(public_path('/'.$cardList['elements']['solution-card-item-2']['icon'])))
                            {!! file_get_contents(url($cardList['elements']['solution-card-item-2']['icon']), false, stream_context_create($arrContextOptions)) !!}
                            {{-- @else
                            {!! file_get_contents(url('/images/tpas-icon.svg'), false, stream_context_create($arrContextOptions)) !!} --}}
                            @endif
                            
                        </div>
                        <h3 class="text-navy text-center heading-3 uppercase font-bold">
                            {{$cardList['elements']['solution-card-item-2']['content']}}
                        </h3>
                    </div>

                    <a href="{{$cardList['elements']['solution-card-item-2']['url']}}" class="btn rounded-full w-full md:w-1/2 text-center mx-auto bg-primary font-bold text-white ">Detail</a>
                </div>
            </div>
            </div>

            <!--  card 3 -->
            <div class="card-wrapper">
            <div class="effect-1 card-process p-2.5 rounded-lg h-fit" style="box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.08);">
                <div class="card-border gap-4 sm:gap-6 md:gap-10 flex flex-col rounded-lg p-6">
                    <div class="flex flex-col gap-4 sm:gap-6 md:gap-8">
                        <div class="badge bg-[#007FFF] w-[80px] h-[80px] flex items-center justify-center rounded-full mx-auto">
                            {{-- <img width="45" height="45" src="{{ url($cardList['elements']['solution-card-item-3']['icon']) }}" class="avatar avatar-sm"
                            style="object-fit: contain;" alt="" id="preview-icon-2"> --}}
                            @if(file_exists(public_path('/'.$cardList['elements']['solution-card-item-3']['icon'])))
                            {!! file_get_contents(url($cardList['elements']['solution-card-item-3']['icon']), false, stream_context_create($arrContextOptions)) !!}
                            @else
                            {!! file_get_contents(url('/images/goverment-ico.svg'), false, stream_context_create($arrContextOptions)) !!}
                            @endif
                            
                        </div>
                        <h3 class="text-navy text-center heading-3 uppercase font-bold">
                            {{$cardList['elements']['solution-card-item-3']['content']}}
                        </h3>
                    </div>

                    <a href="{{$cardList['elements']['solution-card-item-3']['url']}}" class="btn rounded-full w-full md:w-1/2 text-center mx-auto bg-primary font-bold text-white ">Detail</a>
                </div>
            </div>
            </div>

        </div>
    </div>
</section>

