@extends('veiculos::temas.5.app')
@section('content')

<link href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700%7COpen+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet" type="text/css">
<link href="/temas/detail/css/jquery-ui.css" rel="stylesheet">
<link href="/temas/detail/css/bootstrap.css" rel="stylesheet">

<link href="/temas/detail/css/elegant-icons.css" rel="stylesheet">
<link href="/temas/detail/css/light-gallery.css" rel="stylesheet">
<link href="/temas/detail/css/gflexslider.css" rel="stylesheet">
<link href="/temas/detail/css/superslides.css" rel="stylesheet">
<link href="/temas/detail/css/animate.css" rel="stylesheet">
<link href="/temas/detail/css/select2.css" rel="stylesheet">

<link href="/temas/5/css/custom-detail.css" rel="stylesheet">

<script src="/temas/detail/js/jquery.js"></script>
<script src="/temas/detail/js/jquery-ui.js"></script>
<script src="/temas/detail/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/temas/detail/js/jquery.easing.1.3.js"></script>
<script src="/temas/detail/js/pointer-events.js"></script>
<script src="/temas/detail/js/superfish.js"></script>
<script src="/temas/detail/js/jquery.flexslider-min.js"></script>
<script src="/temas/detail/js/select2.js"></script>
<script src="/temas/detail/js/jquery.superslides.js"></script>

<script src="/temas/detail/js/jquery.sticky.js"></script>
<script src="/temas/detail/js/jquery.appear.js"></script>
<script src="/temas/detail/js/jquery.ui.totop.js"></script>
<script src="/temas/detail/js/jquery.caroufredsel.js"></script>
<script src="/temas/detail/js/jquery.touchSwipe.min.js"></script>
<script src="/temas/detail/js/material-parallax.js"></script>
<script src="/temas/detail/js/rd-navbar.js"></script>
<script src="/temas/detail/js/light-gallery.js"></script>
<script src="/temas/detail/js/rd-mailform.js"></script>


