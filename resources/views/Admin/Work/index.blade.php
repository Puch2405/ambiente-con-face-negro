@extends("Layouts.layout")

@section('Titulo')
    Trabajos
@endsection
@section('active_photos')
    active
@endsection

@section('Seccion')
    <div class="col s12 m12 l8 offset-l2">
        <h4 class="Titulos center">Lista de trabajos</h4>
    </div>

    <div class="row">
        <div class="col s12 m12 l8 offset-l2">
            <div class="right">
                <a href="{{url('Works/Admin/create')}}" class="btn-floating green accent-4 btn-large waves-effect"><i class="material-icons prefix tooltipped medium"  data-position="top" data-tooltip="Agregar">add</i></a>
            </div>
            <table class="centered striped responsive-table">
                <thead>
                <tr>
                    <th>Id de foto</th>
                    <th>Archivo</th>
                    <th>Proyecto</th>
                    <th colspan="3">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($work as $w)
                    <tr>
                        <td>{{$w->id_work}}</td>
                        <td class="materialboxed"><img src="{{env('APP_URL')}}/{{$w->archivo}}" width="50%;" class=" responsive-img"></td>
                        <td>{{$w->al}}</td>
                        <td> <a href="{{ URL::to('Works/Admin/'.$w->id_work).'/'.'edit' }}" class="btn-floating amber lighten-2 waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Editar">edit</i></a> </td>
                        <td>
                            {!! Form::open(['url' => ['Works/Admin',$w->id_work] , 'method' => 'DELETE']) !!}
                            <button href="#!" class="btn-floating deep-orange accent-4 waves-effect btn_eliminar"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Eliminar">delete</i></button>
                            {!! Form::close() !!}
                        </td>
                        @if($w->estado==2)
                            <td> <a href="#" class="btn-floating green waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Prioridad">check_box</i></a> </td>
                        @else
                            <td> <a href="{{ URL::to('Works/Admin/'.$w->id_work) }}" class="btn-floating green waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Prioridad">check_box_outline_blank</i></a> </td>
                        @endif
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