@extends("Layouts.layout")

@section('Admin')
    Fotos
@endsection
@section('active_admin')
    active
@endsection

@section('Seccion')
    <div class="col s12 m12 l8 offset-l2">
        <h4 class="Titulos center">Panel de Administración</h4>
    </div>

    <div class="row">
        <div class="col s12 m12 l4 offset-l1">
            <div class="card ">
                <div class="card-content amber accent-1 center">
                    <span class="card-title deep-orange-text text-accent-4">Videos</span>
                    <div class="center">
                        <a href="Admin/Video">  <i class="large material-icons white-text">ondemand_video</i></a>
                    </div>
                </div>
                <div class="card-action">

                </div>
            </div>
        </div>
        <div class="col s12 m12 l4 offset-l2">
            <div class="card ">
                <div class="card-content amber accent-1 center">
                    <span class="card-title deep-orange-text text-accent-4">Imagenes</span>
                    <div class="center">

                        <a href="">  <i class="large material-icons white-text"> photo_camera</i></a>

                    </div>
                </div>
                <div class="card-action">

                </div>
            </div>
        </div>
    </div>
@endsection