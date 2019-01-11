<div class="row">
    <div class="input-field col s12 m12 l12">
        {{Form::hidden('id_usuario',auth()->user()->id) }}
        {{Form::hidden('id_album',$id)}}
        {{Form::textarea('descripcion',null, ['class'=>'materialize-textarea'])}}
        {{Form::label('descripcion','Descripcion')}}
    </div>
</div>
{{Form::submit('Nuevo Comentario', ['class'=>'btn btn-large waves-effect waves-light green right'])}}