@extends("Layouts.layout")

@section('Titulo')
    Acerca de
@endsection
@section('active_award')
    active
@endsection
@section('contenedor')
    container z-depth-4 white
@endsection
@section('Seccion')
    <div class="col s12 m12 l8 offset-l2">
        <h4 class="Titulos center">Lista de Premios</h4>
    </div>

    <div class="row">
        <div class="col s12 m12 l8 offset-l2">
            <div class="right">
                <a href="{{ URL::to('Awards/Admin/create') }}" class="btn-floating green accent-4 btn-large waves-effect"><i class="material-icons prefix tooltipped medium"  data-position="top" data-tooltip="Agregar">add</i></a>
            </div>
            <table class="centered striped responsive-table">
                <thead>
                <tr>
                    <th>Id Award</th>
                    <th>Titulo del proyecto</th>
                    <th>Descripcion</th>
                    <th>Archivo</th>
                    <th>Proyecto</th>
                    <th colspan="2">Acciones</th>
                </tr>
                </thead>
                <tbody id="content_table">
                @foreach($award as $aw)
                    <tr>
                        <td>{{$aw->id_award}}</td>
                        <td>{{$aw->titulo}}</td>
                        <td>{{$aw->descripcion}}</td>
                        <td class="materialboxed"><img src="{{env('APP_URL')}}/{{$aw->archivo}}" width="50%;" class=" responsive-img"></td>
                        <td>{{$aw->pro}}</td>
                        <td> <a href="{{ URL::to('Awards/Admin/'.$aw->id_award).'/'.'edit' }}" class="btn-floating amber lighten-2 waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Editar">edit</i></a> </td>
                        <td>
                            {!! Form::open(['url' => ['Awards/Admin',$aw->id_award] , 'method' => 'DELETE']) !!}
                            <button href="#!" class="btn-floating deep-orange accent-4 waves-effect btn_eliminar"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Eliminar">delete</i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.tooltipped').tooltip();
        });
    </script>
@endsection