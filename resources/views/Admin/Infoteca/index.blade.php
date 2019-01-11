@extends("Layouts.layout")

@section('Titulo')
    Infoteca
@endsection
@section('active_info')
    active
@endsection

@section('Seccion')
    <div class="col s12 m12 l8 offset-l2">
        <h4 class="Titulos center">Infoteca</h4>
    </div>

    <div class="row">
        <div class="col s12 m12 l8 offset-l2">
            <div class="right">
                <a href="{{URL::to('Infoteca/Admin/create')}}" class="btn-floating green accent-4 btn-large waves-effect"><i class="material-icons prefix tooltipped medium"  data-position="top" data-tooltip="Agregar">add</i></a>
            </div>
            <table class="highlight">
                <thead>
                <tr>
                    <th>Id Infoteca</th>
                    <th>Titulo</th>
                    <th>Proyecto</th>
                    <th>Pdf</th>
                    <th colspan="2">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($infoteca as $info)
                    <tr>
                        <td>{{$info->id_infoteca}}</td>
                        <td>{{$info->titulo}}</td>
                        <td>{{$info->tituloal}}</td>
                        <td><a href="{{ asset($info->archivo)}}" target="_blank" class="btn-floating green waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Vizualizar Pdf">picture_as_pdf</i></a></td>
                        <td> <a href="{{ URL::to('Infoteca/Admin/'.$info->id_infoteca).'/'.'edit' }}" class="btn-floating amber lighten-2 waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Editar">edit</i></a> </td>
                        <td>
                            {!! Form::open(['url' => ['Infoteca/Admin',$info->id_infoteca] , 'method' => 'DELETE']) !!}
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