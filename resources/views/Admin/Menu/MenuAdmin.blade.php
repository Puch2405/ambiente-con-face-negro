<div class="navbar-fixed">
    <nav  class="black yellow-text text-lighten-5">
        <div class="nav-wrapper" id="lista">
            <a class="brand-logo" href="{{url('Works/Admin')}}">
                <img src="{{asset('Img/cielo2.png')}}">
            </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><span class="icon-menu icono" ></span></a>

            <ul class="right hide-on-med-and-down nav">
                <li class="@yield('active_rec')">
                    <a class="white-text text-lighten-1" href="{{url('Recorridos/Admin')}}" >
                        <span class="icon-loop"></span>

                        <span>CONTENIDO EN 360</span>
                    </a>
                </li>

                <li class="@yield('active_photos')">
                    <a class="white-text text-lighten-1" href="{{url('Works/Admin')}}" >
                        <span class="icon-camera"></span>

                        <span>FOTOS DE PROYECTOS</span>
                    </a>
                </li>

                <li class="@yield('active_work')">
                    <a class="white-text text-lighten-1" href="{{url('AlbumWork/Admin')}}" >
                        <span class="icon-office"></span>

                        <span>PROYECTOS</span>
                    </a>
                </li>

                <li class="@yield('active_info')">
                    <a class="white-text text-lighten-1" href="{{url('Infoteca/Admin')}}">
                        <i class="material-icons left">picture_as_pdf</i>
                        INFOGRAFIA
                    </a>
                </li>

                <li class="@yield('active_about')">
                    <a class="white-text text-lighten-1" href="{{url('Abouts/Admin')}}" >
                        <span class=" icon-sphere"></span>
                        <span>ACERCA DE</span>
                    </a>
                </li>

                <li class="@yield('active_award')">
                    <a class="white-text text-lighten-1" href="{{url('Awards/Admin')}}" >
                        <span class="icon-star-full"></span>
                        <span>PREMIOS</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="dropdown-button white-text text-lighten-1" data-activates="dropdown1" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }} <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            </ul>
            <ul id="dropdown1" class="dropdown-content">
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>
<ul class="side-nav black yellow-text text-lighten-5" id="mobile-demo">
    <li>
        <a class="brand-logo" href="{{url('Works/Admin')}}">
            <img src="{{asset('Img/cielo2.png')}}">
        </a>
    </li>
    <li class="@yield('active_rec')">
        <a class="white-text text-lighten-1" href="{{url('Recorridos/Admin')}}" >
            <span class="icon-loop"></span>

            <span>CONTENIDO EN 360</span>
        </a>
    </li>

    <li class="@yield('active_photos')">
        <a class="white-text text-lighten-1" href="{{url('Works/Admin')}}" >
            <span class="icon-camera"></span>

            <span>FOTOS DE PROYECTOS</span>
        </a>
    </li>

    <li class="@yield('active_work')">
        <a class="white-text text-lighten-1" href="{{url('AlbumWork/Admin')}}" >
            <span class="icon-office"></span>

            <span>PROYECTOS</span>
        </a>
    </li>

    <li class="@yield('active_info')">
        <a class="white-text text-lighten-1" href="{{url('Infoteca/Admin')}}"><i style="color:white; margin: 0;" class="material-icons">picture_as_pdf</i>INFOGRAFIA</a>
    </li>

    <li class="@yield('active_about')">
        <a class="white-text text-lighten-1" href="{{url('Abouts/Admin')}}" >
            <span class=" icon-sphere"></span>
            <span>ACERCA DE</span>
        </a>
    </li>

    <li class="@yield('active_award')">
        <a class="white-text text-lighten-1" href="{{url('Awards/Admin')}}" >
            <span class="icon-star-full"></span>
            <span>  PREMIOS</span>
        </a>
    </li>

    <li>
        <a style="color:white;" href="#">
            {{ Auth::user()->name }}
        </a>
    </li>

    <li>
        <a style="color:white;" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>








