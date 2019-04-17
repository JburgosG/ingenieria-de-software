@extends('layouts.login')
@section('content')

    <div class="row">
        <div class="col-lg-12 col-lg-offset-4">
            <div class="login-page">
                <div class="form">
                    <p id="profile-name" class="profile-name-card"></p>
                    <div id="form_remember_password" class="hide"></div>
                    <h2 class="title-login">Bienvenidos a Uni2</h2>
                    <form class="m-t text-left" method="post" role="form" action="{{ route('login') }}" id="form-login">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Correo Electronico" required>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                        </div>
                        <!--<p class="remember_password">
                            <a href="{{ route('password.request') }}" id="remember_password" class="pointer"> ¿Olvidaste tu contraseña?</a>
                        </p>-->
                        <button type="submit" class="btn btn-primary block full-width m-b">
                            <i class="fa fa-sign-in"></i> Ingresar
                        </button>
                    </form>
                    <p class="footer-login">
                        <small>&copy; Uni2 {{ date('Y') }}</small>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection