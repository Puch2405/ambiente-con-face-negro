<div class="row">
    <div class="input-field col s12 m12 l12">
        {{Form::hidden('id_workalbum',$dat->id_workalbum)}}
        {{Form::textarea('descripcion',null, ['class'=>'materialize-textarea'])}}
        {{Form::label('descripcion','Descripcion')}}
    </div>
</div>

    <a class="btn btn-large waves-effect waves-light red left" href="{{ URL::to('Trabajos/Comun/'.$dat->id_workalbum) }}">Cancelar</a>
    {{Form::submit('Actualizar', ['class'=>'btn btn-large waves-effect waves-light green right'])}}
