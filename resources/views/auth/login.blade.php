@extends('Layouts.layout')

@section('Seccion')

<div class="container">
    <div class="row" >
        <div class="col s12 m6 l6 xl6 offset-m3 offset-l3 offset-xl3 " style="top: 9em;">
            <div class="card" >
                <div class="card-title center">Login</div>

                <div class="card-content row">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">


                            <div class="input-field col s12">
                                <i class="material-icons prefix">local_post_office</i>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                <label for="email" class="col-md-4 control-label">Correo Electronico</label>
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

                        <div class="col s12">
                            <p>
                                <input type="checkbox" id="test5" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                                <label for="test5">
                                    Recuerdame
                                </label>
                            </p>
                        </div>
                        <div class="input-field col s12">
                            <button type="submit" class="btn waves-effect waves-light green col s12">
                                Entrar
                            </button>
                        </div>


                        <div class="input-field col s12">
                            <div class="left">
                                <a style="color: red;" href="{{ route('password.request') }}">
                                    Olvidaste tu contraseña?
                                </a>
                            </div>

                            <div class="right">
                                <a href="{{ url('/auth/facebook') }}" class="waves-effect waves-light btn blue darken-3"><i class="icon-facebook2 center"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
