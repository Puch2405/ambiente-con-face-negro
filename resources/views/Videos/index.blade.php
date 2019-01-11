@extends("Layouts.layout")

@section('Titulo')
    Videos
@endsection
@section('active_video')
active
@endsection
@section('Seccion')
    <div class="row">
        <h1 class="thin red-text text-lighten-1 center ">Videos</h1>
        <div class="col s10 offset-s1">
            <p align="justify">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius eligendi et magni perferendis totam. At culpa ducimus fugit,
                id inventore ipsa ipsum laboriosam praesentium quia, quos sapiente sequi tenetur vel!
            </p>
        </div>

    </div>

        @forelse($vid as $videos)
        <div class="row">
            <div class="col s12 m10 l10 xl10 offset-m1 offset-l1 offset-xl1" style="padding-bottom: 2em;">
                <h3 class="thin red-text text-lighten-1 center">{{$videos->titulo}}</h3>
                <div class="video-container">
                    <iframe src="{{$videos->link}}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    <p><a href="https://vimeo.com/235474245"></a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s5 offset-s5">
                <a href="{{URL::to('Work/'.$videos->id_workalbum)}}" class="waves-effect waves-light btn left center">Ir al proyecto</a>
            </div>
        </div>
        @empty
    @endforelse
@endsection
