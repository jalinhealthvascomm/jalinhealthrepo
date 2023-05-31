@php
    $title = $contentSide['section']['title'];
    $content = $contentSide['elements']['content']['content'];
    $image = $contentSide['elements']['image'];
    $video = $contentSide['elements']['video']['content'];
    $setting = $contentSide['elements']['setting']['content'];

@endphp
<section class="hight-performance">
    <div class="container">
        <div class="s-title relative">

            {!! $title !!}

            <div class="effect-2 absolute -top-[20px] -left-[20px] md:-top-[40px] md:-left-[40px]">
                <svg class="w-[80px] md:w-[100px] lg:w-[150px] xl:w-[212px] h-fit" width="212" height="200" viewBox="0 0 212 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.4">
                    <circle cx="207.125" cy="4.76151" r="4.76151" transform="rotate(90 207.125 4.76151)" fill="#BDBDBD"/>
                    <circle cx="207.125" cy="42.8538" r="4.76151" transform="rotate(90 207.125 42.8538)" fill="#BDBDBD"/>
                    <circle cx="207.125" cy="80.9456" r="4.76151" transform="rotate(90 207.125 80.9456)" fill="#BDBDBD"/>
                    <circle cx="207.125" cy="119.038" r="4.76151" transform="rotate(90 207.125 119.038)" fill="#BDBDBD"/>
                    <circle cx="207.125" cy="157.13" r="4.76151" transform="rotate(90 207.125 157.13)" fill="#BDBDBD"/>
                    <circle cx="207.125" cy="195.222" r="4.76151" transform="rotate(90 207.125 195.222)" fill="#BDBDBD"/>
                    <circle cx="166.653" cy="4.76151" r="4.76151" transform="rotate(90 166.653 4.76151)" fill="#BDBDBD"/>
                    <circle cx="166.653" cy="42.8538" r="4.76151" transform="rotate(90 166.653 42.8538)" fill="#BDBDBD"/>
                    <circle cx="166.653" cy="80.9456" r="4.76151" transform="rotate(90 166.653 80.9456)" fill="#BDBDBD"/>
                    <circle cx="166.653" cy="119.038" r="4.76151" transform="rotate(90 166.653 119.038)" fill="#BDBDBD"/>
                    <circle cx="166.653" cy="157.13" r="4.76151" transform="rotate(90 166.653 157.13)" fill="#BDBDBD"/>
                    <circle cx="166.653" cy="195.222" r="4.76151" transform="rotate(90 166.653 195.222)" fill="#BDBDBD"/>
                    <circle cx="126.18" cy="4.76151" r="4.76151" transform="rotate(90 126.18 4.76151)" fill="#BDBDBD"/>
                    <circle cx="126.18" cy="42.8538" r="4.76151" transform="rotate(90 126.18 42.8538)" fill="#BDBDBD"/>
                    <circle cx="126.18" cy="80.9456" r="4.76151" transform="rotate(90 126.18 80.9456)" fill="#BDBDBD"/>
                    <circle cx="126.18" cy="119.038" r="4.76151" transform="rotate(90 126.18 119.038)" fill="#BDBDBD"/>
                    <circle cx="126.18" cy="157.13" r="4.76151" transform="rotate(90 126.18 157.13)" fill="#BDBDBD"/>
                    <circle cx="126.18" cy="195.222" r="4.76151" transform="rotate(90 126.18 195.222)" fill="#BDBDBD"/>
                    <circle cx="85.7072" cy="4.76151" r="4.76151" transform="rotate(90 85.7072 4.76151)" fill="#BDBDBD"/>
                    <circle cx="85.7072" cy="42.8538" r="4.76151" transform="rotate(90 85.7072 42.8538)" fill="#BDBDBD"/>
                    <circle cx="85.7072" cy="80.9456" r="4.76151" transform="rotate(90 85.7072 80.9456)" fill="#BDBDBD"/>
                    <circle cx="85.7072" cy="119.038" r="4.76151" transform="rotate(90 85.7072 119.038)" fill="#BDBDBD"/>
                    <circle cx="85.7072" cy="157.13" r="4.76151" transform="rotate(90 85.7072 157.13)" fill="#BDBDBD"/>
                    <circle cx="85.7072" cy="195.222" r="4.76151" transform="rotate(90 85.7072 195.222)" fill="#BDBDBD"/>
                    <circle cx="45.2346" cy="4.76151" r="4.76151" transform="rotate(90 45.2346 4.76151)" fill="#BDBDBD"/>
                    <circle cx="45.2346" cy="42.8538" r="4.76151" transform="rotate(90 45.2346 42.8538)" fill="#BDBDBD"/>
                    <circle cx="45.2346" cy="80.9456" r="4.76151" transform="rotate(90 45.2346 80.9456)" fill="#BDBDBD"/>
                    <circle cx="45.2346" cy="119.038" r="4.76151" transform="rotate(90 45.2346 119.038)" fill="#BDBDBD"/>
                    <circle cx="45.2346" cy="157.13" r="4.76151" transform="rotate(90 45.2346 157.13)" fill="#BDBDBD"/>
                    <circle cx="45.2346" cy="195.222" r="4.76151" transform="rotate(90 45.2346 195.222)" fill="#BDBDBD"/>
                    <circle cx="4.76193" cy="4.76151" r="4.76151" transform="rotate(90 4.76193 4.76151)" fill="#BDBDBD"/>
                    <circle cx="4.76193" cy="42.8538" r="4.76151" transform="rotate(90 4.76193 42.8538)" fill="#BDBDBD"/>
                    <circle cx="4.76193" cy="80.9456" r="4.76151" transform="rotate(90 4.76193 80.9456)" fill="#BDBDBD"/>
                    <circle cx="4.76193" cy="119.038" r="4.76151" transform="rotate(90 4.76193 119.038)" fill="#BDBDBD"/>
                    <circle cx="4.76193" cy="157.13" r="4.76151" transform="rotate(90 4.76193 157.13)" fill="#BDBDBD"/>
                    <circle cx="4.76193" cy="195.222" r="4.76151" transform="rotate(90 4.76193 195.222)" fill="#BDBDBD"/>
                    </g>
                </svg>
            </div>

        </div>

        <div class="flex flex-col gap-6 sm:gap-0 sm:flex-row items-center {{ $setting == 'image' ? 'pt-5 lg:pt-10 pb-32' : 'pt-11 lg:pt-24 pb-32' }}">
            <div class="s-content w-full md:w-1/2">
                {!! $content !!}
            </div>
            <div class="media-content w-full md:w-1/2">
                @if ($setting == 'image')
                    @if(file_exists(public_path('/'.$image->content)))
                    <img class="w-full min-h-[600px] object-contain" src="{{ url($image->content) }}" alt="gambar">
                    @else
                    <img class="w-full min-h-[600px] object-contain" src="{{ url('images/engine.png') }}" alt="gambar">
                    @endif
                @else
                    {!! $video !!}
                @endif
                
            </div>
        </div>
    </div>
</section>
