@extends('layouts.app')

@push('header-auth')
<!-- Nucleo Icons -->
<link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- CSS Files -->
<link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
@endpush

@section('guest')
@yield('content')        
@include('layouts.footers.guest.footer')
@endsection