<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Brainobrain Assessment</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
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
                min-height:72vh;
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
            }

            .title {
                font-size: 84px;
                padding-top:60px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .homebg {
                background:url("{{ asset('images/web-bg.jpg') }}") no-repeat 0 0;
            }
            .barnbtn {
                display:none;
            }
            .links a:hover {
                color:#f79633;
            }
            .navbar {
                display:flex;
                justify-content:space-between;
                align-items:center;
                padding:10px 40px;
                background-color:#fff;
            }
            .barbtn {
                display:none
            }
            
            @media all and (max-width:768px) {
                .links {
                    display:none;
                }
                .links.toggled {
                    display: block;
                    width: 240px;
                    height: 100vh;
                    padding: 30px 30px;
                    background: #f9f9f9;
                    position: absolute;
                    right: 0;
                    top: 90px;
                }
                .links a {
                    display:block;
                    padding:10px 0;
                }
                .barbtn {
                    width: 32px;
                    height: 32px;
                    /* padding: 8px; */
                    display: block;
                    line-height: 32px;
                    text-align: -webkit-center;
                    cursor: pointer;
                }
                .bar {
                    width:24px;
                    height:2px;
                    background-color:#333;
                   
                }
                .bar:nth-child(2) {
                    margin:4px 0;
                }
                .title {
                    font-size:40px;
                }
                .top-right {
                    top:0;
                    right:0;
                }
            }
        </style>
    </head>
    <body class="homebg">
        
       
            @if (Route::has('login'))
            <div class="navbar">    
                <div>
                        <img width="75" src="{{ asset('images/brainobrain-logo.png') }}" alt="logo" />
                </div>
                <div class="links">
                    @auth
                        @if(Auth::user())
                            @if(property_exists(Auth::user(),'franchisee_id_fk'))
                            <a href="{{ url('/parent') }}">Home</a>
                            @else
                            <a href="{{ url('/home') }}">Home</a>
                            @endif
                        @else
                        <a href="{{ url('/parent') }}">Home</a>
                        @endif                        
                    @else
                        <a href="{{ route('login.parents') }}">Parent Login</a>
                        <a href="{{ route('register.parents') }}">Parent Register</a>
                        <a href="{{ route('login') }}">Franchisee Login</a>
                        <a href="{{ route('register') }}">Franchisee Register</a>
                    @endauth
                </div>
                <div class="barbtn">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div>    
            @endif
            <div class="flex-center">
            <div class="title m-b-md pt-4">
                    BRAINOBRAIN
            </div>
            <div>
        </div>
        
        <script>
            let actionBtn = $(".barbtn");
            let menuContainer = $(".links");
            $(actionBtn).click(function() {
                $(menuContainer).toggleClass("toggled");
                if ($(menuContainer).hasClass("toggled")) {
                    //$(menubarBtn).removeClass("fa-bars").toggleClass("fa-arrow-left");
                } else {
                   // $(menubarBtn).removeClass("fa-arrow-left").toggleClass("fa-bars");
                }
            });
        </script>
    </body>
</html>
