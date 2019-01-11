@extends("Layouts.layout")
@section('Titulo')
    Trabajos
@endsection
@section('active_work')
    active
@endsection

@section('Seccion')
    <div class="row">
        <h1 class="thin red-text text-lighten-1 center ">Trabajos</h1>
        <div class="col s10 offset-s1">
            <p align="justify">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius eligendi et magni perferendis totam. At culpa ducimus fugit,
                id inventore ipsa ipsum laboriosam praesentium quia, quos sapiente sequi tenetur vel!
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col s10 offset-s1">
            <div class="row content">
                @forelse($albums as $album)
                    <div class="col l4 m6 s12 grid">
                        <figure class="effect-sadie">
                            <img src="{{env('APP_URL')}}/{{$album->ar}}" class="responsive-img " >
                            <figcaption>
                                <h2 >{{$album->titulo}}</h2>
                                <a href="{{URL::to('Trabajos/Comun/'.$album->id_workalbum)}}" ></a>
                            </figcaption>
                        </figure>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection