@extends("Layouts.layout")

@section('Titulo')
    Formulario Acerca de
@endsection

@section('Seccion')
    <div class="container">
        <div class="row">
            <div class="col s12 m8 l8 xl8 offset-m2 offset-l2 offset-xl2 card z-depth-4">
                <div class="col s12 m12 l12">
                    <h2>
                        Formulario Acerca de
                    </h2>
                </div>
                {!! Form::open(['url' => 'Abouts/Admin', 'files'=>true]) !!}

                @include('Admin.About.partials.form')

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