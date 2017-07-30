<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                color: #636b6f;
                position: relative;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .title {
                font-size: 50px;
                position: relative;
            }

            .links {
                color: #636b6f;
                padding: 10px 25px;
                font-size: 25px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .home {
                font-size: 15px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            <div class="top-right links home">
                <a href="{{ url('/home') }}">Home</a>
            </div>

            <div class="content">
                <div class="title m-b-md">
                    App Dependency Managment
                </div>
                @if (Route::has('login'))
                    <div class="links">
                        @if (Auth::check())
                            <div class="links">
                                <a href="{{ url('/home') }}">Home</a>
                            </div>
                        @else
                            <div class="links">
                                <a href="{{ url('/login') }}">Login</a>
                                &nbsp
                                <a href="{{ url('/register') }}">Register</a>
                            </div>
                        @endif
                    </div>
                @endif
            </div>



        </div>
    </body>
</html>
