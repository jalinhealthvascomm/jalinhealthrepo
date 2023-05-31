@extends('layouts.app')

@push('header-auth')
<!-- Nucleo Icons -->
<link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- CSS Files -->

<link id="pagestyle" href="/assets/css/soft-ui-custom.css" rel="stylesheet" />
<link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />

<!-- include libraries(jQuery) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- include summernote css/js -->
<link href="/assets/js/summernote/summernote-lite.min.css" rel="stylesheet">
<script src="/assets/js/summernote/summernote-lite.min.js"></script>
@stack('addheader')
<script>
    history.scrollRestoration = "manual"
</script>
@endpush

@section('auth')
@include('layouts.navbars.auth.sidebar')
        <main
            class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
            @include('layouts.navbars.auth.nav')
            <div class="container-fluid py-4">
                @yield('content')
                @include('layouts.footers.auth.footer')
            </div>
        </main>
        @include('components.fixed-plugin')
@endsection

@push('core-js-files')
<!--   Core JS Files   -->
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
{{-- <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script> --}}
<!-- <script src="../assets/js/plugins/fullcalendar.min.js"></script> -->
<!-- <script src="../assets/js/plugins/chartjs.min.js"></script> -->

<script src="/assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
<script>
    let asideMenu = document.getElementById('sidenav-main')
    let menuPos = document.querySelector('.nav-link.active')

    if (asideMenu && menuPos) {
        asideMenu.scrollTo(0,(menuPos.getBoundingClientRect().top-200))
    }
</script>
@endpush
