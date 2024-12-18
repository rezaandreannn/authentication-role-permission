<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - {{ config('app.name') }}</title>

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
    <script src="{{ asset('mazer/dist/assets/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('mazer/dist/assets/js/main.js')}}"></script>

    @stack('js-library')

    @livewireScripts
</body>

</html>
