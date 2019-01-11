@extends("Layouts.layout")

@section('Titulo')
    Acerca de
@endsection
@section('active_about')
    active
@endsection

@section('Seccion')
    <div class="col s12 m12 l8 offset-l2">
        <h4 class="Titulos center">Lista de Acerca de</h4>
    </div>

    <div class="row">
        <div class="col s12 m12 l8 offset-l2">
            <div class="right">
                <a href="{{ URL::to('Abouts/Admin/create') }}" class="btn-floating green accent-4 btn-large waves-effect"><i class="material-icons prefix tooltipped medium"  data-position="top" data-tooltip="Agregar">add</i></a>
            </div>
            <table class="centered striped responsive-table">
                <thead>
                <tr>
                    <th>Id About</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Archivo</th>
                    <th colspan="2">Acciones</th>
                </tr>
                </thead>
                <tbody id="content_table">
                @foreach($abouts as $ab)
                    <tr>
                        <td>{{$ab->id_about}}</td>
                        <td>{{$ab->nombre}}</td>
                        <td>{{$ab->descripcion}}</td>
                        <td class="materialboxed"><img src="{{env('APP_URL')}}/{{$ab->ar}}" width="50%;" class=" responsive-img"></td>
                        <td> <a href="{{ URL::to('Abouts/Admin/'.$ab->id_about).'/'.'edit' }}" class="btn-floating amber lighten-2 waves-effect"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Editar">edit</i></a> </td>
                        <td>
                            {!! Form::open(['url' => ['Abouts/Admin',$ab->id_about] , 'method' => 'DELETE']) !!}
                            <button href="#!" class="btn-floating deep-orange accent-4 waves-effect btn_eliminar"><i class="material-icons prefix tooltipped"  data-position="top" data-tooltip="Eliminar">delete</i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="Modal_confirm_deleteA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                    </h4> <!-- se especifica el titulo del modal para diferenciarlos-->
                </div >

                <div class="modal-body">
                    Seguro que desea eliminar el registro
                </div>

                <div class="modal-footer">
                    <input type="button" class="waves-effect waves-light btn modal-action modal-close red" data-dismiss="modal" value="Cerrar">
                    <input  type="button" class="btn blue" id="btn_confirm_deleteA" value="Aceptar">
                </div>
            </div >
        </div >
    </div >
    <script type="text/javascript">
        $(document).ready(function(){
            $('.tooltipped').tooltip();

            /*$("#content_table").on("click","button.btn_eliminar",function(){
                $("#Modal_confirm_deleteA").modal();
                $("#Modal_confirm_deleteA").modal('open');
                $("#btn_confirm_deleteA").data("id_about",$(this).data("id_about"));
            });

            /*$("#btn_confirm_deleteA").click(function(event){
                var id_categoria_a=$(this).data("id_categoria_a");
                var data_url=/eliminar/"+id_categoria_a;
                $.post(data_url,{},function(){
                    window.location.href="Categoria";
                });
            });*/
        });
    </script>
@endsection