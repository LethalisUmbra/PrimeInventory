<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome v5.15.4 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <title>@yield('title', ucfirst(Route::currentRouteName())) - Prime Inventory</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>

    @livewireStyles

</head>
<body>
    <div id="app" class="d-flex flex-column h-screen justify-content-between">

        <header>
            @include('partials.nav')
            @include('partials.error-status')
            @include('partials.session-status')
        </header>

        @yield('carousel')

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="bg-white text-black-50 shadow-lg">
            @include('partials.footer')
        </footer>
    </div>

    @yield('style')
    
</body>
</html>