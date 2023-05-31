@php
    $contact = App\Models\SiteContent::where('id', '=', '21')
        ->with(['contentMetas'])
        ->firstOrFail();
@endphp
<footer class="relative">
    <div class="footer-cta container absolute flex justify-center -translate-y-1/2 left-1/2 -translate-x-1/2 {{(\Request::is(['about-us']) ? 'hidden-cta' : '')}}">
        <div class="flex flex-col md:flex-row border border-gray-6 justify-between rounded-lg bg-white p-5 sm:p-6 md:p-8 lg:p-10 w-full lg:w-[70%] gap-3 sm:gap-5 md:gap-6 lg:gap-8 xl:gap-10 items-center" style="box-shadow: 0px 0px 80px rgba(0, 127, 255, 0.16);">
            <div class="flex gap-1 flex-col w-full md:w-fit">
                <h2 class="heading-3 leading-none font-bold text-navy uppercase">Contact jalin health now</h2>
                <p class="paragraph-2 leading-none text-gray-3 font-normal">Have a questions or want to try our demo ? contact Jalin Health here.</p>
            </div>

            <div class="wrapper__button-footer flex">
                <a href="{{ url('/contact-us') }}" class="btn font-bold">
                    Contact
                </a>
                <a href="{{url('/contact-us#schedule-demo')}}" class="btn font-bold">
                    Demo
                </a>
            </div>
        </div>
    </div>

    <div class="bg-[#DAEFFB]">
        <div class="container">
            <div class="flex flex-wrap lg:flex-row justify-between pt-[120px] lg:pt-5 pb-10">
                <div class="effect-1 max-w-[423px] flex flex-col gap-6 md:gap-[40px]">
                    <a href="/"><img class="h-14 md:h-20 lg:h-[100px] xl:h-[104px] w-14 md:w-20 lg:w-[100px] xl:w-[104px]" src="{{ asset('images/logo.png') }}" alt="hero"></a>
                    <p class="text-gray-3 paragraph-2">Jalin Health provide <b>Medical Claim Clearinghouse Platform </b> to transform healthy revenue cycle
                        management for healthcare payers and providers.</p>
                </div>
                <div class="effect-2 pt-7 md:pt-[145px] max-w-[302px]">
                    <ul class="flex flex-col gap-2 sm:gap-2.5" >
                        <li class="effect-1 flex gap-2.5">
                            <span>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 1C6.54184 1.00172 5.14389 1.58174 4.11282 2.61281C3.08174 3.64389 2.50173 5.04184 2.50001 6.5C2.49826 7.69161 2.8875 8.85089 3.60801 9.8C3.60801 9.8 3.75801 9.9975 3.7825 10.026L8 15L12.2195 10.0235C12.2415 9.997 12.392 9.8 12.392 9.8L12.3925 9.7985C13.1126 8.84981 13.5017 7.69107 13.5 6.5C13.4983 5.04184 12.9183 3.64389 11.8872 2.61281C10.8561 1.58174 9.45816 1.00172 8 1ZM8 8.5C7.60444 8.5 7.21776 8.3827 6.88886 8.16294C6.55996 7.94318 6.30362 7.63082 6.15224 7.26537C6.00087 6.89991 5.96126 6.49778 6.03843 6.10982C6.1156 5.72186 6.30608 5.36549 6.58579 5.08579C6.86549 4.80608 7.22186 4.6156 7.60982 4.53843C7.99778 4.46126 8.39992 4.50087 8.76537 4.65224C9.13082 4.80362 9.44318 5.05996 9.66294 5.38886C9.8827 5.71776 10 6.10444 10 6.5C9.99934 7.03023 9.78841 7.53855 9.41348 7.91348C9.03855 8.28841 8.53023 8.49934 8 8.5Z"
                                        fill="#111042" />
                                </svg>
                            </span>


                            <span class="paragraph-3">{{$contact->contentMetas[2]->value}}</span>
                        </li>
                        <li class="effect-2 flex gap-2.5">
                            <span>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.8766 10.1894C13.0195 10.1894 12.1779 10.0553 11.3804 9.79178C10.9896 9.65849 10.5091 9.78077 10.2706 10.0257L8.69648 11.2141C6.87091 10.2396 5.74639 9.11541 4.7852 7.30354L5.93856 5.77039C6.23821 5.47114 6.34569 5.03401 6.21692 4.62385C5.95223 3.82213 5.81777 2.98093 5.81777 2.12343C5.81781 1.50396 5.31385 1 4.69442 1H2.12339C1.50396 1 1 1.50396 1 2.12339C1 9.22365 6.77637 15 13.8766 15C14.496 15 15 14.496 15 13.8766V11.3127C15 10.6934 14.496 10.1894 13.8766 10.1894Z"
                                        fill="#111042" />
                                </svg>

                            </span>


                            <span class="paragraph-3">{{$contact->contentMetas[1]->value}}</span>
                        </li>
                    </ul>
                </div>
                <div class="max-w-1/3 pt-7 md:pt-[99px]" x-data="{

                    menu : {
                        menu1 :
                            [
                                {
                                    title: 'Home',
                                    link: '/'
                                },
                                {
                                    title: 'Solution',
                                    link: '/#solutions',
                                },
                                {
                                    title: 'Product & Services',
                                    link: '/product-and-service'
                                }

                            ],

                        menu2 :
                            [
                                {
                                    title: 'Resources',
                                    link: '/resources'
                                },
                                {
                                    title: 'Partners',
                                    link: '/about-us#partner'
                                },
                                {
                                    title: 'About Us',
                                    link: '/about-us'
                                }
                            ]
                    }

                }">
                <!-- <template x-for="item in menu.menu1">
                    <div x-text="item.title"></div>
                </template> -->
                    <h2 class="effect-1 heading-3 font-bold text-navy mb-1.5 sm:mb-2 md:mb-2.5">Sitemap</h2>
                    <div class="flex gap-10">
                        <div class="effect-2">
                            <ul class="flex flex-col gap-0 sm:gap-1 md:gap-2 lg:gap-2.5">
                                <template x-for="item in menu.menu1">
                                    <li class="effect-1">
                                        <a class="paragraph-2 text-gray-3" :href="item.link" x-text="item.title"></a>
                                    </li>
                                </template>
                            </ul>
                        </div>
                        <div class="effect-3">
                            <ul class="flex flex-col gap-0 sm:gap-1 md:gap-2 lg:gap-2.5">
                                <template x-for="item in menu.menu2">
                                    <li class="effect-2">
                                        <a class="paragraph-2 text-gray-3" :href="item.link" x-text="item.title"></a>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-primary py-[22px]" x-data="
    {
        data: {
            copyright: {
                title: 'Copyright © 2022. Jalin Health. All Right Reserved.'
            },
            menu:
                [
                    {
                        title: 'FAQ',
                        link: '#'
                    },
                    {
                        title: 'Terms and Conditions',
                        link: '#'
                    }
                ]
        }
    }
    ">
        <div class="container flex flex-col-reverse md:flex-row justify-between gap-3 md:gap-0">
            <h1 class="font-normal text-center md:text-left paragraph-3 md:font-bold text-white text-opacity-75" x-text="data.copyright.title"></h1>
            <ul class="flex justify-center md:justify-start gap-5 sm:gap-6 md:gap-7 lg:gap-8 xl:gap-10 h-0 opacity-0 hidden">
                <template x-for="(item, i) in data.menu" :key="i">
                    <li :class="'menu-effect-' + (i + 1)">
                        <a class="paragraph-3 font-normal md:font-bold text-white text-opacity-75" :href="item.link" x-text="item.title"></a>
                    </li>
                </template>
            </ul>
        </div>
    </div>

    <button class="bg-white hover:cursor-pointer shadow-2xl text-gray-6 
            font-bold py-4 px-4 rounded-full scrolltop {{(\Request::is(['about-us']) ? 'translate-x-[33%]' : '')}}">
            <img src="{{ url('/assets/img/up-arrow.svg') }}" alt="">
    </button>
</footer>
