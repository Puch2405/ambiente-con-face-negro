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
            <div class="col s12 card z-depth-4">
                <div class="col s12 m12 l12">
                    <h2>
                        Formulario Album de Trabajos
                    </h2>
                </div>
                {!! Form::open(['url' => 'AlbumWork/Admin', 'files'=>true]) !!}

                @include('Admin.AlbumWork.partials.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('select').material_select();
        });
    </script>
@endsection