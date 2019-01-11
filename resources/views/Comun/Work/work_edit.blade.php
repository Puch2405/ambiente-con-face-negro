@extends("Layouts.layout")

@section('Titulo')
    Trabajos
@endsection
@section('active_work')
    active
@endsection

@section('Seccion')
    <!--Formato correcto para repetir los albunes-->
    @forelse($corde as $cor)
        <div class="row">
            <div class="container">
                <h1>
                    <p class="thin red-text text-lighten-1 center">{{$cor->titulo}}</p>
                </h1>
            </div>
        </div>
    @empty
        <div class="row">
            <div class="container">
                <p>no hay titulo</p>
            </div>
        </div>
    @endforelse


    <div class="row">
        <div class="col s10 offset-s1">
            @forelse($work as $al)
                <div class="video-container">
                    <iframe src="{{$al->link}}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    <p><a href="https://vimeo.com/235474245"></a></p>
                </div>

                <div>
                    <p align="justify">
                        {{$al->descripcion}}
                    </p>
                </div>
            @empty
                <div class="row">
                    <div class="container">
                        <p>no hay titulo</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="thin red-text text-lighten-1 center">Imagenes del Album</h3>
        </div>
    </div>
    <div class="row">
        <div class="col s10 offset-s1">
            <div class="container">
                <div id="galley">
                    @forelse($rutasIm as $rti)
                        <ul class="pictures">
                            <li><img class="col s12 m3 l3 xl3" src="{{env('APP_URL')}}/{{$rti->archivo}}" class="responsive-img" width="200" style="margin: 0; padding: 0;" ></li>
                        </ul>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="thin red-text text-lighten-1 center">Contenido en 360°</h3>
        </div>
    </div>
    <div class="row">
        @forelse($content as $cont)
            @if($cont->tipo_content==1)
                <div class="col s10 m10 l10 xl10 offset-s1 offset-m1 offset-l1 offset-xl1 ">
                    <div class="video-container">
                        <iframe class="framebox inherit-locale " style="width: calc(100% + 40px); height: 363px;" src="{{env('APP_URL')}}/{{$cont->archivo}}" id="autoSize-0"><</iframe>
                        <div id='vrview' class="center"></div>
                    </div>
                </div>
            @else
                <div class="col s10 offset-s1 center">
                    <div class="video-container">
                        <iframe src="{{$cont->archivo}}" width="640" height="274" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                </div>
            @endif
        @empty

        @endforelse
    </div>

    <div class="row">
        <div class="col s12 m10 l10 xl10  offset-m1 offset-l1 offset-xl1">
            @forelse($proyectos as $pro)
                @foreach($img as $im)
                    @if($pro->mayor>0 && $pro->menor>0)
                        <div class="col l4 m6 s12 grid left">
                            <figure class="effect-sadie">
                                <img src="{{env('APP_URL')}}/{{$im->imgMenor}}" class="responsive-img " >
                                <figcaption>
                                    <h2 >{{$im->titMenor}}</h2>
                                    <a href="{{URL::to('Trabajos/Comun/'.$pro->menor)}}" ></a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col l4 m6 s12 grid right">
                            <figure class="effect-sadie">
                                <img src="{{env('APP_URL')}}/{{$im->imgMayor}}" class="responsive-img " >
                                <figcaption>
                                    <h2 >{{$im->titMayor}}</h2>
                                    <a href="{{URL::to('Trabajos/Comun/'.$pro->mayor)}}" ></a>
                                </figcaption>
                            </figure>
                        </div>
                    @elseif($pro->mayor==0 && $pro->menor>0)
                        <div class="col l4 m6 s12 grid left">
                            <figure class="effect-sadie">
                                <img src="{{env('APP_URL')}}/{{$im->imgMenor}}" class="responsive-img " >
                                <figcaption>
                                    <h2 >{{$im->titMenor}}</h2>
                                    <a href="{{URL::to('Trabajos/Comun/'.$pro->menor)}}" ></a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col l4 m6 s12 grid right">
                            <figure class="effect-sadie">
                                <img src="{{asset('Photos/equipo_entrevista.jpg')}}" class="responsive-img " >
                                <figcaption>
                                    <h2 >Proyectos</h2>
                                    <a href="{{URL::to('Trabajos/Comun')}}" ></a>
                                </figcaption>
                            </figure>
                        </div>
                    @elseif($pro->mayor>0 && $pro->menor==0)
                        <div class="col l4 m6 s12 grid left">
                            <figure class="effect-sadie">
                                <img src="{{asset('Photos/equipo_entrevista.jpg')}}" class="responsive-img " >
                                <figcaption>
                                    <h2 >Proyectos</h2>
                                    <a href="{{URL::to('Trabajos/Comun')}}" ></a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col l4 m6 s12 grid right">
                            <figure class="effect-sadie">
                                <img src="{{env('APP_URL')}}/{{$im->imgMayor}}" class="responsive-img " >
                                <figcaption>
                                    <h2 >{{$im->titMayor}}</h2>
                                    <a href="{{URL::to('Trabajos/Comun/'.$pro->mayor)}}" ></a>
                                </figcaption>
                            </figure>
                        </div>
                    @endif
                @endforeach
            @empty

            @endforelse
        </div>
    </div>

    <div class="row">
        <div class="col s10 offset-s1">
            <h3 class="thin red-text text-lighten-1 center">Infografia en PDF</h3>
        </div>
        <div class="col s1 offset-s6">
            @forelse($corde as $cor)
                <div class="row">
                    <a href="{{ asset($cor->infografia)}}" target="_blank" class="btn-floating green waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Vizualizar Pdf">picture_as_pdf</i></a>
                </div>
                <div class="row">
                    <a href="{{URL::to('Pdf/Comun/'.$cor->id_workalbum)}}"  class="btn-floating green waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Descargar Pdf">arrow_downward</i></a>
                </div>
            @empty

            @endforelse
        </div>
    </div>

    <div class="row">
        <div class="col s10 offset-s1">
            <div class=" col s12 m12 l12 xl12">
                <h5>Agregar Nuevos Comentarios</h5>
            </div>
            <div  class="col s12 m6 l6 xl6">
                {!! Form::open(['url' => 'ComentWork/Comun', 'files'=>true]) !!}

                @include('Comun.Photo.partials.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="col s12 m12 l12 xl12">
                <h5>Comentarios</h5>
            </div>
            @forelse($coments as $com)
                @if($com->id_commentwork==$id)
                    <div class="row">
                        <div class="col s12 m10 l10 xl10">
                            <div class="card ">
                                <div style="padding: 1em;">
                                    @foreach($data as $dat)
                                        {!! Form::model($dat, ['url' => ['ComentWork/Comun',$dat->id_commentwork], 'method'=>'PUT','files'=>true]) !!}

                                        @include('Comun.Work.partials.form_update')

                                        {!! Form::close() !!}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col s12 m10 l10 xl10 offset-m1 offset-l1 offset-xl1">
                            <div class="card ">
                                <div class="card-content black-text">
                                    <span class="card-title">{{$com->name}} : {{$com->descripcion}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="col s12 m12 l12">
                    <h3>No hay comentarios</h3>
                </div>
            @endforelse
        </div>
    </div>

    @forelse($corde as $cor)
        <div class="row">
            <div class="col s10 offset-s1">
                <img src="{{env('APP_URL')}}/Photos/mapa.png" width="60%;">
            </div>
        </div>
    @empty
        <div class="row">
            <div class="col s10 offset-s1">
                <p>no hay ubicacion</p>
            </div>
        </div>
    @endforelse
    <script>
        $('.dropdown-button').dropdown({
                inDuration: 300,
                outDuration: 225,
                constrainWidth: false, // Does not change width of dropdown to that of the activator
                hover: true, // Activate on hover
                gutter: 0, // Spacing from edge
                belowOrigin: false, // Displays dropdown below the button
                alignment: 'left', // Displays dropdown with edge aligned to the left of button
                stopPropagation: false // Stops event propagation
            }
        );
        window.addEventListener('DOMContentLoaded', function () {
            var galley = document.getElementById('galley');
            var viewer = new Viewer(galley, {
                url: 'data-original',
                toolbar: {
                    oneToOne: true,

                    prev: function() {
                        viewer.prev(true);
                    },

                    play: true,

                    next: function() {
                        viewer.next(true);
                    },
                },
            });
        });
    </script>
@endsection
