@extends("Layouts.layout")

@section('Titulo')
    Formulario Fotos
@endsection

@section('Seccion')
    <div class="container">
        <div class="row">
           <div class="col s8 offset-s2 card z-depth-4">
               <div class="col s12 m12 l12">
                   <h2>
                       Actualizar Foto
                   </h2>
               </div>
               @foreach($data as $dat)
                   {!! Form::model($dat, ['url' => ['Photos/Admin',$dat->id_photo], 'method'=>'PUT','files'=>true]) !!}

                   @include('Admin.Photo.partials.form')

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