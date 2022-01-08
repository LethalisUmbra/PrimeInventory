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
    
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> 

    @livewireStyles

</head>
<body>
    <div id="app" class="d-flex flex-column h-screen justify-content-between">
        <header>
            @include('partials.nav')
            @if(Route::current()->getName() == 'home')
                @if($first_visit)
                    <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
                        <strong>Prime Inventory</strong> is a fanmade website and it is not associated with <strong>Digital Extremes</strong>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            @endif
            @include('partials.error-status')
            @include('partials.session-status')
            @yield('carousel')
        </header>

        <main class="my-auto">
            @yield('content')
        </main>

        <footer class="bg-white text-black-50 shadow-lg">
            @include('partials.footer')
        </footer>
    </div>

    @yield('style')
    
</body>
</html>