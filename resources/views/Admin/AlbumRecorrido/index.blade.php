@extends("Layouts.layout")

@section('Titulo')
    Album Recorridos
@endsection
@section('active_album')
    active
@endsection

@section('Seccion')
    <div class="col s12 m12 l8 offset-l2">
        <h4 class="Titulos center">Recorridos Virtuales</h4>
    </div>

    <div class="row">
        <div class="col s12 m12 l8 offset-l2">
            <div class="right">
                <a href="{{URL::to('AlbumRecorrido/Admin/create')}}" class="btn-floating green accent-4 btn-large waves-effect"><i class="material-icons prefix tooltipped medium"  data-position="top" data-tooltip="Agregar">add</i></a>
            </div>
            <table class="centered striped responsive-table">
                <thead>
                <tr>
                    <th>Id album</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Archivo</th>
                    <th colspan="2">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($recorridoalbum as $recal)
                    <tr>
                        <td>{{$recal->id_recorridoalbum}}</td>
                        <td>{{$recal->titulo}}</td>
                        <td>{{$recal->descripcion}}</td>
                        <td class="materialboxed"><img src="{{env('APP_URL')}}/{{$recal->archivo}}" width="50%;" class=" responsive-img"></td>
                        <td> <a href="{{ URL::to('AlbumRecorrido/Admin/'.$recal->id_recorridoalbum).'/'.'edit' }}" class="btn-floating amber lighten-2 waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Editar">edit</i></a> </td>
                        <td>
                            {!! Form::open(['url' => ['AlbumRecorrido/Admin',$recal->id_recorridoalbum] , 'method' => 'DELETE']) !!}
                            <button href="#!" class="btn-floating deep-orange accent-4 waves-effect btn_eliminar"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Eliminar">delete</i></button>
                            {!! Form::close() !!}
                        </td>
                        @if($recal->estado==2)
                            <td> <a href="#" class="btn-floating green waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Prioridad">check_box</i></a> </td>
                        @else
                            <td> <a href="{{ URL::to('AlbumRecorrido/Admin/'.$recal->id_recorridoalbum) }}" class="btn-floating green waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Prioridad">check_box_outline_blank</i></a> </td>
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