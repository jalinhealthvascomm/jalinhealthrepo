@php
    $contact = App\Models\SiteContent::where('id', '=', '21')
        ->with(['contentMetas'])
        ->firstOrFail();

    $sosmed = App\Models\ContentMeta::where('key', 'LIKE', 'sosmed-%')
        ->where('site_content_id', '=', '21')
        ->get();
@endphp
<header>
    <div class="effect-1 bg-gray-6 hidden lg:flex">
        <div class="container ">
            <div class="effect-1 flex py-2 sm:justify-between">
                <ul class="flex gap-6">
                    <li class="menu-effect-1 flex gap-4 items-center">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_333_256)">
                                <path
                                    d="M14.7162 10.5022C13.7366 10.5022 12.7747 10.349 11.8633 10.0478C11.4167 9.89542 10.8676 10.0352 10.595 10.3151L8.796 11.6732C6.70963 10.5595 5.42446 9.27475 4.32596 7.20404L5.64408 5.45188C5.98654 5.10988 6.10938 4.61029 5.96221 4.14154C5.65971 3.22529 5.50604 2.26392 5.50604 1.28392C5.50608 0.575958 4.93013 0 4.22221 0H1.28387C0.575958 0 0 0.575958 0 1.28387C0 9.39846 6.60158 16 14.7162 16C15.4241 16 16 15.424 16 14.7161V11.786C16 11.0781 15.424 10.5022 14.7162 10.5022Z"
                                    fill="#1C2841" />
                            </g>
                            <defs>
                                <clipPath id="clip0_333_256">
                                    <rect width="16" height="16" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p class="paragraph-3 text-[#1C2841]">{{ $contact->contentMetas[1]->value ?? ''}}</p>
                    </li>
                    <li class="menu-effect-1 flex gap-4 items-center">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_333_260)">
                                <path
                                    d="M14.5947 1.90625H1.40716C1.19069 1.90625 0.988031 1.95947 0.804688 2.04719L7.96966 9.21216L9.57556 7.66881C9.57556 7.66881 9.57569 7.66866 9.57572 7.66859C9.57575 7.66853 9.57588 7.66847 9.57588 7.66847L15.1973 2.04731C15.014 1.95953 14.8112 1.90625 14.5947 1.90625Z"
                                    fill="#1C2841" />
                                <path
                                    d="M15.8604 2.71021L10.5703 8.00002L15.8602 13.2899C15.9479 13.1066 16.0012 12.9039 16.0012 12.6875V3.31246C16.0012 3.09611 15.9481 2.89349 15.8604 2.71021Z"
                                    fill="#1C2841" />
                                <path
                                    d="M0.140938 2.70996C0.0532188 2.8933 0 3.09596 0 3.31243V12.6874C0 12.9038 0.0531562 13.1065 0.140813 13.2897L5.43091 7.99993L0.140938 2.70996Z"
                                    fill="#1C2841" />
                                <path
                                    d="M9.90549 8.6629L8.29936 10.2064C8.2078 10.298 8.08786 10.3438 7.96795 10.3438C7.84805 10.3438 7.72808 10.298 7.63655 10.2064L6.09292 8.66284L0.802734 13.9527C0.986109 14.0405 1.18889 14.0937 1.40542 14.0937H14.5929C14.8094 14.0937 15.012 14.0405 15.1954 13.9528L9.90549 8.6629Z"
                                    fill="#1C2841" />
                            </g>
                            <defs>
                                <clipPath id="clip0_333_260">
                                    <rect width="16" height="16" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                
                        <a href="mailto:{{$contact->contentMetas[0]->value ?? ''}}"
                            class="paragraph-3 text-[#1C2841]">{{ $contact->contentMetas[0]->value ?? ''}}</a>
                    </li>
                </ul>

                <div>
                    <ul class=" flex flex-row gap-5">
                        <li class="menu-effect-3">
                            <a href="{{ $sosmed[0]->value !== '' ? $sosmed[0]->value : '#' }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.65188 2C3.6289 2 2 3.6289 2 5.65187V18.3481C2 20.3711 3.6289 22 5.65188 22H12.5331V14.1812H10.4656V11.3662H12.5331V8.96125C12.5331 7.07175 13.7547 5.33687 16.5688 5.33687C17.7081 5.33687 18.5506 5.44625 18.5506 5.44625L18.4844 8.07501C18.4844 8.07501 17.6251 8.06689 16.6875 8.06689C15.6727 8.06689 15.51 8.53445 15.51 9.31065V11.3663H18.565L18.4319 14.1813H15.51V22H18.3481C20.3711 22 22 20.3711 22 18.3481V5.65189C22 3.62892 20.3711 2.00002 18.3481 2.00002H5.65186L5.65188 2Z"
                                        fill="#1C2841" />
                                </svg>
                            </a>
                        </li>
                        <li class="menu-effect-4">
                            <a href="{{ $sosmed[1]->value !== '' ? $sosmed[1]->value : '#' }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 1.5C6.20156 1.5 1.5 6.20156 1.5 12C1.5 17.7984 6.20156 22.5 12 22.5C17.7984 22.5 22.5 17.7984 22.5 12C22.5 6.20156 17.7984 1.5 12 1.5ZM17.0461 9.41484C17.0531 9.525 17.0531 9.63984 17.0531 9.75234C17.0531 13.193 14.4328 17.1562 9.64453 17.1562C8.16797 17.1562 6.79922 16.7273 5.64609 15.9891C5.85703 16.0125 6.05859 16.0219 6.27422 16.0219C7.49297 16.0219 8.61328 15.6094 9.50625 14.9109C8.3625 14.8875 7.40156 14.1375 7.07344 13.1063C7.47422 13.1648 7.83516 13.1648 8.24766 13.0594C7.65873 12.9397 7.12939 12.6199 6.74957 12.1542C6.36974 11.6885 6.16286 11.1056 6.16406 10.5047V10.4719C6.50859 10.6664 6.91406 10.7859 7.33828 10.8023C6.98166 10.5647 6.6892 10.2427 6.48682 9.86491C6.28445 9.48715 6.17841 9.06528 6.17813 8.63672C6.17813 8.15156 6.30469 7.70859 6.53203 7.32422C7.18571 8.12891 8.0014 8.78705 8.92609 9.25586C9.85078 9.72466 10.8638 9.99364 11.8992 10.0453C11.5312 8.27578 12.8531 6.84375 14.4422 6.84375C15.1922 6.84375 15.8672 7.15781 16.343 7.66406C16.9312 7.55391 17.4937 7.33359 17.9953 7.03828C17.8008 7.64062 17.393 8.14922 16.8516 8.47031C17.3766 8.41406 17.8828 8.26875 18.3516 8.06484C17.9977 8.58516 17.5547 9.04688 17.0461 9.41484Z"
                                        fill="#1C2841" />
                                </svg>

                            </a>
                        </li>
                        <li class="menu-effect-5">
                            <a href="{{ $sosmed[2]->value !== '' ? $sosmed[2]->value : '#' }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.9991 8.87579C10.2788 8.87579 8.87492 10.2797 8.87492 12C8.87492 13.7203 10.2788 15.1242 11.9991 15.1242C13.7195 15.1242 15.1234 13.7203 15.1234 12C15.1234 10.2797 13.7195 8.87579 11.9991 8.87579ZM21.3695 12C21.3695 10.7063 21.3812 9.42423 21.3085 8.13282C21.2359 6.63282 20.8937 5.30157 19.7968 4.2047C18.6976 3.10548 17.3687 2.76564 15.8687 2.69298C14.5749 2.62033 13.2929 2.63204 12.0015 2.63204C10.7077 2.63204 9.4257 2.62033 8.13429 2.69298C6.63429 2.76564 5.30304 3.10783 4.20617 4.2047C3.10695 5.30392 2.7671 6.63282 2.69445 8.13282C2.62179 9.42657 2.63351 10.7086 2.63351 12C2.63351 13.2914 2.62179 14.5758 2.69445 15.8672C2.7671 17.3672 3.10929 18.6984 4.20617 19.7953C5.30539 20.8945 6.63429 21.2344 8.13429 21.307C9.42805 21.3797 10.7101 21.368 12.0015 21.368C13.2952 21.368 14.5773 21.3797 15.8687 21.307C17.3687 21.2344 18.6999 20.8922 19.7968 19.7953C20.896 18.6961 21.2359 17.3672 21.3085 15.8672C21.3835 14.5758 21.3695 13.2938 21.3695 12V12ZM11.9991 16.807C9.33898 16.807 7.19211 14.6602 7.19211 12C7.19211 9.33985 9.33898 7.19298 11.9991 7.19298C14.6593 7.19298 16.8062 9.33985 16.8062 12C16.8062 14.6602 14.6593 16.807 11.9991 16.807ZM17.0031 8.11876C16.382 8.11876 15.8804 7.6172 15.8804 6.99611C15.8804 6.37501 16.382 5.87345 17.0031 5.87345C17.6241 5.87345 18.1257 6.37501 18.1257 6.99611C18.1259 7.14359 18.097 7.28966 18.0406 7.42595C17.9843 7.56224 17.9016 7.68607 17.7973 7.79036C17.693 7.89464 17.5692 7.97733 17.4329 8.03368C17.2966 8.09003 17.1505 8.11895 17.0031 8.11876V8.11876Z"
                                        fill="#1C2841" />
                                </svg>

                            </a>

                        </li>
                        <li class="menu-effect-6">
                            <a href="{{ $sosmed[3]->value !== '' ? $sosmed[3]->value : '#' }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_333_275)">
                                        <path
                                            d="M23.5006 6.50708C23.3647 6.02231 23.1 5.58342 22.7346 5.23708C22.3589 4.88008 21.8984 4.62471 21.3966 4.49508C19.5186 4.00008 11.9946 4.00008 11.9946 4.00008C8.85795 3.96439 5.72205 4.12135 2.60462 4.47008C2.10281 4.60929 1.64318 4.87036 1.26662 5.23008C0.896617 5.58608 0.628617 6.02508 0.488617 6.50608C0.15231 8.31782 -0.0110908 10.1574 0.000617183 12.0001C-0.0113828 13.8411 0.151617 15.6801 0.488617 17.4941C0.625617 17.9731 0.892617 18.4101 1.26362 18.7631C1.63462 19.1161 2.09662 19.3711 2.60462 19.5061C4.50762 20.0001 11.9946 20.0001 11.9946 20.0001C15.1353 20.0358 18.2752 19.8789 21.3966 19.5301C21.8984 19.4004 22.3589 19.1451 22.7346 18.7881C23.1046 18.4351 23.3676 17.9961 23.4996 17.5181C23.8447 15.707 24.0125 13.8667 24.0006 12.0231C24.0266 10.1717 23.859 8.32264 23.5006 6.50608V6.50708ZM9.60262 15.4241V8.57708L15.8626 12.0011L9.60262 15.4241Z"
                                            fill="#1C2841" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_333_275">
                                            <rect width="24" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-white effect-1 z-10 relative">
        <div class="flex justify-between items-center py-2">
            <a href="/"><img class="effect-1 h-[65px] sm:h-[73px] md:h-[78px] lg:h-[80px] xl:h-[87.12px] w-auto"
                src="{{ asset('images/logo.png') }}" alt="gambar"></a>
            <div class="gap-5 flex items-center">
                <menu class="hidden xl:flex">
                    <ul class="flex flex-row gap-10 py-[18px] px-10">
                        <li class="menu-effect-1">
                            <a href="/" class="heading-4 text-[#828282] {{ (Request::is('/') ? 'active' : '') }}">Home</a>
                        </li>
                        <li class="menu-effect-2">
                            <a {{ (!Request::is('/') ? 'href=/#solutions' : '') }} class="heading-4 hover:cursor-pointer text-[#828282] {{ (Request::is('solutions/*') ? 'active' : '') }} nav-solutions">Solutions</a>
                        </li>
                        <li class="menu-effect-3">
                            <a href="{{ route('product-and-service.index') }}" class="heading-4 text-[#828282] {{ (Request::is(['product-and-service', 'product-details', 'services-details', 'architecture']) ? 'active' : '') }}">Product & Services</a>
                        </li>
                        <li class="menu-effect-4">
                            <a href="{{ route('resources') }}" class="heading-4 text-[#828282] {{ (Request::is(['resources','resources/*']) ? 'active' : '') }}">Resources</a>
                        </li>
                        <li class="menu-effect-5">
                            <a {{ (Request::is('about-us') ? 'href=#partner' : 'href=/about-us#partner') }} class="nav-partner hover:cursor-pointer heading-4 text-[#828282] {{ (Request::is(['about-us#partner']) ? 'active' : '') }}">Partners</a>
                        </li>
                        <li class="menu-effect-6">
                            <a href="{{ route('about-us.index') }}" class="heading-4 text-[#828282] {{ (Request::is(['about-us']) ? 'active' : '') }}">About Us</a>
                        </li>
                    </ul>
                </menu>

                <div class="flex gap-8 relative">
                    <button class="menu-effect-8 flex gap-2 items-center btn-search">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.7114 20.2899L18.0014 16.6099C19.4415 14.8143 20.1389 12.5352 19.9502 10.2412C19.7615 7.94721 18.701 5.81269 16.9869 4.27655C15.2727 2.74041 13.0352 1.91941 10.7343 1.98237C8.43341 2.04534 6.24409 2.98747 4.61651 4.61505C2.98893 6.24263 2.0468 8.43194 1.98384 10.7328C1.92088 13.0337 2.74188 15.2713 4.27801 16.9854C5.81415 18.6996 7.94867 19.76 10.2427 19.9487C12.5367 20.1374 14.8158 19.44 16.6114 17.9999L20.2914 21.6799C20.3843 21.7736 20.4949 21.848 20.6168 21.8988C20.7387 21.9496 20.8694 21.9757 21.0014 21.9757C21.1334 21.9757 21.2641 21.9496 21.3859 21.8988C21.5078 21.848 21.6184 21.7736 21.7114 21.6799C21.8916 21.4934 21.9924 21.2442 21.9924 20.9849C21.9924 20.7256 21.8916 20.4764 21.7114 20.2899ZM11.0014 17.9999C9.6169 17.9999 8.26352 17.5894 7.11238 16.8202C5.96123 16.051 5.06403 14.9578 4.53421 13.6787C4.0044 12.3996 3.86578 10.9921 4.13587 9.63427C4.40597 8.27641 5.07265 7.02913 6.05162 6.05016C7.03059 5.07119 8.27787 4.4045 9.63574 4.13441C10.9936 3.86431 12.4011 4.00293 13.6802 4.53275C14.9592 5.06256 16.0525 5.95977 16.8217 7.11091C17.5908 8.26206 18.0014 9.61544 18.0014 10.9999C18.0014 12.8564 17.2639 14.6369 15.9511 15.9497C14.6384 17.2624 12.8579 17.9999 11.0014 17.9999Z"
                                fill="#1C2841" />
                        </svg>

                        <p class="text-base text-[#1C2841]">Search</p>
                    </button>

                    @guest
                    <a href="/login" class="hidden sm:flex justify-center items-center menu-effect-8 btn btn-primary rounded-lg h-fit">Login</a>
                    @endguest
                    
                    @auth
                    <a href="/dashboard" class="hidden sm:flex justify-center items-center menu-effect-8 btn btn-primary rounded-lg h-fit">Dashboard</a>
                    @endauth
                    <button class="z-10 btn-toggle-menu flex justify-center items-center xl:hidden">
                        <svg class="close" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.3002 5.70998C18.2077 5.61728 18.0978 5.54373 17.9768 5.49355C17.8559 5.44337 17.7262 5.41754 17.5952 5.41754C17.4643 5.41754 17.3346 5.44337 17.2136 5.49355C17.0926 5.54373 16.9827 5.61728 16.8902 5.70998L12.0002 10.59L7.11022 5.69998C7.01764 5.6074 6.90773 5.53396 6.78677 5.48385C6.6658 5.43375 6.53615 5.40796 6.40522 5.40796C6.27429 5.40796 6.14464 5.43375 6.02368 5.48385C5.90272 5.53396 5.79281 5.6074 5.70022 5.69998C5.60764 5.79256 5.5342 5.90247 5.4841 6.02344C5.43399 6.1444 5.4082 6.27405 5.4082 6.40498C5.4082 6.53591 5.43399 6.66556 5.4841 6.78652C5.5342 6.90749 5.60764 7.0174 5.70022 7.10998L10.5902 12L5.70022 16.89C5.60764 16.9826 5.5342 17.0925 5.4841 17.2134C5.43399 17.3344 5.4082 17.464 5.4082 17.595C5.4082 17.7259 5.43399 17.8556 5.4841 17.9765C5.5342 18.0975 5.60764 18.2074 5.70022 18.3C5.79281 18.3926 5.90272 18.466 6.02368 18.5161C6.14464 18.5662 6.27429 18.592 6.40522 18.592C6.53615 18.592 6.6658 18.5662 6.78677 18.5161C6.90773 18.466 7.01764 18.3926 7.11022 18.3L12.0002 13.41L16.8902 18.3C16.9828 18.3926 17.0927 18.466 17.2137 18.5161C17.3346 18.5662 17.4643 18.592 17.5952 18.592C17.7262 18.592 17.8558 18.5662 17.9768 18.5161C18.0977 18.466 18.2076 18.3926 18.3002 18.3C18.3928 18.2074 18.4662 18.0975 18.5163 17.9765C18.5665 17.8556 18.5922 17.7259 18.5922 17.595C18.5922 17.464 18.5665 17.3344 18.5163 17.2134C18.4662 17.0925 18.3928 16.9826 18.3002 16.89L13.4102 12L18.3002 7.10998C18.6802 6.72998 18.6802 6.08998 18.3002 5.70998Z"
                                fill="black" />
                        </svg>

                        <svg class="burger" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 17H19M5 12H19M5 7H19" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </button>
                </div>
            </div>
        </div>
        <div id="frmSearch" class="container w-full h-fit absolute bg-transparent top-1/2 transform translate-y-full right-0 transition-all max-h-0 opacity-0">
            <form action="{{ url('/search') }}"
            method="POST" 
            class="bg-white flex items-center rounded-xl overflow-hidden w-full md:w-96">
            @csrf
            <input type="text" name="keyword" id="search" placeholder="Search Here ..." class="w-full rounded-xl">
            <button type="submit" class="">
                <svg width="34" height="36" viewBox="0 0 34 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M33.4773 32.5075L27.2777 26.0675C29.6842 22.9252 30.8496 18.9367 30.5343 14.9222C30.219 10.9077 28.4469 7.17233 25.5824 4.48408C22.718 1.79584 18.9789 0.359097 15.134 0.469278C11.2891 0.579459 7.63062 2.22819 4.91084 5.07645C2.19106 7.92472 0.616703 11.756 0.511492 15.7826C0.406282 19.8091 1.77821 23.7249 4.34519 26.7246C6.91216 29.7244 10.4791 31.5802 14.3125 31.9104C18.1459 32.2406 21.9544 31.0201 24.9549 28.5L31.1044 34.94C31.2598 35.104 31.4446 35.2342 31.6482 35.323C31.8519 35.4119 32.0703 35.4576 32.2909 35.4576C32.5115 35.4576 32.7299 35.4119 32.9335 35.323C33.1372 35.2342 33.322 35.104 33.4773 34.94C33.7785 34.6136 33.9469 34.1776 33.9469 33.7237C33.9469 33.2699 33.7785 32.8338 33.4773 32.5075ZM15.5803 28.5C13.2668 28.5 11.0052 27.7815 9.08157 26.4355C7.15794 25.0894 5.65866 23.1762 4.77331 20.9378C3.88796 18.6994 3.65631 16.2364 4.10766 13.8601C4.55901 11.4838 5.67308 9.30109 7.30899 7.5879C8.9449 5.8747 11.0292 4.708 13.2982 4.23534C15.5673 3.76267 17.9193 4.00526 20.0567 4.93243C22.1941 5.8596 24.021 7.42972 25.3063 9.44422C26.5917 11.4587 27.2777 13.8271 27.2777 16.25C27.2777 19.4989 26.0453 22.6147 23.8516 24.912C21.6579 27.2093 18.6826 28.5 15.5803 28.5Z" fill="white"/>
                    </svg>
                    
            </button>
        </form>
        </div>
    </div>

    <div class="menu-mobile">
        <menu class="flex flex-row">
            <ul class="flex flex-col w-full">
                <li class="py-2">
                    <a href="/" class="text-[24px] text-[#828282] link-button">Home</a>
                </li>
                <li class="py-2">
                    <a href="{{ (!Request::is('/') ? '/#solutions' : '#solutions') }}" class="text-[24px] text-[#828282] link-button">Solutions</a>
                </li>
                <li class="py-2">
                    <a href="{{ route('product-and-service.index') }}" class="text-[24px] text-[#828282] link-button">Product & Services</a>
                </li>
                <li class="py-2">
                    <a href="{{ route('resources') }}" class="text-[24px] text-[#828282] link-button">Resources</a>
                </li>
                <li class="py-2">
                    <a {{ (Request::is('about-us') ? 'href=#partner' : 'href=/about-us#partner') }} class="text-[24px] text-[#828282] link-button">Partners</a>
                </li>
                <li class="py-2">
                    <a href="{{ route('about-us.index') }}" class="text-[24px] text-[#828282] link-button">About Us</a>
                </li>
            </ul>
        </menu>
    </div>
</header>
