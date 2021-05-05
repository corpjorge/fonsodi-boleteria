@extends('layouts.errors')

@section('htmlheader_title')
    {{ trans('message.pagenotfound') }}
@endsection

@section('main-content')

    <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Pagina no encontrada.</h3>
            <p>Verifica la dirección URL ingresada </p>             
        </div><!-- /.error-content -->
    </div><!-- /.error-page -->
@endsection