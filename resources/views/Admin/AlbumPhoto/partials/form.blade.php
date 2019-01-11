<div class="row">
    <div class="input-field col s12 m12 l12">
        {{Form::text('Titulo',null, ['class'=>'validate','id'=>'Titulo'])}}
        {{Form::label('Titulo','Titulo del album')}}
    </div>
</div>

<div class="row">
    <div class="file-field col s12 m12 l12">
        <div class="btn">
            <span>Archivo</span>
            {{Form::file('archivo')}}
        </div>
        <div class="file-path-wrapper">
            {{Form::text('ar',null,['class'=>'file-path'])}}
        </div>
    </div>
</div>

<div class="row">
    <div class="input-field col s10 offset-s1">
        <a class="btn btn-large waves-effect waves-light red left" href="{{ URL::to('AlbumPhoto/Admin') }}">Cancelar</a>
        {{Form::submit('Aceptar', ['class'=>'btn btn-large waves-effect waves-light green right'])}}
    </div>
</div>