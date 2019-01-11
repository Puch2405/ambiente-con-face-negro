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
                        <span class="card-title thin red-text text-lighten-1 center" >{{$fotos->titulo}}</span>
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
            <div class="col s12 m12 l12 xl12">
                <h5>Comentarios</h5>
            </div>
            @forelse($coments as $com)
                <div class="row">
                    <div class="col s10 m10 l10 xl10">
                        <div class="card ">
                            <div class="card-content black-text">
                                <span class="card-title">{{$com->name}} : {{$com->descripcion}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col s12 m12 l12">
                    <h3>No hay comentarios</h3>
                </div>
            @endforelse
        </div>
    </div>
@endsection