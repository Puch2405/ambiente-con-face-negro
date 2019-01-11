@extends("Layouts.layout")
@section('Titulo')
    Recorridos
@endsection
@section('active_rec')
    active
@endsection

@section('Seccion')
    <div class="row">
        <h1 class="thin red-text text-lighten-1 center ">Recorridos</h1>
    </div>
    @forelse($albums as $album)
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img src="{{$album->ar}}" class="responsive-img im " >
            </div>
            <div class="card-content">
                <span class="card-title activator thin red-text text-lighten-1 center">{{$album->titulo}}<i class="material-icons right">info</i></span>
                <div class="row">
                    <p class="col s6 m6 l6 xl6"><a  id="rec" class="waves-effect waves-light btn  blue darken-4"><i class="material-icons left ">play_circle_filled</i>Recorrido Virtual</a></p>
                    <p class="col s6 m6 l6 xl6"><a class="waves-effect waves-light btn right teal darken-4"><i class="material-icons left">book</i>Infoteca</a></p>
                </div>
            </div>
            <div class="card-reveal">
                <span class="card-title activator thin red-text text-lighten-1 center"><i class="material-icons right">close</i>{{$album->titulo}}</span>
                <p>{{$album->descripcion}}</p>
            </div>
        </div>
        <input value="{{$album->id_recorridoalbum}}" type="hidden" name="id_recorrido" id="id_recorrido">
    @empty
    @endforelse

@endsection

