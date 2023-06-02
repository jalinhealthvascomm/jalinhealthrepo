@extends('layouts.frontend')

@push('header')
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
@endpush

@section('content')


@include('frontend.about-us.header')

<div class="about-us-content pt-5 lg:pt-20 pb-20 lg:pb-40 overflow-hidden relative">
    @if(Session::has('saveSuccess'))
    <div class="alert alert-success" role="alert"
    x-data="{ show: true}" x-init="setTimeout(()=>{show=false;}, 3000)"
        x-show="show" x-transition>
        {{ Session::get('saveSuccess') }}
    </div>
    @endif

    <svg class="absolute top-10 left-[23%]" width="122" height="122" viewBox="0 0 122 122" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <circle opacity="0.2" cx="61" cy="61" r="61" fill="#007FFF" />
    </svg>

    <div class="container pb-6 lg:pb-12 flex flex-col gap-3">
        <p class="paragraph-1 text-gray-2">Financial viability starts with a collaboration</p>
        <h3 class="heading-1 font-bold text-navy">Let's get in touch</h3>
    </div>
    <div class="relative pb-[108px] contact-wrapper">
        <div class="lg:absolute lg:top-0 lg:transform lg:-translate-y-5 right-4 lg:right-20 rounded-xl bg-white overflow-hidden"
            style="box-shadow: 0px 0px 80px rgba(0, 127, 255, 0.16);">
            <div class="relative px-5 py-6 lg:px-10 lg:py-14 rounded-xl bg-white overflow-hidden z-[2] w-full lg:w-fit">
                <svg class="absolute top-0 right-0 z-[-1]" width="237" height="170" viewBox="0 0 237 170" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect width="234.91" height="198.378" rx="40"
                        transform="matrix(0.960052 -0.27982 0.41378 0.910377 -13 -1.61255)"
                        fill="url(#paint0_linear_1286_2641)" />
                    <defs>
                        <linearGradient id="paint0_linear_1286_2641" x1="-1.75022e-06" y1="99.1891" x2="228.367"
                            y2="211.663" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#3C97F4" />
                            <stop offset="1" stop-color="#3BC2FC" />
                        </linearGradient>
                    </defs>
                </svg>
                <h4 class="pb-8 heading-2 font-bold text-navy">Contact us</h4>
                <div class="flex gap-6">
                    <svg class="min-w-[32px]" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.33464 26.6668C4.6013 26.6668 3.97375 26.4059 3.45197 25.8842C2.9293 25.3615 2.66797 24.7335 2.66797 24.0002V8.00016C2.66797 7.26683 2.9293 6.63927 3.45197 6.1175C3.97375 5.59483 4.6013 5.3335 5.33464 5.3335H26.668C27.4013 5.3335 28.0293 5.59483 28.552 6.1175C29.0737 6.63927 29.3346 7.26683 29.3346 8.00016V24.0002C29.3346 24.7335 29.0737 25.3615 28.552 25.8842C28.0293 26.4059 27.4013 26.6668 26.668 26.6668H5.33464ZM16.0013 17.1002C16.1124 17.1002 16.2289 17.0833 16.3506 17.0495C16.4733 17.0166 16.5902 16.9668 16.7013 16.9002L26.1346 11.0002C26.3124 10.8891 26.4457 10.7504 26.5346 10.5842C26.6235 10.4171 26.668 10.2335 26.668 10.0335C26.668 9.58905 26.4791 9.25572 26.1013 9.0335C25.7235 8.81127 25.3346 8.82239 24.9346 9.06683L16.0013 14.6668L7.06797 9.06683C6.66797 8.82239 6.27908 8.81661 5.9013 9.0495C5.52352 9.28327 5.33464 9.61127 5.33464 10.0335C5.33464 10.2557 5.37908 10.4499 5.46797 10.6162C5.55686 10.7833 5.69019 10.9113 5.86797 11.0002L15.3013 16.9002C15.4124 16.9668 15.5293 17.0166 15.652 17.0495C15.7737 17.0833 15.8902 17.1002 16.0013 17.1002Z"
                            fill="url(#paint0_linear_1286_2648)" />
                        <defs>
                            <linearGradient id="paint0_linear_1286_2648" x1="2.66797" y1="16.0002" x2="28.0261"
                                y2="29.1838" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#3C97F4" />
                                <stop offset="1" stop-color="#3BC2FC" />
                            </linearGradient>
                        </defs>
                    </svg>

                    <p class="pb-6 paragraph-2 text-gray-2">{{ $siteContent->contentMetas[0]->value }}</p>
                </div>
                <div class="flex gap-6">

                    <svg class="min-w-[32px]" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.82667 14.3867C10.7467 18.16 13.84 21.24 17.6133 23.1733L20.5467 20.24C20.9067 19.88 21.44 19.76 21.9067 19.92C23.4 20.4133 25.0133 20.68 26.6667 20.68C27.4 20.68 28 21.28 28 22.0133V26.6667C28 27.4 27.4 28 26.6667 28C14.1467 28 4 17.8533 4 5.33333C4 4.6 4.6 4 5.33333 4H10C10.7333 4 11.3333 4.6 11.3333 5.33333C11.3333 7 11.6 8.6 12.0933 10.0933C12.24 10.56 12.1333 11.08 11.76 11.4533L8.82667 14.3867Z"
                            fill="url(#paint0_linear_1286_2644)" />
                        <defs>
                            <linearGradient id="paint0_linear_1286_2644" x1="4" y1="16" x2="28.7155" y2="26.2797"
                                gradientUnits="userSpaceOnUse">
                                <stop stop-color="#3C97F4" />
                                <stop offset="1" stop-color="#3BC2FC" />
                            </linearGradient>
                        </defs>
                    </svg>


                    <p class="pb-6 paragraph-2 text-gray-2">{{ $siteContent->contentMetas[1]->value }}</p>
                </div>
                <div class="flex gap-6">

                    <svg class="min-w-[32px]" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.9987 15.9998C16.732 15.9998 17.36 15.7385 17.8827 15.2158C18.4045 14.6941 18.6654 14.0665 18.6654 13.3332C18.6654 12.5998 18.4045 11.9718 17.8827 11.4492C17.36 10.9274 16.732 10.6665 15.9987 10.6665C15.2654 10.6665 14.6378 10.9274 14.116 11.4492C13.5934 11.9718 13.332 12.5998 13.332 13.3332C13.332 14.0665 13.5934 14.6941 14.116 15.2158C14.6378 15.7385 15.2654 15.9998 15.9987 15.9998ZM15.9987 28.8332C15.8209 28.8332 15.6431 28.7998 15.4654 28.7332C15.2876 28.6665 15.132 28.5776 14.9987 28.4665C11.7543 25.5998 9.33203 22.9389 7.73203 20.4838C6.13203 18.0278 5.33203 15.7332 5.33203 13.5998C5.33203 10.2665 6.40448 7.61095 8.54936 5.63317C10.6934 3.65539 13.1765 2.6665 15.9987 2.6665C18.8209 2.6665 21.304 3.65539 23.448 5.63317C25.5929 7.61095 26.6654 10.2665 26.6654 13.5998C26.6654 15.7332 25.8654 18.0278 24.2654 20.4838C22.6654 22.9389 20.2431 25.5998 16.9987 28.4665C16.8654 28.5776 16.7098 28.6665 16.532 28.7332C16.3543 28.7998 16.1765 28.8332 15.9987 28.8332Z"
                            fill="url(#paint0_linear_1286_2652)" />
                        <defs>
                            <linearGradient id="paint0_linear_1286_2652" x1="5.33203" y1="15.7498" x2="28.4443"
                                y2="23.5871" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#3C97F4" />
                                <stop offset="1" stop-color="#3BC2FC" />
                            </linearGradient>
                        </defs>
                    </svg>


                    <p class="paragraph-2 text-gray-2 max-w-[500px]">{{ $siteContent->contentMetas[2]->value }}</p>
                </div>
            </div>
        </div>
        <div class="w-full map-embed mt-10 lg:mt-0">
            {!!$siteContent->contentMetas[3]->value!!}
        </div>
    </div>

    <div class="container" id="schedule-demo">
        <div class="schedule-demo">
            <div class="pb-6 lg:pb-12 flex flex-col gap-3">
                <h3 class="heading-1 text-[40px] font-bold text-navy">Schedule your personal demo</h3>
                <p class="paragraph-1 text-gray-2 lg:max-w-[50%]">Complete the form below to see what Jalin Health can do
                    for your business</p>
            </div>
        </div>
        <form class="frm-submit" action="/contact-us/submit" method="post">
            @csrf
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-10">
                <div x-data="{ input: '' }" 
                    class="form-input-group flex flex-col gap-2 lg:gap-4 w-full">
                    <label for="fullName" class="paragraph-2 text-navy font-semibold">Full Name</label>
                    <input type="text" name="fullName" id="fullName" placeholder="Fill your name"
                        class="border broder-gray-[#E0E0E0] rounded-lg py-2 lg:p-4"
                        style="box-shadow: 0px 2px 15px rgba(45, 52, 68, 0.1);" value="{{ old('fullName') }}" x-model="input">
                    @error('fullName')
                    <div class="alert alert-danger" x-bind:class="input !== '' ? 'hidden' : ''" role="alert">
                        <strong>Full Name</strong> required!
                    </div>
                    @enderror
                </div>
                <div x-data="{
                    input: ''
                }" class="form-input-group flex flex-col gap-2 lg:gap-4 w-full">
                    <label for="phone" class="paragraph-2 text-navy font-semibold">Phone</label>
                    <input type="number" name="phone" id="phone" placeholder="Fill your phone number"
                        class="border broder-gray-5 rounded-lg py-2 lg:p-4"
                        style="box-shadow: 0px 2px 15px rgba(45, 52, 68, 0.1);"
                        value="{{ old('phone') }}" x-model="input">
                    @error('phone')
                    <div class="alert alert-danger" role="alert" x-bind:class="input !== '' ? 'hidden' : ''">
                        <strong>Phone</strong> required!
                    </div>
                    @enderror
                </div>
                <div class="form-input-group flex flex-col gap-2 lg:gap-4 w-full" x-data="{ input: '' }">
                    <label for="email" class="paragraph-2 text-navy font-semibold">Email</label>
                    <input type="email" name="email" id="email" placeholder="Fill your email"
                        class="border broder-gray-5 rounded-lg py-2 lg:p-4"
                        style="box-shadow: 0px 2px 15px rgba(45, 52, 68, 0.1);"
                        value="{{ old('email') }}" x-model="input">
                    @error('email')
                    <div class="alert alert-danger" role="alert" x-bind:class="input !== '' ? 'hidden' : ''" role="alert">
                        <strong>Email</strong> required!
                    </div>
                    @enderror
                </div>
            </div>
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-10 pt-8" x-data="{ input: '' }">
                <div class="form-input-group flex flex-col gap-2 lg:gap-4 w-full">
                    <label for="organizationType" class="paragraph-2 text-navy font-semibold">Organization type</label>
                    <select class="form-select border broder-gray-5 rounded-lg py-2 lg:p-4" name="organizationType"
                        id="organizationType" style="box-shadow: 0px 2px 15px rgba(45, 52, 68, 0.1);" x-model="input">
                        @foreach ($organizationType->contentMetas as $item)
                        <option value="{{ $item->value }}" {{ $item->value === old('organizationType') ?  'selected' : ''  }}>{{ $item->value }}</option>
                        @endforeach
                    </select>
                    @error('organizationType')
                    <div class="alert alert-danger" role="alert" x-bind:class="input !== '' ? 'hidden' : ''" role="alert">
                        <strong>Organization type</strong> required!
                    </div>
                    @enderror
                </div>
                <div class="form-input-group flex flex-col gap-2 lg:gap-4 w-full" x-data="{ input: '' }">
                    <label for="inquerySubject" class="paragraph-2 text-navy font-semibold">Inquiry subject</label>
                    <select class="form-select border broder-gray-5 rounded-lg py-2 lg:p-4" name="inquerySubject"
                        id="inquerySubject" style="box-shadow: 0px 2px 15px rgba(45, 52, 68, 0.1);" x-model="input">
                        @foreach ($inquirySubject->contentMetas as $item)
                        <option value="{{ $item->value }}" {{ $item->value === old('inquerySubject') ?  'selected' : ''  }}>{{ $item->value }}</option>
                        @endforeach
                    </select>
                    @error('inquerySubject')
                    <div class="alert alert-danger" role="alert" x-bind:class="input !== '' ? 'hidden' : ''" role="alert">
                        <strong>Inquiry subject</strong> required!
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-input-group flex flex-col gap-2 lg:gap-4 w-full pt-8 pb-10" x-data="{ input: '' }">
                <label for="message" class="paragraph-2 text-navy font-semibold">Message</label>
                <textarea name="message" id="message" cols="30" rows="5" placeholder="Fill your message"
                class="form-textarea border broder-gray-5 rounded-lg px-2 py-3 lg:px-4 lg:py-6"
                style="box-shadow: 0px 2px 15px rgba(45, 52, 68, 0.1); display:block!important; height:200px;" x-model="input">{{ old('message') }}</textarea>
                @error('message')
                <div class="alert alert-danger" role="alert" x-bind:class="input !== '' ? 'hidden' : ''" role="alert">
                    <strong>Message</strong> required!
                </div>
                @enderror
            </div>

            <button class="btn btn-primary rounded-lg text-white lg:px-14">Submit</button>
        </form>
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
    const highPerfDiv = document.querySelector('.schedule-demo');

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

</script>
@endpush
