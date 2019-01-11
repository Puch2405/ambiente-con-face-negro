@extends("Layouts.layout")
@section('Titulo')
    Premios
@endsection
@section('active_award')
    active
@endsection

@section('Seccion')

    <div class="row">
        <div class="col s10 offset-s1">
            <div class="row content">
                @forelse($award as $aw)
                    <div class="col s10 offset-s1">
                        <h1 class="thin red-text text-lighten-1 center ">{{$aw->titulo}}</h1>
                    </div>

                    <div class="col s10 offset-s1">
                        <p align="justify" style="font-size: 1.5em;">
                            {{$aw->descripcion}}
                        </p>
                    </div>

                    <div class="col s12 m10 l10 xl10 offset-m1 offset-l1 offset-xl1" style="padding-bottom: 2em;">
                        <h3 class="thin red-text text-lighten-1 center">{{$aw->titulop}}</h3>
                        <div class="video-container">
                            <iframe src="{{$aw->video}}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            <p><a href="https://vimeo.com/235474245"></a></p>
                        </div>
                    </div>

                    <div class="col s12 m4 l4 offset-m2 offset-l2">
                        <a href="{{URL::to('Work/'.$aw->id_proyecto)}}" class="waves-effect waves-light btn left center">Ir al proyecto</a>
                    </div>

                    <div class="col s12 m4 l4 offset-m2 offset-l2">
                        <a href="{{URL::to('Award')}}" class="waves-effect waves-light btn left center">Premios</a>
                    </div>

                @empty

                @endforelse
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function(){

        });
    </script>
@endsection