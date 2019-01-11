@extends("Layouts.layout")

@section('Titulo')
    Formulario Album de fotos
@endsection

@section('Seccion')
    <div class="container">
        <div class="row">
            <div class="col s12 m8 l8 xl8 offset-m2 offset-l2 offset-xl2 card z-depth-4">
                <div class="col s12 m12 l12">
                    <h2>
                        Actualizar Album
                    </h2>
                </div>
                @foreach($data as $dat)
                    {!! Form::model($dat, ['url' => ['AlbumPhoto/Admin',$dat->id_album], 'method'=>'PUT','files'=>true]) !!}

                    @include('Admin.AlbumPhoto.partials.form')

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