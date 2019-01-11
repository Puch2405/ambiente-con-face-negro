@extends("Layouts.layout")
@section('Titulo')
    Premios
@endsection
@section('active_award')
    active
@endsection
@section('Seccion')
    <div class="parallax-container">
        <div class="parallax"><img src="{{asset('Img/back.jpg')}}"></div>
    </div>
    <div class="section white container">
        <div class="row">
            <div class="row">
                <h1 class="thin red-text text-lighten-1 center ">Premios</h1>
                <div class="col s10 offset-s1">
                    <p align="justify" style="font-size: 1.5em;">
                        Descripcion del apartado
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="row content">
                        @forelse($award as $aw)
                            <div class="col l4 m6 s12 grid">
                                <figure class="effect-sadie">
                                    <img src="{{$aw->archivo}}" class="responsive-img" >
                                    <figcaption>
                                        <h2 >{{$aw->titulo}}</h2>
                                        <a href="{{URL::to('Award/'.$aw->id_award)}}" ></a>
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
<script type="text/javascript">

    $(document).ready(function(){

    });
</script>

