<div class="row">
    <div class="input-field col s12 m12 l12">
        {{Form::text('titulo',null, ['class'=>'validate','id'=>'titulo'])}}
        {{Form::label('titulo','Titulo del video')}}
    </div>
</div>

<div class="row">
    <div class="input-field col s12 m12 l12">
        {{Form::text('link',null, ['class'=>'validate','id'=>'link'])}}
        {{Form::label('link','Link del video')}}
    </div>
</div>

<div class="row">
    <div class="input-field col s6 m5 l5 xl5 offset-m1 offset-l1 offset-xl1">
        <a class="btn btn-large waves-effect waves-light red left" href="{{ URL::to('Videos/Admin') }}">Cancelar</a>
    </div>
    <div class="input-field col s6 m5 l5 xl5">
        {{Form::submit('Aceptar', ['class'=>'btn btn-large waves-effect waves-light green right'])}}
    </div>
</div>
