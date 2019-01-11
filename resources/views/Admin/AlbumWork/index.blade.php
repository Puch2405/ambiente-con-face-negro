@extends("Layouts.layout")

@section('Titulo')
    Album de Trabajos
@endsection
@section('active_work')
    active
@endsection

@section('Seccion')
    <div class="col s12 m12 l8 offset-l2">
        <h4 class="Titulos center">Album de proyectos</h4>
    </div>

    <div class="row">
        <div class="col s10 m10 l10 offset-l1 offset-m1 offset-s1 ">
            <div class="right">
                <a href="{{ URL::to('AlbumWork/Admin/create')}}" class="btn-floating green accent-4 btn-large waves-effect"><i class="material-icons prefix tooltipped medium"  data-position="top" data-tooltip="Agregar">add</i></a>
            </div>
            <table class="centered striped responsive-table">
                <thead>
                <tr>
                    <th>Id Album</th>
                    <th>Titulo del proyecto</th>
                    <th>Foto de portada</th>
                    <th>Titulo del video</th>
                    <th>Video</th>
                    <th>Descripcion del trabajo</th>
                    <th>Cordenada</th>
                    <th colspan="3">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($album as $al)
                    <tr>
                        <td><p align="justify">{{$al->id_workalbum}}</p></td>
                        <td><p align="justify">{{$al->titulo}}</p></td>
                        <td class="materialboxed"><img src="{{env('APP_URL')}}/{{$al->archivo}}" width="50%;" class=" responsive-img"></td>
                        <td><p align="justify">{{$al->titulov}}</p></td>
                        <td><p align="justify">{{$al->link}}</p></td>
                        <td><p align="justify">{{$al->descripcion}}</p></td>
                        <td>{{$al->cordenada}}</td>
                        <td> <a href="{{ URL::to('AlbumWork/Admin/'.$al->id_workalbum).'/'.'edit' }}" class="btn-floating amber lighten-2 waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Editar">edit</i></a> </td>
                        <td>
                            {!! Form::open(['url' => ['AlbumWork/Admin',$al->id_workalbum] , 'method' => 'DELETE']) !!}
                            <button href="#!" class="btn-floating deep-orange accent-4 waves-effect btn_eliminar"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Eliminar">delete</i></button>
                            {!! Form::close() !!}
                        </td>
                        @if($al->estado==2)
                            <td> <a href="#" class="btn-floating green waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Prioridad">check_box</i></a> </td>
                        @else
                            <td> <a href="{{ URL::to('AlbumWork/Admin/'.$al->id_workalbum) }}" class="btn-floating green waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Prioridad">check_box_outline_blank</i></a> </td>
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