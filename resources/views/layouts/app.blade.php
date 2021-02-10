<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Starbugged</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('css/starbugged.css') }}" rel="stylesheet">  -->
</head>
<body>
     <!-- Scripts -->
     <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
     <script src="{{ asset('vendor/jquery-easing/jquery.easing.js') }}"></script>
     <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
     <script src="{{ asset('vendor/chart.js/Chart.js') }}"></script>
     <a id="top"></a>
     <!-- Vue Dominion begins here -->
     <div id="app">
         @yield('content')
         @include('include/messages')
         @include('include/logout')
         @include('git-version::version-comment')
     </div>
     <!-- Vue Dominion ends here -->

     <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
