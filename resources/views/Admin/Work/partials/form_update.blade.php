<div class="row">
    <div class="file-field col s12 m12 l12">
        <div class="btn">
            <span>Archivo</span>
            {{Form::file('archivo') }}
        </div>
        <div class="file-path-wrapper">
            {{Form::text('ar',null,['class'=>'file-path'])}}
        </div>
    </div>
</div>

<div class="row">
    <div class="input-field col s12 m12 l12">
        {{Form::select('id_workalbum',$albums,null)}}
        {{Form::label('id_workalbum','Album de seleccion')}}
    </div>
</div>

<div class="row">
    <div class="input-field col s6 m5 l5 xl5 offset-m1 offset-l1 offset-xl1">
        <a class="btn btn-large waves-effect waves-light red left" href="{{ URL::to('Works/Admin') }}">Cancelar</a>
    </div>
    <div class="input-field col s6 m5 l5 xl5">
        {{Form::submit('Aceptar', ['class'=>'btn btn-large waves-effect waves-light green right'])}}
    </div>
</div>
