<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  {{-- @if (env('IS_DEMO'))
      <x-demo-metas></x-demo-metas>
  @endif --}}

  {{-- <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png"> --}}
  <link rel="icon" type="image/png" href="/images/logo.png">
  <title>
    Jalin Health - Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  
  @stack('header-auth')
  <!-- TinyMCE INIT -->
  @stack('tiny-mce-init')
</head>

<body class="g-sidenav-show  bg-gray-100">
  @auth
    @yield('auth')
  @endauth
  @guest
    @yield('guest')
  @endguest

  @if(session()->has('success'))
    <div x-data="{ show: true}"
        x-init="setTimeout(()=>{show=false;}, 3000)"
        x-show="show"
        class="position-fixed bg-success rounded right-3 text-sm py-2 px-4" style="z-index: 9999">
      <p class="m-0">{{ session('success')}}</p>
    </div>
  @endif

  @stack('core-js-files')
  @stack('dashboard')
  @stack('tiny-mce')
  @stack('footer-js')
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    let xScrollJs = document.querySelector('.ps__rail-x');
    if (xScrollJs) {
      xScrollJs.style.display='none';
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <!--<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>-->

  <script src="{{ mix('js/alpin.js') }}"></script>
</body>

</html>
