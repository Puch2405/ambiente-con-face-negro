<div class="row">
    <div class="input-field col s12 m12 l12">
        {{Form::text('titulo',null, ['class'=>'validate,','id'=>'titulo'])}}
        {{Form::label('titulo','Titulo de la foto')}}
    </div>
</div>

<div class="row">
    <div class="input-field col s12 m12 l12">
        {{Form::textarea('descripcion',null, ['class'=>'materialize-textarea','id'=>'descripcion'])}}
        {{Form::label('descripcion','Descripcion')}}
    </div>
</div>

<div class="row">
    <div class="file-field col s6 m6 l6">
        <div class="btn">
            <span>Archivo</span>
            {{Form::file('archivo')}}
        </div>
        <div class="file-path-wrapper">
            {{Form::text('ar',null,['class'=>'file-path'])}}
        </div>
    </div>

    <div class="input-field col s6 m6 l6">
        {{Form::select('id_album',$albums,null)}}
        {{Form::label('id_album','Album de seleccion')}}
    </div>
</div>

<div class="row">
    <div class="input-field col s10 offset-s1">
        <a class="btn btn-large waves-effect waves-light red left" href="{{ URL::to('Photos/Admin') }}">Cancelar</a>
        {{Form::submit('Aceptar', ['class'=>'btn btn-large waves-effect waves-light green right'])}}
    </div>
</div>