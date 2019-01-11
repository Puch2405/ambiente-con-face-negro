<div class="row">
    <div class="input-field col s12 m12 l12">
        {{Form::hidden('id_album',$dat->id_album)}}
        {{Form::textarea('descripcion',null, ['class'=>'materialize-textarea'])}}
        {{Form::label('descripcion','Descripcion')}}
    </div>
</div>
<a class="btn btn-large waves-effect waves-light red left" href="{{ URL::to('Fotos/Comun/'.$dat->id_album) }}">Cancelar</a>
{{Form::submit('Actualizar', ['class'=>'btn btn-large waves-effect waves-light green right'])}}