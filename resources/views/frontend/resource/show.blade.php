@extends('layouts.frontend')



@section('content')
<div class="resources-content pt-5 lg:pt-10 pb-20 lg:pb-40 overflow-hidden">

    <div class="container">
        <a href="{{ route('resources') }}" class="font-medium paragraph-1 text-gray-3 flex items-center">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.37805 17.2748C9.57977 17.0748 9.67659 16.8331 9.66852 16.5498C9.65978 16.2665 9.55455 16.0248 9.35284 15.8248L6.50361 12.9998H17.7492C18.035 12.9998 18.2747 12.9038 18.4684 12.7118C18.6613 12.5205 18.7578 12.2831 18.7578 11.9998C18.7578 11.7165 18.6613 11.4788 18.4684 11.2868C18.2747 11.0955 18.035 10.9998 17.7492 10.9998H6.50361L9.37805 8.1498C9.57977 7.9498 9.68062 7.71214 9.68062 7.4368C9.68062 7.16214 9.57977 6.9248 9.37805 6.7248C9.17634 6.5248 8.93663 6.4248 8.65894 6.4248C8.38192 6.4248 8.14255 6.5248 7.94083 6.7248L3.32659 11.2998C3.22574 11.3998 3.15413 11.5081 3.11177 11.6248C3.07008 11.7415 3.04923 11.8665 3.04923 11.9998C3.04923 12.1331 3.07008 12.2581 3.11177 12.3748C3.15413 12.4915 3.22574 12.5998 3.32659 12.6998L7.96605 17.2998C8.15095 17.4831 8.38192 17.5748 8.65894 17.5748C8.93663 17.5748 9.17634 17.4748 9.37805 17.2748Z" fill="#828282"/>
            </svg>                 
            <span class="ml-4 paragraph-1 font-medium ">Back to Resources</span>
        </a>
    </div>
    
    <article class="container pt-6 lg:pt-16">
        <div class="card py-5 lg:py-10 px-5 lg:px-10 bg-white rounded-3xl block" style="box-shadow: 0px 0px 60px rgba(0, 0, 0, 0.08);">
            @if ($resources->resourceCategory->id !== 1)
                <h4 class="heading-3 text-gray-3">{{ $resources->resourceCategory->title }}</h4>
            @endif
            <h2 class="heading-1 font-bold text-navy pb-5 lg:pb-10">{{ $resources->title }}</h2>
            @if (!empty($resources->image))
                <img src="{{ url($resources->image) }}" alt="" class="w-full max-h-[480px] object-contain rounded-md lg:rounded-2xl">
            @endif
            <div class="resource-content pt-5 lg:pt-10">
                {!! $resources->content !!}
            </div>
            <div class="share-to pt-8">
                <div class="relative py-5">
                    <p class="paragraph-2 bg-white text-gray-3 text-center absolute top-1/2 left-1/2 z-20 
                        transform translate-y-[1px] -translate-x-1/2 px-5">Share To</p>
                    <span class="h-[1px] bg-[#E0E0E0] w-full absolute top-1/2 left-0
                        transform translate-y-3 z-10"></span>
                </div>
                <div class="flex gap-10 justify-center py-10">
                    <a href="{{ $shareTo['twitter'] }}">
                        <img src="/images/mdi_twitter.png" alt="">
                    </a>
                    <a href="{{ $shareTo['facebook'] }}">
                        <img src="/images/bi_facebook.png" alt="">
                    </a>
                    <a href="{{ $shareTo['linkedin'] }}">
                        <img src="/images/bi_linkedin.png" alt="">
                    </a>
                    <a href="{{ 'mailto:?subject=' .  ENV("APP_NAME") . '&amp;body=' . $resources->title . ' &ampUntuk lebih lengkapnya kunjungi link berikut ' . url('/resources/' .$resources->slug) }}">
                        <img src="/images/mdi_gmail.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </article>

    <div class="container pb-10 py-20">
        <h4 class="heading-2 font-medium text-navy pb-10">Topics Related</h4>
        <div class="grid grid-cols-1 gap-7 lg:grid-cols-4 lg:gap-12">
            @forelse ($relateResources as $relateResource)
            <article class="card">
                <div class="card-content justify-between flex-grow">
                    @if (!empty($relateResource->siteContent->image))
                        @if(file_exists(public_path('/'.$relateResource->siteContentimage)))
                        <img src="{{ url($relateResource->siteContent->image)  }}" alt="{{ $relateResource->siteContent->title }}" class="w-full object-cover min-h-[260px]">
                        @else
                        <img src="{{ url('/images/not-found-icon.png')  }}" alt="{{ $relateResource->siteContent->title }}" class="w-full object-cover min-h-[260px]">
                        @endif
                    @else
                    <img src="{{ url('/images/not-found-icon.png')  }}" alt="{{ $relateResource->siteContent->title }}" class="w-full object-cover min-h-[260px]">
                    @endif
                    
                    <div class="px-4">
                        <span class="text-gray-3 paragraph-2">
                            @if (!empty($relateResource->siteContent->resourceCategory->id) && $relateResource->siteContent->resourceCategory->id !== 1)
                             {{$relateResource->siteContent->resourceCategory->title}}
                            @endif
                        </span>
                        @if (!empty($relateResource->siteContent->slug))
                        <a href="{{ '/resources/'. $relateResource->siteContent->slug }}">
                            <h2 class="paragraph-1 font-bold">{{ $relateResource->siteContent->title }}</h2>
                        </a>
                        @endif
                        
                    </div>
                </div>
                
                <div class="card-footer card-footer__end px-4 pb-4">
                    @if (!empty($relateResource->siteContent->slug))
                    <a href="{{ '/resources/'. $relateResource->siteContent->slug }}" class="paragraph-2 text-primary font-medium">See Detail</a>
                    @endif
                </div>
            </article> 
            @empty
                
            @endforelse
        </div>
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
    const highPerfDiv = document.querySelector('.resources-content');

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
