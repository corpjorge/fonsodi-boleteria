@extends('layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page" style="background: url('img/login/fondo_log.png')" >

    <div id="app">
      <img src="{{asset('img/login/encabezado_of_virt.jpg')}}" width="100%">
        <div class="login-box" style="margin: 2% auto;" >
            <div class="login-logo">
              <center>
                <img src="{{asset('img/login/icono_of_virt.png')}}" width="22%">
              </center>
            </div><!-- /.login-logo -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {{ trans('message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif

        @if(session()->has('message'))
    		 <div class="alert alert-danger alert-dismissible">
    							 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    							 {{session()->get('message')}}
    						 </div>
    		@endif

        <div class="login-box-body" style="border-radius: 10px;" >
        <p class="login-box-msg"> {{ trans('message.siginsession') }} </p>
        <form action="{{ url('/login') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input style="color:black" type="email" class="form-control" placeholder="{{ trans('message.email') }}" name="email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input style="color:black" type="password" class="form-control" placeholder="{{ trans('message.password') }}" name="password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> {{ trans('message.remember') }}
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('message.buttonsign') }}</button>
                </div><!-- /.col -->
            </div>
        </form>

        @include('auth.partials.social_login')

        <a href="{{ url('/password/reset') }}">{{ trans('message.forgotpassword') }}</a><br>


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
    </script>
    <img src="{{asset('img/login/pie_of_virt.png')}}" width="100%">
</body>

@endsection
