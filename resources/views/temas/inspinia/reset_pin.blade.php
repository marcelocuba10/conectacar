@extends('temas.inspinia.layout_login')
@section('content')

<div class="passwordBox animated fadeInDown">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox-content">
                <div class="col-lg-12">
                    <form class="m-t" role="form" name="formulario" id="formulario" action="/reset_pin" method="post" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true">
                        @csrf
                        <h2 class="font-bold text-center">{!! trataTraducoes('confirma_troca_senha_pin') !!}</h2>
                        <div class="form-group">
                            {!! trataTraducoes('texto_para_confirmacao_de_troca_de_senha_pin') !!}
                        </div>

                        @include('temas.inspinia.mostra_erros')
                        <div class="form-group">
                            <input autofocus="autofocus" type="email" name="email" class="form-control" placeholder="{!! trataTraducoes('email') !!}" required="" value="{!! session('email') ? session('email') : '' !!}">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="{!! trataTraducoes('senha') !!}" required="">
                        </div>

                        <input type="hidden" name="hash" readonly="readonly" class="form-control" value="{!! $data['hash_confirma'] !!}">
                        <button type="submit" class="btn btn-primary block full-width m-b"> <i class="fa fa-check"> </i> {!! trataTraducoes('confirmar_troca_da_senha_pin') !!}</button>
                    </form>

                    <br>

                    <p class="text-center">
                        <form class="m-t" role="form" name="formulario" id="formulario" action="/reset_pin" method="post" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true">
                            @csrf
                            <input type="hidden" name="hash" readonly="readonly" class="form-control" value="{!! $data['hash_nega'] !!}">
                            <button type="submit" class="btn btn-link block full-width m-b text-danger"> <i class="fa fa-times"> </i> {!! trataTraducoes('nao_solicitei_a_troca_da_senha') !!}</button>
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection