@extends('temas.inspinia.layout_login')
@section('content')

<?php
$idiomas = pegaIdiomasDisponiveis();
?>

<div class="passwordBox animated fadeInDown">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox-content">
                <div class="col-lg-12">
                    <h3>{!! trataTraducoes('Novo cadastro') !!}</h3>
                    <p>{!! trataTraducoes('Informe os campos abaixo para realizar seu cadastro') !!}</p>

                    @include('temas.inspinia.mostra_erros')

                    <form class="m-t" role="form" name="formulario" id="formulario" action="/register" method="post" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true">
                        @csrf
                        <div class="form-group">
                            <input type="nome" name="nome" class="form-control" placeholder="{!! trataTraducoes('Nome') !!}" required="required">
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="{!! trataTraducoes('Email') !!}" required="">
                        </div>
                        
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="{!! trataTraducoes('Senha') !!}" required="">
                        </div>

                        <div class="form-group">
                            @if( count($idiomas) > 1 )
                            <select class="form-control" name="idioma" id="idioma" required="">
                                <option selected="selected" value="">{!! trataTraducoes('Selecione um idioma') !!}</option>
                                @foreach( $idiomas as $key => $idioma )
                                <option value="{!! $idioma['sigla'] !!}">{!! $idioma['titulo'] !!}</option>
                                @endforeach
                            </select>
                            @else
                            <input type="hidden" name="idioma" id="idioma" value="PT-BR">
                            @endif
                        </div>
                        
                        @if( !empty($hash) )
                        <div class="form-group">
                            <input type="text" name="hash" readonly="readonly" class="form-control" value="{!! $hash !!}">
                        </div>
                        @endif
                        <div class="form-group">
                            <div class="checkbox i-checks">
                                <label>
                                    <input required="required" name="termos" type="checkbox">
                                </label>
                                <a href="/terms_and_conditions" target="_blank">{!! trataTraducoes('Aceito os termos de condição e uso') !!}</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">{!! trataTraducoes('Registrar') !!}</button>

                        <p class="text-muted text-center"><small>{!! trataTraducoes('Já possue uma conta?') !!}</small></p>
                        <a class="btn btn-sm btn-white btn-block" href="/login"> <i class="fa fa-sign-in"> </i> {!! trataTraducoes('Entrar') !!}</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection