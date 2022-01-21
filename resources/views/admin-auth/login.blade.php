@extends('layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page">
    <div id="app">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/admin_home') }}"><b>Administradores</b></a>
            </div><!-- /.login-logo -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> errores<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-box-body">
        <p class="login-box-msg"> Iniciar sesión </p>
        <form action="{{ url('/admin_login') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="email" name="email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback" style="margin-bottom: 1px">
                <input type="password" class="form-control" placeholder="password" name="password" id="password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <a style="font-size: 11px; cursor: pointer" onclick="seePass()">Ver contraseña</a><br>
            <div class="row" style="margin-top: 15px">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div><!-- /.col -->
            </div>
        </form>

{{--            <span class="glyphicon glyphicon-eye-open form-control-feedback" style="cursor: pointer"></span>--}}

        @include('admin-auth.partials.social_login')

        <a href="{{ url('/admin_password/reset') }}">Olvidaste tu contraseña</a><br>       

    </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->
    </div>
    @include('layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });

        function seePass() {
            let password = document.getElementById("password");
            if(password.type === 'password'){
                return password.attributes["type"].value = "text";
            }
            password.attributes["type"].value = "password";
        }
    </script>
</body>

@endsection
