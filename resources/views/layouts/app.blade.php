<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertical Navbar - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{ asset('mazer/dist/assets/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/fontawesome/all.min.css')}}">

    @stack('css-library')

    @livewireStyles
</head>

<body>
    <div id="app">
        {{-- sidebar --}}
        @include('layouts.partials._sidebar')
        {{-- sidebar --}}


        <div id="main" class='layout-navbar'>
            {{-- header --}}
            @include('layouts.partials._header')
            {{-- header --}}

            <div id="main-content">
                {{ $slot}}


                {{-- footer --}}
                @include('layouts.partials._footer')
                {{-- footer --}}
            </div>
        </div>
    </div>
    <script src="{{ asset('mazer/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('mazer/dist/assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{ asset('mazer/dist/assets/vendors/fontawesome/all.min.js')}}"></script>

    <script src="{{ asset('mazer/dist/assets/js/main.js')}}"></script>

    @stack('js-library')

    @livewireScripts
</body>

</html>

{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html> --}}
