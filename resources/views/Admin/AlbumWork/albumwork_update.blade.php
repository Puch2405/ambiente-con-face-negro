@extends("Layouts.layout")

@section('Titulo')
    Formulario Album de trabajos
@endsection
@section('active_work')
    active
@endsection

@section('Seccion')
    <div class="container">
        <div class="row">
            <div class="col s12 m8 l8 xl8 offset-m2 offset-l2 offset-xl2 card z-depth-4">
                <div class="col s12 m12 l12">
                    <h2>
                        Actualizar Album de Trabajos
                    </h2>
                </div>
                @foreach($data as $dat)
                    {!! Form::model($dat, ['url' => ['AlbumWork/Admin',$dat->id_workalbum], 'method'=>'PUT','files'=>true]) !!}

                    @include('Admin.AlbumWork.partials.form')

                    {!! Form::close() !!}
                @endforeach
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('select').material_select();
        });
    </script>
@endsection