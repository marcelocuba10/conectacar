@extends('temas.inspinia.layout_login')
@section('content')
<div class="passwordBox animated fadeInDown">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox-content">
                <h2 class="font-bold">{!! trataTraducoes('Esqueci minha senha') !!}</h2>
                <p>{!! trataTraducoes('Informe seu email de cadastro para receber um link para troca de sua senha') !!}</p>
                @include('temas.inspinia.mostra_erros')
                <div class="row">
                    <div class="col-lg-12">
                        <form class="m-t" role="form" action="/forgot_password" method="post">
                        @csrf
                            <div class="form-group">
                                <input autofocus="autofocus" type="email" class="form-control" placeholder="{!! trataTraducoes('Seu email') !!}" required="" name="email">
                            </div>
                            <button type="submit" class="btn btn-primary block full-width m-b">{!! trataTraducoes('Recuperar minha senha') !!}</button>
                        </form>
                    </div>
                    <div class="col-lg-12"><a href="/login">{!! trataTraducoes('Já recuperei minha senha') !!}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection