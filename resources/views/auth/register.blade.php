@extends('Layouts.layout')

@section('Seccion')
<div class="container">
    <div class="row">
        <div class="col s12 m6 offset-m3" style="top: 9em;">
            <div class="card">
                <div class="card-title center">Registro</div>

                <div class="card-content row">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">person</i>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                <label for="name" class="col-md-4 control-label">Nombre</label>
                            @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">local_post_office</i>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <label for="email" class="col-md-4 control-label">E-Mail</label>
                            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock</i>
                                <input id="password" type="password" class="form-control" name="password" required>
                                <label for="password" class="col-md-4 control-label">Contraseña</label>
                            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">reply</i>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <label for="password-confirm" class="col-md-4 control-label">Confirma contraseña</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-field col s12">
                                <div class="row">
                                    <button type="submit" class="waves-effect waves-light btn green left col s5 offset-s1">
                                        Registrar
                                    </button>
                                    <a href="{{ url('/auth/facebook') }}" class="waves-effect waves-light btn blue darken-3 right col s5"><i class="icon-facebook2 left"></i> Iniciar Sesion con Facebook</a>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
