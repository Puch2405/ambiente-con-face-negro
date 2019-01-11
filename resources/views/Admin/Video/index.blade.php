@extends("Layouts.layout")

@section('Titulo')
    Videos
@endsection
@section('active_video')
    active
@endsection

@section('Seccion')
    <div class="col s12 m12 l8 offset-l2">
        <h4 class="Titulos center">Lista de videos</h4>
    </div>

    <div class="row">
        <div class="col s12 m12 l8 offset-l2">
            <div class="right">
                <a href="{{ URL::to('Videos/Admin/create') }}" class="btn-floating green accent-4 btn-large waves-effect"><i class="material-icons prefix tooltipped medium"  data-position="top" data-tooltip="Agregar">add</i></a>
            </div>
            <table class="highlight">
                <thead>
                <tr>
                    <th>ID Video</th>
                    <th>Titulo</th>
                    <th>URL</th>
                    <th colspan="2">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($videos as $video)
                    <tr>
                        <td>{{$video->id_video}}</td>
                        <td>{{$video->titulo}}</td>
                        <td><iframe src="{{$video->link}}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></td>
                        <td> <a href="{{ URL::to('Videos/Admin/'.$video->id_video).'/'.'edit' }}" class="btn-floating amber lighten-2 waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Editar">edit</i></a> </td>
                        <td>
                            {!! Form::open(['url' => ['Videos/Admin',$video->id_video] , 'method' => 'DELETE']) !!}
                            <button href="#!" class="btn-floating deep-orange accent-4 waves-effect btn_eliminar"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Eliminar">delete</i></button>
                            {!! Form::close() !!}
                        </td>
                        @if($video->estado==2)
                            <td> <a href="#" class="btn-floating green waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Prioridad">check_box</i></a> </td>
                        @else
                            <td> <a href="{{ URL::to('Videos/Admin/'.$video->id_video) }}" class="btn-floating green waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Prioridad">check_box_outline_blank</i></a> </td>
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