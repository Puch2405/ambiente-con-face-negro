<div class="row">
    <div class="input-field col s12 m6 l6">
        {{Form::text('titulo',null, ['class'=>'validate','id'=>'titulo'])}}
        {{Form::label('titulo','Titulo del album')}}
    </div>
    <div class="file-field col s12 m6 l6">
        <div class="btn">
            <span>Foto de Album</span>
            {{Form::file('archivo')}}
        </div>
        <div class="file-path-wrapper">
            {{Form::text('ar',null,['class'=>'file-path'])}}
        </div>
    </div>
</div>

<div class="row">
    <div class="input-field col s12 m6 l6">
        {{Form::text('titulov',null, ['class'=>'validate','id'=>'titulov'])}}
        {{Form::label('titulov','Titulo del video')}}
    </div>
    <div class="input-field col s12 m6 l6">
        {{Form::text('link',null, ['class'=>'validate','id'=>'link'])}}
        {{Form::label('link','Link del video')}}
    </div>
</div>

<div class="row">
    <div class="input-field col s12 m12 l12">
        {{Form::textarea('descripcion',null, ['class'=>'materialize-textarea','id'=>'descripcion'])}}
        {{Form::label('descripcion','Descripcion')}}
    </div>
</div>

<div class="row">
    <div class="input-field col s12 m12 l12">
        {{Form::text('cordenada',null, ['class'=>'validate','id'=>'cordenada'])}}
        {{Form::label('cordenada','Ingrese la cordenada del trabajo')}}
    </div>
</div>

<div class="row">
    <div class="input-field col s6 m5 l5 xl5 offset-m1 offset-l1 offset-xl1">
        <a class="btn btn-large waves-effect waves-light red left" href="{{ URL::to('AlbumWork/Admin') }}">Cancelar</a>
    </div>
    <div class="input-field col s6 m5 l5 xl5">
        {{Form::submit('Aceptar', ['class'=>'btn btn-large waves-effect waves-light green right'])}}
    </div>
</div>
