<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('layout.head')
</head>
<body>

@include('layout.slider-with-menu', $slides)
@yield('content')
@include('layout.footer')

<a href="#0" class="cd-top">Na górę</a>

</body>
</html>