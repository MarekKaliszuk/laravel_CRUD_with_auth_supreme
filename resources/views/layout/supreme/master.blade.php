<!DOCTYPE html>
<html lang="en" >
@include('layout.supreme.head')

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<div class="m-grid m-grid--hor m-grid--root m-page">
    @include('layout.supreme.header')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
    @include('layout.supreme.menu')
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
        @yield('content')
        </div>
    </div>

    @include('layout.supreme.footer')
</div>

@include('layout.supreme.sidebar')


<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
    <i class="la la-arrow-up"></i>
</div>

<script src="{{ asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>

@yield('pageScripts')

</body>
</html>
