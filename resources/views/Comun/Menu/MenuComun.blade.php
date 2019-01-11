<div class="navbar-fixed">
    <nav  class="black yellow-text text-lighten-5 ">
        <div class="nav-wrapper">
            <a class="brand-logo" href="{{url('Trabajos/Comun')}}">
                <img src="{{asset('Img/cielo2.png')}}">
            </a>

            <a href="#" data-activates="mobile-demo" class="button-collapse"><span class="icon-menu icono" ></span></a>

            <ul class="right hide-on-med-and-down nav" id="nav-mobile">

                <li class="@yield('active_work')">
                    <a class="white-text text-lighten-1" href="{{url('Trabajos/Comun')}}" >
                        <span class="icon-office"></span>

                        <span>PROYECTOS</span>
                    </a>

                </li>
                <li class="@yield('active_photos')">
                    <a class="white-text text-lighten-1" href="{{url('Fotos/Comun')}}" >
                        <span class="icon-camera"></span>

                        <span>FOTOS</span>
                    </a>
                </li>
                <li class="@yield('active_video')">
                    <a class="white-text text-lighten-1" href="{{url('Films/Comun')}}" >
                        <span class="icon-video-camera"></span>

                        <span>VIDEO</span>
                    </a>
                </li>
                <li class="@yield('active_about')">
                    <a class="white-text text-lighten-1" href="{{url('Acercas/Comun')}}" >
                        <span class=" icon-sphere"></span>
                        <span>ACERCA DE</span>
                    </a>
                </li>

                <li class="@yield('active_award')">
                    <a class="white-text text-lighten-1" href="{{url('Premios/Comun')}}" >
                        <span class="icon-star-full"></span>
                        <span>PREMIOS</span>
                    </a>
                </li>

                @if(empty(Auth::user()->avatar))
                    <li style="width:40px; padding-top: 0.5em;">
                        <img src="{{asset('Photos/avi.jpg')}}" class="circle responsive-img">


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @else
                    <li style="width:40px; padding-top: 0.5em;">
                        <img src="{{ Auth::user()->avatar }}" class="circle responsive-img">
                    </li>
                @endif

                <li>
                    <a href="#" class="dropdown-button" data-activates="dropdown1" role="button" aria-expanded="false" aria-haspopup="true">
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
                <li>
                    <a id="change_foto">
                        Cambio de foto
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<ul class="side-nav black yellow-text text-lighten-5" id="mobile-demo">
    <li style="width: 24%; padding-left: 2em; padding-top: 2em;">
        <img src="{{ Auth::user()->avatar }}" class="circle responsive-img">
    </li>

    <li class="@yield('active_work')">
        <a class="white-text text-lighten-1" href="{{url('Trabajos/Comun')}}" >
            <span class="icon-office"></span>

            <span>PROYECTOS</span>
        </a>

    </li>
    <li class="@yield('active_photos')">
        <a class="white-text text-lighten-1" href="{{url('Fotos/Comun')}}" >
            <span class="icon-camera"></span>

            <span>FOTOS</span>
        </a>
    </li>
    <li class="@yield('active_video')">
        <a class="white-text text-lighten-1" href="{{url('Films/Comun')}}" >
            <span class="icon-video-camera"></span>

            <span>VIDEO</span>
        </a>
    </li>
    <li class="@yield('active_about')">
        <a class="white-text text-lighten-1" href="{{url('Acercas/Comun')}}" >
            <span class=" icon-sphere"></span>
            <span>ACERCA DE</span>
        </a>
    </li>

    <li class="@yield('active_award')">
        <a class="white-text text-lighten-1" href="{{url('Premios/Comun')}}" >
            <span class="icon-star-full"></span>
            <span>PREMIOS</span>
        </a>
    </li>

    <li>
        <a class="white-text text-lighten-1" href="#">
            {{ Auth::user()->name }}
        </a>
    </li>

    <li>
        <a class="white-text text-lighten-1" href="{{ route('logout') }}"
           onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>

<aside id="container_modal" class="col s12 m2 l2 offset-l5 offset-m5">

</aside>

<script>
    $("#change_foto").click(function()
    {
        var data_url="{{ URL::to('Change/Comun/create') }}";
        $.get(data_url,{},function(resu){
            $("#container_modal").html(resu);
        });
    });
</script>