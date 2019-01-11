@extends("Layouts.layout")
@section('Titulo')
Trabajos
@endsection
@section('active_work')
active
@endsection

@section('Seccion')
    <div class="parallax-container">
        <div class="parallax"><img src="{{asset('Img/back.jpg')}}"></div>
    </div>
    <div class="section white container">
        <div class="row">
            <div class="row">
                <h1 class="thin red-text text-lighten-1 center ">Trabajos</h1>
                <div class="col s10 offset-s1">
                    <p align="justify" style="font-size: 1.5em;">
                        En esta seccion podras encontrar todos los trabajos realizados hasta la fecha, disfruta del contenido que CieloRojo ah realizado a lo largo de este tiempo con la finalidad de que puedas
                        explorar y conocer mas de nuestro entorno.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="row content">
                        @forelse($albums as $album)
                            <div class="col l4 m6 s12 grid">
                                <figure class="effect-sadie">
                                    <img src="{{$album->ar}}" class="responsive-img" >
                                    <figcaption>
                                        <h2 >{{$album->titulo}}</h2>
                                        <a href="{{URL::to('Work/'.$album->id_workalbum)}}" ></a>
                                    </figcaption>
                                </figure>
                            </div>
                        @empty
                            <h1>No hay datos</h1>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="parallax-container">
        <div class="parallax"><img src="{{asset('Img/back.jpg')}}"></div>
    </div>
@endsection




