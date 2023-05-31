@extends('layouts.frontend')


@section('content')
@include('components.heros')
@include('section.business-process')
@include('section.hight-performance')
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
    const highPerfDiv = document.querySelector('.hight-performance');
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

</script>
@endpush