<body class="not-front page-details">
    <div id="main">
        <div class="section top4-wrapper novi-background">
            <div class="container">
                <div class="top4"></div>
            </div>
        </div>

        <div style="margin-top: 30px;" class="section content novi-background bg-cover">
            <div class="container">
                <div class="row row-fix">
                    <div class="col-sm-12 col-md-9 column-content">

                        <section class="main-slider main-slider-home-3"> 
                            <div class="slick-slider carousel-parent" data-arrows="true" data-loop="true" data-autoplay="true" data-dots="true" data-swipe="true" data-items="1">
                                @foreach( $carroSelecionado['pegaFotos'] as $key => $fotos )
                                    <div class="item">
                                        <img src="{!! verificaImagemSistem($fotos['imagem']) !!}" alt="" class="img-responsive" draggable="false">
                                    </div>
                                @endforeach
                            </div>
                        </section>

                        <div id="second-tab-group" class="tabgroup">
                            <div id="tabs3-2" style="display: block;">
                              <div class="row row-fix">
                                <div class="col-sm-12">
                                  <div class="title2">{!! trataTraducoes('DETALHES DO VEÍCULO') !!}</div>
                                  <div class="row" style="text-align: initial;">
                                    <div class="col-sm-3">
                                      <ul class="ul3">
                                        <li style="list-style: 1"><strong>{!! trataTraducoes('Montadora') !!}:</strong><p>{!! !empty($carroSelecionado['pegaMontadora']) ? $carroSelecionado['pegaMontadora'] : 'pegaMontadora' !!}</p></li>
                                      </ul>
                                    </div>
                                    <div class="col-sm-3">
                                      <ul class="ul3">
                                        <li style="list-style: 1"><strong>{!! trataTraducoes('Tipo') !!}:</strong><p>{!! !empty($carroSelecionado['pegaTipo']) ? $carroSelecionado['pegaTipo'] : 'pegaTipo' !!}</p></li>
                                      </ul>
                                    </div>
                                    <div class="col-sm-3">
                                      <ul class="ul3">
                                        <li style="list-style: 1"><strong>{!! trataTraducoes('Câmbio') !!}:</strong><p>{!! !empty($carroSelecionado['pegaCambio']) ? $carroSelecionado['pegaCambio'] : 'pegaCambio' !!}</p></li>
                                      </ul>
                                    </div>
                                    <div class="col-sm-3">
                                      <ul class="ul3">
                                        <li style="list-style: 1"><strong>{!! trataTraducoes('Cor') !!}:</strong><p>{!! !empty($carroSelecionado['pegaCor']) ? $carroSelecionado['pegaCor'] : 'pegaCor' !!}</p></li>
                                      </ul>
                                    </div>
                                    <div class="col-sm-3">
                                      <ul class="ul3">
                                        <li style="list-style: 1"><strong>{!! trataTraducoes('Carroceria') !!}:</strong><p>{!! !empty($carroSelecionado['pegaCarroceria']) ? $carroSelecionado['pegaCarroceria'] : 'pegaCarroceria' !!}</p></li>
                                      </ul>
                                    </div>
                                    <div class="col-sm-3">
                                      <ul class="ul3">
                                        <li style="list-style: 1"><strong>{!! trataTraducoes('Portas') !!}:</strong><p>{!! !empty($carroSelecionado['pegaPorta']) ? $carroSelecionado['pegaPorta'] : 'pegaPorta' !!}</p></li>
                                      </ul>
                                    </div>
                                    <div class="col-sm-3">
                                      <ul class="ul3">
                                        <li style="list-style: 1"><strong>{!! trataTraducoes('Motorização') !!}:</strong><p>{!! !empty($carroSelecionado['pegaMotorizacao']) ? $carroSelecionado['pegaMotorizacao'] : 'pegaMotorizacao' !!}</p></li>
                                      </ul>
                                    </div>
                                    <div class="col-sm-3">
                                      <ul class="ul3">
                                        <li style="list-style: 1"><strong>{!! trataTraducoes('Combustível') !!}:</strong><p>{!!!empty($carroSelecionado['pegaCombustivel']) ? $carroSelecionado['pegaCombustivel'] : 'pegaCombustivel' !!}</p></li>
                                      </ul>
                                    </div>
                                    <div class="col-sm-3">
                                      <ul class="ul3">
                                        <li style="list-style: 1"><strong>{!! trataTraducoes('KM') !!}:</strong><p>{!! !empty($carroSelecionado['km']) ? $carroSelecionado['km'] : 'km' !!}</p></li>
                                      </ul>
                                    </div>
                                    <div class="col-sm-3">
                                      <ul class="ul3">
                                        <li style="list-style: 1"><strong>{!! trataTraducoes('Final da placa') !!}:</strong><p>{!! substr(!empty($carroSelecionado['placa']) ? $carroSelecionado['placa'] : null ,-1) !!}</p></li>
                                      </ul>
                                    </div>
                                    <div class="col-sm-3">
                                      <ul class="ul3">
                                        <li style="list-style: 1"><strong>{!! trataTraducoes('Ano') !!}:</strong><p>{!! !empty($carroSelecionado['ano_veiculo']) ? $carroSelecionado['ano_veiculo'] : 'ano_veiculo' !!}</p></li>
                                      </ul>
                                    </div>
                                    <div class="col-sm-3">
                                      <ul class="ul3">
                                        <li style="list-style: 1"><strong>{!! trataTraducoes('Versão') !!}:</strong><p>{!! !empty($carroSelecionado['versao']) ? $carroSelecionado['versao'] : 'versao' !!}</p></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 column-sidebar">
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <div class="banner2-wrapper">
                                    <div class="contact-banner">
                                        <div class="top-info clearfix">
                                            <div class="info1">
                                                <div class="banner-title">{!! !empty($carroSelecionado['nome']) ? $carroSelecionado['nome'] : 'nome' !!}</div>
                                            </div>
                                        </div>
                                        <div class="txt3" style="background: #393734 !important">{!! currencyToSystemDefaultBD(!empty($carroSelecionado['valor']) ? $carroSelecionado['valor'] : null,2,true) !!}</div>
                                        <div class="txt4">{!! !empty($siteId['name']) ? $siteId['name'] : trataTraducoes('site_name')!!}</div>
                                        <div class="txt5">
                                          {!! !empty($siteId['quaisDados']['endereco']) ? $siteId['quaisDados']['endereco'] : trataTraducoes('site_endereco')!!}
                                          <br>
                                          {!! !empty($siteId['email']) ? $siteId['email'] : trataTraducoes('site_email')!!}
                                        </div>
                                        <div class="form-wrapper">
                                            <div id="note2"></div>
                                            <div id="fields2">
                                                <div class="top-info clearfix">
                                                    <div class="info1">
                                                        <div class="info1">&nbsp;</div>
                                                    </div>
                                                </div>
                                                <div class="top-info clearfix">
                                                    <div class="txt4">
                                                      {!! !empty($siteId['quaisDados']['fone_1']) ? $siteId['quaisDados']['fone_1'] : 'site_telefone'!!}
                                                    </div>
                                                </div>
                                                @if(session('mensagem'))
                                                    <div class="alert alert-success">
                                                        {!! session('mensagem') !!}
                                                    </div>
                                                @endif
                                                <div class="banner-title" style="margin-bottom: 10px;">{!! trataTraducoes('Envie-nos uma mensagem') !!}</div>
                                                <form name="formulario" id="formulario"
                                                    action="/cars/details/{!! !empty($carroSelecionado['hash_id']) ? $carroSelecionado['hash_id'] : null !!}"
                                                    method="post" enctype="multipart/form-data"
                                                    onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true">
                                                    @csrf
                                                    <div class="form-group form-wrap">
                                                        <label for="inputNome">{!! trataTraducoes('Nome') !!}</label>
                                                        <input type="text"
                                                            class="form-control form-control-has-validation form-control-last-child"
                                                            name="nome" placeholder="{!! trataTraducoes('Seu nome') !!}"
                                                            required="required">
                                                    </div>
                                                    <div class="form-group form-wrap">
                                                        <label for="inputEmail">{!! trataTraducoes('Email') !!}</label>
                                                        <input type="email"
                                                            class="form-control form-control-has-validation form-control-last-child"
                                                            name="email"
                                                            placeholder="{!! trataTraducoes('Endereço de email') !!}"
                                                            required="required">
                                                    </div>
                                                    <div class="form-group form-wrap">
                                                        <label for="inputEmail">{!! trataTraducoes('Telefone')!!}</label>
                                                        <input type="text"
                                                            class="form-control form-control-has-validation form-control-last-child"
                                                            name="telefone"
                                                            placeholder="{!! trataTraducoes('Telefone') !!}"
                                                            required="required">
                                                    </div>
                                                    <div class="form-group form-wrap">
                                                        <label for="inputMessage">{!! trataTraducoes('Mensagem') !!}</label>
                                                        <textarea style="height: 300px !important;"
                                                            class="form-control form-control-has-validation form-control-last-child"
                                                            name="texto" rows="9"
                                                            placeholder="{!! trataTraducoes('Mensagem') !!}"
                                                            required="required"></textarea>
                                                    </div>
                                                    <div class="checkbox-inline">
                                                        <label>
                                                            <input type="checkbox" class="checkbox-custom"
                                                                name="copia_email" value="copia_email">
                                                            {!! trataTraducoes('Quero receber uma cópia desse email!') !!}
                                                        </label>
                                                    </div>
                                                    <button type="submit" class="button button-primary button-circle"
                                                        id="botaoEnviar" name="botaoEnviar">{!! trataTraducoes('Enviar mensagem') !!}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">&nbsp;</div>
            </div>
        </div>
    </div>

    <div class="snackbars" id="form-output-global"></div>
    <script src="/temas/detail/js/bootstrap.min.js"></script>

    <section>
        <div class="quote-default" style="text-align: -webkit-center;"><div class="divider" style="width: 45%;"></div></div>
        <div class="block-xl">
            <h3>{!! trataTraducoes('ULTIMOS MAS VISTOS') !!}</h3>
        </div>
        <div class="row no-gutters" data-lightgallery="group"> 
            @forelse( retornaCarros() as $key => $retornaCarros )
                <div class="col-sm-6 col-lg-3">
                    @include('veiculos::temas.5.box_cars',compact('retornaCarros'))
                </div>
                @empty
                    <div class="alert-cars" role="alert">
                        {!! trataTraducoes('Sem veículos no momento') !!}
                    </div>
            @endforelse 
        </div>
    </section>

@endsection