<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="@yield('title')" >
    <meta name="keyword" content="@yield('keyword')" >

    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/style.css') }}">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

    {{-- owl carousel --}}
    <link rel="stylesheet" href="{{ asset('admin/dist/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/owl.theme.default.min.css') }}">
    @yield('css')

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div id="app">

        @include('layouts.frontend.navbar')
        <main>
            @yield('content')
        </main>
       <div class="mt-5">
        @include('layouts.frontend.footer')
       </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="{{ asset('admin/dist/js/owl.carousel.min.js') }}"></script>
    @yield('script')

    <script>

        window.addEventListener('message',event=>{
            if(event.detail){
                alertify.set('notifier','position', 'top-center');
                alertify.notify(event.detail.text,event.detail.type);
            }
        });

    </script>


    @livewireScripts
    @stack('scripts')
</body>
</html>
