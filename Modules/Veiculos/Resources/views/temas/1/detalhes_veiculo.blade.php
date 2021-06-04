@extends('veiculos::temas.'.$siteId['tema'].'.app')
@section('content')

@include('veiculos::temas.1.breadcrumb',['dados' => ['Carros','Detalhes do veículo']])

<div class="section section-md-bottom content novi-background bg-cover">
    <div class="container">
        <div class="row row-fix">
            <div class="col-sm-12 col-md-9 column-content">
                <div class="gslider-wrapper">
                    <div id="carousel" class="flexslider" style="padding-bottom: 15px !important;">
                        <div class="flex-viewport" style="overflow: hidden; position: relative;">
                            <ul class="slides" style="width: 100% !important; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                @foreach( $carroSelecionado['pegaFotos'] as $key => $fotos )
                                <li style="width: 10% !important; height: 75px !important; overflow: hidden !important; margin-right: 13px; float: left; display: block; background-color: #fff !important;" {!! $key === 0 ? ' class="flex-active-slide"' : Null !!}>
                                    <img src="{!! verificaImagemSistem($fotos['imagem']) !!}" alt="" class="img-responsive" draggable="false">
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div id="gslider" class="flexslider">
                        <div class="flex-viewport" style="overflow: hidden; position: relative;">
                            <ul class="slides" style="width: 100% !important; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                @foreach( $carroSelecionado['pegaFotos'] as $key => $fotos )
                                <li style="width: 870px; margin-right: 0px; float: left; display: block;" {!! $key === 0 ? ' class="flex-active-slide"' : Null !!}>
                                    <img src="{!! verificaImagemSistem($fotos['imagem']) !!}" alt="" class="img-responsive" draggable="false">
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row row-fix">
                    <div class="col-sm-12">
                        <div class="title2">{!! trataTraducoes('Detalhes do veículo') !!}</div>
                        <div class="row">
                            <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Montadora') !!}</small>:<p>{!! $carroSelecionado['pegaMontadora'] !!}</p></li></ul></div>
                            <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Tipo') !!}</small>:<p>{!! $carroSelecionado['pegaTipo'] !!}</p></li></ul></div>
                            <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Câmbio') !!}</small>:<p>{!! $carroSelecionado['pegaCambio'] !!}</p></li></ul></div>
                            <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Cor') !!}</small>:<p>{!! $carroSelecionado['pegaCor'] !!}</p></li></ul></div>
                            <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Carroceria') !!}</small>:<p>{!! $carroSelecionado['pegaCarroceria'] !!}</p></li></ul></div>
                            <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Portas') !!}</small>:<p>{!! $carroSelecionado['pegaPorta'] !!}</p></li></ul></div>
                            <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Motorização') !!}</small>:<p>{!! $carroSelecionado['pegaMotorizacao'] !!}</p></li></ul></div>
                            <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Combustível') !!}</small>:<p>{!! $carroSelecionado['pegaCombustivel'] !!}</p></li></ul></div>
                            <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('KM') !!}</small>:<p>{!! $carroSelecionado['km'] !!}</p></li></ul></div>
                            <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Final da placa') !!}</small>:<p>{!! substr($carroSelecionado['placa'],-1) !!}</p></li></ul></div>
                            <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Ano') !!}</small>:<p>{!! $carroSelecionado['ano_veiculo'] !!}</p></li></ul></div>
                            <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Versão') !!}</small>:<p>{!! $carroSelecionado['versao'] !!}</p></li></ul></div>
                        </div>
                    </div>
                    <div class="col-sm-12">&nbsp;</div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 column-sidebar">
                <div class="row">
                    <div class="col-sm-6 col-md-12">
                        <div class="banner2-wrapper">
                            <div class="contact-banner">
                                <div class="top-info clearfix">
                                    <div class="info1">
                                        <div class="banner-title">{!! $carroSelecionado['nome'] !!}</div>
                                    </div>
                                </div>
                                <div class="txt3">{!! currencyToSystemDefaultBD($carroSelecionado['valor'],2,true) !!}</div>
                                <div class="txt4">{!! $siteId['name'] !!}</div>
                                <div class="txt5">
                                    {!! $siteId['quaisDados']['endereco'] !!}, {!! $siteId['quaisDados']['numero'] !!}
                                    <br>
                                    {!! $siteId['quaisDados']['bairro'] !!}
                                    <br>
                                    {!! $siteId['quaisDados']['cidade'] !!} / {!! $siteId['quaisDados']['estado'] !!}
                                </div>
                                <div class="form-wrapper">
                                    <div id="note2"></div>
                                    <div id="fields2">
                                        <div class="top-info clearfix"><div class="info1"><div class="info1">&nbsp;</div></div></div>
                                        <div class="top-info clearfix">
                                            <div class="info1">
                                                <div class="info1">
                                                    {!! $data['settings']['site_telefone'] !!}
                                                </div>
                                            </div>
                                        </div>
                                        @if(session('mensagem'))
                                        <div class="alert alert-success">
                                            {!! session('mensagem') !!}
                                        </div>
                                        @endif
                                        <div class="banner-title">{!! trataTraducoes('Envie-nos uma mensagem') !!}</div>
                                        <form name="formulario" id="formulario" action="/cars/details/{!! $carroSelecionado['hash_id'] !!}" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true">
                                            @csrf
                                            <div class="form-group form-wrap">
                                                <label for="inputNome">{!! trataTraducoes('Nome') !!}</label>
                                                <input type="text" class="form-control form-control-has-validation form-control-last-child" name="nome" placeholder="{!! trataTraducoes('Seu nome') !!}" required="required">
                                            </div>
                                            <div class="form-group form-wrap">
                                                <label for="inputEmail">{!! trataTraducoes('Email') !!}</label>
                                                <input type="email" class="form-control form-control-has-validation form-control-last-child" name="email" placeholder="{!! trataTraducoes('Endereço de email') !!}" required="required">
                                            </div>
                                            <div class="form-group form-wrap">
                                                <label for="inputEmail">{!! trataTraducoes('Telefone') !!}</label>
                                                <input type="text" class="form-control form-control-has-validation form-control-last-child" name="telefone" placeholder="{!! trataTraducoes('Telefone') !!}" required="required">
                                            </div>
                                            <div class="form-group form-wrap">
                                                <label for="inputMessage">{!! trataTraducoes('Mensagem') !!}</label>
                                                <textarea style="height: 300px !important;" class="form-control form-control-has-validation form-control-last-child" name="texto" rows="9" placeholder="{!! trataTraducoes('Mensagem') !!}" required="required"></textarea>
                                            </div>
                                            <div class="checkbox-inline">
                                                <label>
                                                    <input type="checkbox" class="checkbox-custom" name="copia_email" value="copia_email">
                                                    {!! trataTraducoes('Quero receber uma cópia desse email!') !!}
                                                </label>
                                            </div>
                                            <button type="submit" class="btn-default btn-cf-submit2" id="botaoEnviar" name="botaoEnviar">{!! trataTraducoes('Enviar mensagem') !!}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-12">
                        <div class="banner novi-background">
                            <figure>
                                <img src="images/banner.jpg" alt="" class="img-responsive">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">&nbsp;</div>

        <div class="row">
            <h3>{!! trataTraducoes('Últimos mais vistos') !!}</h3>
            <hr>
        </div>

        <div class="row">
            @foreach( veiculosMaisVistos() as $retornaCarros )
            @include('veiculos::temas.1.cars_box',compact('retornaCarros'))
            @endforeach
        </div>
    </div>
</div>

@endsection