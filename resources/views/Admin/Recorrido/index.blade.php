@extends("Layouts.layout")

@section('Titulo')
    Recorrido Virtual
@endsection
@section('active_rec')
    active
@endsection

@section('Seccion')
    <div class="col s12 m12 l8 offset-l2">
        <h4 class="Titulos center">Recorridos Virtuales</h4>
    </div>

    <div class="row">
        <div class="col s12 m12 l8 offset-l2">
            <div class="right">
                <a href="{{URL::to('Recorridos/Admin/create')}}" class="btn-floating green accent-4 btn-large waves-effect"><i class="material-icons prefix tooltipped medium"  data-position="top" data-tooltip="Agregar Imagen 360°">local_see</i></a>
                <a href="{{URL::to('Recorrido/Admin/create')}}" class="btn-floating green accent-4 btn-large waves-effect"><i class="material-icons prefix tooltipped medium"  data-position="top" data-tooltip="Agregar Video 360°">videocam</i></a>
            </div>
            <table class="highlight">
                <thead>
                <tr>
                    <th>Id recorrido</th>
                    <th>Tipo de Contenido</th>
                    <th>Proyecto</th>
                    <th>Archivo</th>
                    <th colspan="2">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($recorrido as $recal)
                    <tr>
                        <td>{{$recal->id_recorridovirtual}}</td>
                        <td>{{$recal->tipo_content}}</td>
                        <td>{{$recal->proyecto}}</td>
                        @if($recal->tipo==1)
                            <td><script src="https://static.kuula.io/embed.js" data-kuula="{{$recal->archivo}}" data-width="100%" data-height="340px"></script></td>
                            <td> <a href="{{ URL::to('Recorridos/Admin/'.$recal->id_recorridovirtual).'/'.'edit' }}" class="btn-floating amber lighten-2 waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Editar">edit</i></a> </td>
                            <td>
                                {!! Form::open(['url' => ['Recorridos/Admin',$recal->id_recorridovirtual] , 'method' => 'DELETE']) !!}
                                <button href="#!" class="btn-floating deep-orange accent-4 waves-effect btn_eliminar"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Eliminar">delete</i></button>
                                {!! Form::close() !!}
                            </td>
                        @else
                            <td><iframe src="{{$recal->archivo}}" width="640" height="340" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></td>
                            <td> <a href="{{ URL::to('Recorrido/Admin/'.$recal->id_recorridovirtual).'/'.'edit' }}" class="btn-floating amber lighten-2 waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Editar">edit</i></a> </td>
                            <td>
                                {!! Form::open(['url' => ['Recorrido/Admin',$recal->id_recorridovirtual] , 'method' => 'DELETE']) !!}
                                <button href="#!" class="btn-floating deep-orange accent-4 waves-effect btn_eliminar"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Eliminar">delete</i></button>
                                {!! Form::close() !!}
                            </td>
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