@extends("Layouts.layout")

@section('Titulo')
    Trabajos
@endsection
@section('active_work')
    active
@endsection
@section('contenedor')
    container z-depth-4 white
@endsection
@section('Seccion')
    <!--Formato correcto para repetir los albunes-->
    <?php
        function mostrar($srt)//Funcion para comvertir caracteres
        {
            $codificacion = mb_detect_encoding($srt, "UTF-8,ISO-8859-1");
            $corde = iconv($codificacion, 'UTF-8',$srt);
            echo $srt;
        }
    ?>
    @forelse($corde as $cor)
        <div class="row">
            <div class="container">
                <h1>
                    <p class="thin red-text text-lighten-1 center">{{mostrar($cor->titulo)}}</p>
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
            @forelse($album as $al)
                <div class="video-container">
                    <iframe src="{{$al->link}}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    <p><a href="https://vimeo.com/235474245"></a></p>
                </div>

                <div>
                    <p align="justify" style="font-size: 1.5em;">
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
            <h3 class="thin red-text text-lighten-1 center">Imagenes del Album </h3>
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
        @if(empty($content))
            <div class="col s10 offset-s1">
                <h3 class="thin red-text text-lighten-1 center">No cuenta con contenido en 360°</h3>
            </div>
        @else
            @forelse($content as $cont)
                @if($cont->tipo_content==1)
                    <div class="col s10 m10 l10 xl10 offset-s1 offset-m1 offset-l1 offset-xl1 "  style="padding: 1em;">
                        <div class="video-container">
                            <script src="https://static.kuula.io/embed.js" data-kuula="{{$cont->archivo}}" data-width="100%" data-height="640px"></script>
                        </div>
                    </div>
                @else
                    <div class="col s10 m10 l10 xl10 offset-s1 offset-m1 offset-l1 offset-xl1 center" style="padding: 1em;">
                        <div class="video-container">
                            <iframe src="{{$cont->archivo}}" width="640" height="640" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>
                    </div>
                @endif
            @empty

            @endforelse
        @endif
    </div>

    <div class="row">
       <div class="col s12 m10 l10 xl10  offset-m1 offset-l1 offset-xl1">
           @forelse($proyectos as $pro)
                @foreach($img as $im)
                   <div class="col s10 offset-s1">
                       <h3 class="thin red-text text-lighten-1 center">Proyectos</h3>
                   </div>
                   @if($pro->mayor>0 && $pro->menor>0)
                       <div class="col l4 m6 s12 grid left">
                           <figure class="effect-sadie">
                               <img src="{{env('APP_URL')}}/{{$im->imgMenor}}" class="responsive-img " >
                               <figcaption>
                                   <h2 >{{$im->titMenor}}</h2>
                                   <a href="{{URL::to('Work/'.$pro->menor)}}" ></a>
                               </figcaption>
                           </figure>
                       </div>
                       <div class="col l4 m6 s12 grid right">
                           <figure class="effect-sadie">
                               <img src="{{env('APP_URL')}}/{{$im->imgMayor}}" class="responsive-img " >
                               <figcaption>
                                   <h2 >{{$im->titMayor}}</h2>
                                   <a href="{{URL::to('Work/'.$pro->mayor)}}" ></a>
                               </figcaption>
                           </figure>
                       </div>
                   @elseif($pro->mayor==0 && $pro->menor>0)
                       <div class="col l4 m6 s12 grid left">
                           <figure class="effect-sadie">
                               <img src="{{env('APP_URL')}}/{{$im->imgMenor}}" class="responsive-img " >
                               <figcaption>
                                   <h2 >{{$im->titMenor}}</h2>
                                   <a href="{{URL::to('Work/'.$pro->menor)}}" ></a>
                               </figcaption>
                           </figure>
                       </div>
                       <div class="col l4 m6 s12 grid right">
                           <figure class="effect-sadie">
                               <img src="{{asset('Photos/equipo_entrevista.jpg')}}" class="responsive-img " >
                               <figcaption>
                                   <h2 >Proyectos</h2>
                                   <a href="{{URL::to('Work')}}" ></a>
                               </figcaption>
                           </figure>
                       </div>
                   @elseif($pro->mayor>0 && $pro->menor==0)
                       <div class="col l4 m6 s12 grid left">
                           <figure class="effect-sadie">
                               <img src="{{asset('Photos/equipo_entrevista.jpg')}}" class="responsive-img " >
                               <figcaption>
                                   <h2 >Proyectos</h2>
                                   <a href="{{URL::to('Work')}}" ></a>
                               </figcaption>
                           </figure>
                       </div>
                       <div class="col l4 m6 s12 grid right">
                           <figure class="effect-sadie">
                               <img src="{{env('APP_URL')}}/{{$im->imgMayor}}" class="responsive-img " >
                               <figcaption>
                                   <h2 >{{$im->titMayor}}</h2>
                                   <a href="{{URL::to('Work/'.$pro->mayor)}}" ></a>
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
        @if(empty($info))
            <div class="col s10 offset-s1">
                <h3 class="thin red-text text-lighten-1 center">Este proyecto no cuenta con infografia actualmente.</h3>
            </div>
        @else
            <div class="col s10 offset-s1">
                <h3 class="thin red-text text-lighten-1 center">Infografia en PDF</h3>
            </div>
            <div class="col s12 m4 l4 xl4 offset-m4 offset-l4 offset-xl4">
                <table class="responsive-table">
                    <thead>
                    <tr>
                        <th>Titulo</th>
                        <th class="hide-on-small-only">Vizualizar</th>
                        <th class="hide-on-med-and-up">Descargar</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($info as $infografia)
                        <tr>
                            <td>{{$infografia->titulo}}</td>
                            <td><a href="{{ asset($infografia->archivo)}}" target="_blank" class="btn-floating green waves-effect hide-on-small-only"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Vizualizar Pdf">picture_as_pdf</i></a></td>
                            <td><a href="{{URL::to('Pdf/'.$infografia->id_infoteca)}}"  class="btn-floating green waves-effect hide-on-med-and-up"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Descargar Pdf">arrow_downward</i></a></td>
                        </tr>
                    @empty

                    @endforelse
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col s12 m10 l10 xl10 offset-m1 offset-l1 offset-xl1">
            <div class="col s12 m12 l12 xl12">
                <h3 class="thin red-text text-lighten-1 center">Comentarios</h3>
            </div>

            <div class="fb-comments" data-href="https://acrvalle.com/Trabajos/Comun/1" data-width="700" data-numposts="5"></div>
        </div>
    </div>


    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.1&appId=2076468509297441&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
            //var url="https://upload.wikimedia.org/wikipedia/commons/thumb/8/81/360%C2%B0_Panorama_Zitterklapfen_2.jpg/1280px-360%C2%B0_Panorama_Zitterklapfen_2.jpg";

            /*var url="https://cloud.panono.com/p/BiWg4PulYnJH/embed?autorotate=false";

            var vrView = new VRView.Player('#vrview', {
                image: url,
                is_stereo: true,
                width:1000,
                height:500
            });*/
        })

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
