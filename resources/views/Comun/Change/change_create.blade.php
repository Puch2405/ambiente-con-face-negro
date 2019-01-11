<!--////////////////////////Modal de agregar alimento/////////////////-->
<div class="modal" id="modal_a">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">
                Cambiar Foto de Perfil
            </h4> <!-- se especifica el titulo del modal para diferenciarlos-->
        </div >
        <div class="modal-body">

            {!! Form::open(['url' => 'Change/Comun', 'files'=>true]) !!}

            @include('Comun.Change.partials.form')

            {!! Form::close() !!}

        </div>
    </div >
</div>

<script>
    $("#modal_a").modal();
    $("#modal_a").modal("open");
</script>