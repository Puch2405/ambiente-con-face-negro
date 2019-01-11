@extends('layouts.layout')

@section('Seccion')
<div class="container">
    <div class="row">
        <div class="col m6 offset-m3" style="position: relative; top: 9em;">
            <div class="card">
                <div class="card-title center">Resetear Contraseña</div>

                <div class="card-content">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">local_post_office</i>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <label for="email" class="col-md-4 control-label">Direccion de Correo Electronico</label>
                            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn waves-effect waves-light green">
                                    Enviar link de reseteo de contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
