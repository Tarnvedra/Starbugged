<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Starbugged</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/starbugged.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div>

                <h1 class="text-center">  Starbugged </h1>

                <p>For Demo user please login as, <b><i>User: </i>test@test.com <i>Password: </i>1234567890</b></p>
                <div class="d-flex">
                <img src="{{ asset('images/bug1.png') }}" width="500" height="400" alt="image unavailable">
                <img src="{{ asset('images/bug2.png') }}" width="500" height="400" alt="image unavailable">
                <img src="{{ asset('images/bug3.png') }}" width="500" height="400" alt="image unavailable">
                </div>
            </div>
        </div>

    </body>
</html>
