@extends("Layouts.layout")

@section('Titulo')
    Fotos
@endsection
@section('active_photos')
    active
@endsection

@section('Seccion')
    <!--Formato correcto para repetir los albunes-->
    @forelse($pho as $fotos)
        <div class="container">
            <div class="">
                <div class="card" style="top: 2em;">
                    <div class="card-image">
                        <img src="{{env('APP_URL')}}/{{$fotos->archivo}}" class="responsive-img" >
                        <span class="card-title">{{$fotos->titulo}}</span>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col s12 m12 l12">
            <h3>No hay Datos</h3>
        </div>
    @endforelse
    <div class="row">
        <div class="container">
            <div class=" col s12 m12 l12 xl12">
                <h5>Agregar Nuevos Comentarios</h5>
            </div>
            <div  class="col s6 m6 l6 xl6">
                {!! Form::open(['url' => 'ComentAlbum/Comun', 'files'=>true]) !!}

                @include('Comun.Photo.partials.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="col s12 m12 l12 xl12">
                <h5>Comentarios</h5>
            </div>
            @forelse($coments as $com)
                @if($com->id_commentphoto==$id)
                    <div class="row">
                        <div class="col s10 m10 l10 xl10">
                            <div class="card ">
                               <div style="padding: 1em;">
                                   @foreach($data as $dat)
                                       {!! Form::model($dat, ['url' => ['ComentAlbum/Comun',$dat->id_commentphoto], 'method'=>'PUT','files'=>true]) !!}

                                       @include('Comun.Photo.partials.form_update')

                                       {!! Form::close() !!}
                                   @endforeach
                               </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col s10 m10 l10 xl10">
                            <div class="card ">
                                <div class="card-content black-text">
                                    <span class="card-title">Usuario :{{$com->name}}</span>
                                    <p>Comentario: {{$com->descripcion}} </p>
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
    </script>
@endsection
