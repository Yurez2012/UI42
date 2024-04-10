<html>
<head>
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/scss/style.scss'])
</head>
<body>
@include('layout.parts.header')

<div class="content">
    @yield('content')
</div>

@include('layout.parts.footer')
</body>
@vite(['resources/js/app.js'])
</html>
