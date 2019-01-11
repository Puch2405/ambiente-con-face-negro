<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>@yield("Titulo")</title>
        <!-- Fonts -->

        {!! MaterializeCSS::include_full() !!}
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{asset('fonts/icons/material-icons.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/viewer.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/toastr.css')}}" rel="stylesheet" type="text/css">

        <script src="{{asset('js/toastr.js')}}"></script>
        <script src="{{asset('js/viewer.js')}}"></script>
        <script src="https://storage.googleapis.com/vrview/2.0/build/vrview.min.js"></script>


        <!-- Styles -->
    </head>
    <body class="white">
    <header>
        @guest
            <div class="navbar-fixed">
                <nav  class=" black yellow-text text-lighten-5 ">

                    <div class="nav-wrapper">
                        <a class="brand-logo" href="/">
                            <img src="{{asset('Img/cielo2.png')}}">
                        </a>
                        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down" id="nav-mobile">
                            <li class="@yield('active_work')">
                                <a class="white-text text-lighten-1" href="{{url('Work')}}" >
                                    <span class="icon-office"></span>
                                    <span>PROYECTOS</span>
                                </a>
                            </li>
                            <li class="@yield('active_photos')">
                                <a class="white-text text-lighten-1" href="{{url('Photo')}}" >
                                    <span class="icon-camera"></span>

                                    <span>FOTOS</span>
                                </a>
                            </li>
                            <li class="@yield('active_video')">
                                <a class="white-text text-lighten-1" href="{{url('Video')}}" >
                                    <span class="icon-video-camera"></span>

                                    <span>VIDEO</span>
                                </a>
                            </li>
                            <li class="@yield('active_about')">
                                <a class="white-text text-lighten-1" href="{{url('About')}}" >
                                    <span class=" icon-sphere"></span>
                                    <span>ACERCA DE</span>
                                </a>
                            </li>
                            <li class="@yield('active_award')">
                                <a href="{{url('Award')}}" >
                                    <span class="icon-star-full"></span>
                                    <span>PREMIOS</span>
                                </a>
                            </li>
                            <li><a class="white-text text-lighten-1" href="{{ route('login') }}">Login</a></li>
                            <li><a class="white-text text-lighten-1" href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

            <ul class="side-nav black yellow-text text-lighten-5" id="mobile-demo">
                <li style="color:white;">
                    <a class="brand-logo" href="/">
                        <img src="{{asset('Img/cielo2.png')}}">
                    </a>
                </li>
                <li class="@yield('active_work')">
                    <a class="white-text text-lighten-1" href="{{url('Work')}}" >
                        <span class="icon-office"></span>
                        <span>PROYECTOS</span>
                    </a>
                </li>
                <li class="@yield('active_photos')">
                    <a class="white-text text-lighten-1"href="{{url('Photo')}}" >
                        <span class="icon-camera"></span>

                        <span>FOTOS</span>
                    </a>
                </li>
                <li class="@yield('active_video')">
                    <a class="white-text text-lighten-1" href="{{url('Video')}}" >
                        <span class="icon-video-camera"></span>

                        <span>VIDEO</span>
                    </a>
                </li>
                <li class="@yield('active_about')">
                    <a class="white-text text-lighten-1" href="{{url('About')}}" >
                        <span class=" icon-sphere"></span>
                        <span>ACERCA DE</span>
                    </a>
                </li>
                <li class="@yield('active_about')"><a style="color:white;" href="{{url('About')}}" >
                        <span class=" icon-sphere"></span>
                        <span>ACERCA DE</span>
                    </a>
                </li>
                <li >
                    <a class="white-text text-lighten-1" href="{{ route('login') }}">Login</a>
                </li>
                <li>
                    <a class="white-text text-lighten-1" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        @else
             @if(Auth::user()->tipo_usuario == 2 )
                 @include('Admin.Menu.MenuAdmin')
             @else
                 @include('Comun.Menu.MenuComun')
             @endif
        @endguest

        @if(session('info'))
            <script>
                toastr.options = {
                    "positionClass": "toast-top-center"
                }
                toastr["success"]("{{ session('info') }}");
            </script>
        @endif

        @if(count($errors))
            @foreach($errors->all() as $error)
                <script>
                    toastr.options = {
                        "positionClass": "toast-top-center"
                    }
                    toastr["error"]("{{ $error }}");
                </script>
            @endforeach
        @endif

        @yield('content')
 </header>
    <main class="container z-depth-4">

            @yield("Seccion")

    </main>
    <footer class="page-footer  grey black-text text-lighten-1">
        <div class="container">
            <div class="row">
                <div class="col l4 offset-l2 m12 s12 left">
                    <div class="row ">
                        <h5 class="col">Siguenos</h5>

                        <div class="col">
                            <h5>
                            <a class="black-text text-lighten-1" href="https://www.facebook.com/ambientecielorojo/" target="_blank" class="yellow-text text-lighten-5"><span class="icon-facebook2"></span></a>
                            </h5>
                        </div>
                        <div class="col">
                            <h5>
                            <a class="black-text text-lighten-1" href="#!" class=" yellow-text text-lighten-5"><span class="icon-instagram"></span></a>
                            </h5>
                        </div>
                        <div class="col">
                            <h5>
                            <a class="black-text text-lighten-1" href="#!" class="yellow-text text-lighten-5"><span class="icon-twitter"></span></a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container black-text text-lighten-1">
                © ® Todos los derechos reservados para AmbienteCieloRojo.
            </div>
        </div>
    </footer>
    </body>
</html>
@yield('modal')
<script>
    $(document).ready(function(){
        $('.carousel.carousel-slider').carousel({fullWidth: true});
        $('.tooltipped').tooltip({delay: 50});
        $(".button-collapse").sideNav();
        $(".dropdown-button").dropdown({
         hover:true
        });

        var url=$("#imagen360").val();
        var vrView = new VRView.Player('#vrview', {
            image: url,
            is_stereo: true,
            width:1000
        });
    });

</script>