<section class="collaboration">
    @php
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );  
@endphp
    <div class="relative mb-[120px] lg:mb-[467px]">

        <div class="effect-1 absolute w-full lg:relative h-full md:h-[400px] lg:h-[385px] rounded-lg"
            style="background: linear-gradient(112.58deg, #3C97F4 14.69%, #3BC2FC 100%);">
            <!-- icon Rounded -->
            <svg class="w-[300px] md:w-[544px] absolute left-0 top-0" width="544" height="385" viewBox="0 0 544 385"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.1" filter="url(#filter0_d_1182_766)">
                    <circle cx="155" cy="191" r="309" fill="white" />
                </g>
                <g opacity="0.1" filter="url(#filter1_d_1182_766)">
                    <circle cx="155" cy="191" r="259" fill="white" />
                </g>
                <defs>
                    <filter id="filter0_d_1182_766" x="-234" y="-198" width="778" height="778"
                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                            result="hardAlpha" />
                        <feOffset />
                        <feGaussianBlur stdDeviation="40" />
                        <feComposite in2="hardAlpha" operator="out" />
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0.498039 0 0 0 0 1 0 0 0 0.16 0" />
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1182_766" />
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1182_766" result="shape" />
                    </filter>
                    <filter id="filter1_d_1182_766" x="-184" y="-148" width="678" height="678"
                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                            result="hardAlpha" />
                        <feOffset />
                        <feGaussianBlur stdDeviation="40" />
                        <feComposite in2="hardAlpha" operator="out" />
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0.498039 0 0 0 0 1 0 0 0 0.16 0" />
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1182_766" />
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1182_766" result="shape" />
                    </filter>
                </defs>
            </svg>

            <!-- icon outline rounded -->
            <svg class="w-[100px] h-[100px] sm:w-[200px] sm:h-[200px] md:w-[399px] md:h-[399px] absolute right-0 top-0"
                width="399" height="385" viewBox="0 0 399 385" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.1" filter="url(#filter0_d_570_1574)">
                    <circle cx="302" cy="258" r="220" stroke="white" stroke-width="4" shape-rendering="crispEdges" />
                </g>
                <defs>
                    <filter id="filter0_d_570_1574" x="0" y="-44" width="604" height="604" filterUnits="userSpaceOnUse"
                        color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                            result="hardAlpha" />
                        <feOffset />
                        <feGaussianBlur stdDeviation="40" />
                        <feComposite in2="hardAlpha" operator="out" />
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0.498039 0 0 0 0 1 0 0 0 0.16 0" />
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_570_1574" />
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_570_1574" result="shape" />
                    </filter>
                </defs>
            </svg>
        </div>

        <div
            class="container pt-12 pb-12 sm:pt-14 sm:pb-14 md:pb-0 md:pt-[80px] lg:pt-0 lg:left-1/2 lg:-translate-x-1/2 lg:absolute lg:top-full lg:-translate-y-1/2">
            <div
                class="wrapper-card effect-2 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1  lg:grid-cols-3 xl:grid-cols-3 gap-4 md:gap-5 lg:gap-8 xl:gap-10">

                @forelse ($solution->subSolutions as $key => $subSolution)
                <div class="card-list flex flex-col justify-between relative p-5 sm:p-5 md:p-5 lg:p-6 bg-white rounded-2xl overflow-hidden"
                    style="box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.08);">
                    <div class="flex flex-col gap-2 sm:gap-3 md:gap-4 lg:gap-5 xl:gap-6">
                        <div class="flex justify-between items-center">
                            <h6 class="uppercase text-navy font-bold heading-2 w-3/4">{{$subSolution->title}}</h6>
                            <div class="badge">
                                @if ( $key == 0)
                                    {!! file_get_contents(url('/images/ico_setting.svg'), false, stream_context_create($arrContextOptions)) !!}
                                @elseif ( $key == 1 )
                                    {!! file_get_contents(url('/images/ico_user-group.svg'), false, stream_context_create($arrContextOptions)) !!}
                                @else
                                    {!! file_get_contents(url('/images/ico_report-box.svg'), false, stream_context_create($arrContextOptions)) !!}
                                @endif
                            </div>
                        </div>
                        <div class="sub-sulution-item paragraph-1">
                            {!!$subSolution->detail!!}
                        </div>
                    </div>
                    <a href="/solutions/{{$solution->slug}}/detail#{{ $subSolution->slug }}"
                        class="text-primary my-0 sm:my-2 md:my-4 lg:my-8 xl:my-10 paragraph-1 font-normal py-3 gap-1 sm:gap-2 md:gap-3 xl:gap-4 flex flex-row items-center justify-end">See
                        More
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.3 17.275C13.1 17.075 13.004 16.8333 13.012 16.55C13.0207 16.2667 13.125 16.025 13.325 15.825L16.15 13H5C4.71667 13 4.479 12.904 4.287 12.712C4.09567 12.5207 4 12.2833 4 12C4 11.7167 4.09567 11.479 4.287 11.287C4.479 11.0957 4.71667 11 5 11H16.15L13.3 8.14999C13.1 7.94999 13 7.71232 13 7.43699C13 7.16232 13.1 6.92499 13.3 6.72499C13.5 6.52499 13.7377 6.42499 14.013 6.42499C14.2877 6.42499 14.525 6.52499 14.725 6.72499L19.3 11.3C19.4 11.4 19.471 11.5083 19.513 11.625C19.5543 11.7417 19.575 11.8667 19.575 12C19.575 12.1333 19.5543 12.2583 19.513 12.375C19.471 12.4917 19.4 12.6 19.3 12.7L14.7 17.3C14.5167 17.4833 14.2877 17.575 14.013 17.575C13.7377 17.575 13.5 17.475 13.3 17.275Z"
                                    fill="#007FFF" />
                            </svg>
                        </span>
                    </a>
                    <span class="absolute bg-secondary h-1 sm:h-2 md:h-3 left-0 w-full bottom-0"></span>
                </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</section>
