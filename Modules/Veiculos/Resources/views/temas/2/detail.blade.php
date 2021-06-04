@extends('veiculos::temas.2.app')

@section('content')

<!--==============================header=================================-->
@include('veiculos::temas.2.menu')	

<!--=======content================================-->

<script src="/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script>
<link href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700%7COpen+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet" type="text/css">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link href="/temas/2/css/jquery-ui.css" rel="stylesheet">
<link href="/temas/2/css/bootstrap.css" rel="stylesheet">
<link href="/temas/2/css/font-awesome.css" rel="stylesheet">
<link href="/temas/2/css/elegant-icons.css" rel="stylesheet">
<link href="/temas/2/css/light-gallery.css" rel="stylesheet">
<link href="/temas/2/css/gflexslider.css" rel="stylesheet">
<link href="/temas/2/css/superslides.css" rel="stylesheet">
<link href="/temas/2/css/animate.css" rel="stylesheet">
<link href="/temas/2/css/select2.css" rel="stylesheet">
<link href="/temas/2/css/style.css" rel="stylesheet">
<script src="/temas/2/js/jquery.js"></script>
<script src="/temas/2/js/jquery-ui.js"></script>
<script src="/temas/2/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/temas/2/js/jquery.easing.1.3.js"></script>
<script src="/temas/2/js/pointer-events.js"></script>
<script src="/temas/2/js/superfish.js"></script>
<script src="/temas/2/js/jquery.flexslider-min.js"></script>
<script src="/temas/2/js/select2.js"></script>
<script src="/temas/2/js/jquery.superslides.js"></script>

<script src="/temas/2/js/jquery.sticky.js"></script>
<script src="/temas/2/js/jquery.appear.js"></script>
<script src="/temas/2/js/jquery.ui.totop.js"></script>
<script src="/temas/2/js/jquery.caroufredsel.js"></script>
<script src="/temas/2/js/jquery.touchSwipe.min.js"></script>
<script src="/temas/2/js/material-parallax.js"></script>
<script src="/temas/2/js/rd-navbar.js"></script>
<script src="/temas/2/js/light-gallery.js"></script>
<script src="/temas/2/js/rd-mailform.js"></script>
<script src="/temas/2/js/scripts.js"></script>

<body class="not-front page-details">
<div id="main">
  <div class="section top4-wrapper novi-background">
    <div class="container">
      <div class="top4"></div>
    </div>
  </div>

  <div style="margin-top: 30px" class="section section-md-bottom content novi-background bg-cover">
    <div class="container">
      <div class="row row-fix">
        <div class="col-sm-12 col-md-9 column-content">
          <div class="gslider-wrapper">
            <div id="gslider" class="flexslider">
              <ul class="slides">
                <li>
                  <img src="{!! verificaImagemSistem("image") !!}" alt="" class="img-responsive">
                </li>
                <li>
                  <img src="{!! verificaImagemSistem("image") !!}" alt="" class="img-responsive">
                </li>
                <li>
                  <img src="{!! verificaImagemSistem("image") !!}" alt="" class="img-responsive">
                </li>
              </ul>
            </div>
            <div id="carousel" class="flexslider">
              <ul class="slides">
                <li>
                  <img src="{!! verificaImagemSistem("image") !!}" alt="" class="img-responsive">
                </li>
                <li>
                  <img src="{!! verificaImagemSistem("image") !!}" alt="" class="img-responsive">
                </li>
                <li>
                  <img src="{!! verificaImagemSistem("image") !!}" alt="" class="img-responsive">
                </li>
              </ul>
            </div>
          </div>
          <div class="row row-fix">
            <div class="col-sm-12">
              <div class="title2">{!! trataTraducoes('Detalhes do veículo') !!}</div>
              <div class="row">
                <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Montadora') !!}</small>:<p>{!! !empty($carroSelecionado['pegaMontadora']) ? $carroSelecionado['pegaMontadora'] : 'pegaMontadora' !!}</p></li></ul></div>
                <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Tipo') !!}</small>:<p>{!! !empty($carroSelecionado['pegaTipo']) ? $carroSelecionado['pegaTipo'] : 'pegaTipo' !!}</p></li></ul></div>
                <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Câmbio') !!}</small>:<p>{!! !empty($carroSelecionado['pegaCambio']) ? $carroSelecionado['pegaCambio'] : 'pegaCambio' !!}</p></li></ul></div>
                <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Cor') !!}</small>:<p>{!! !empty($carroSelecionado['pegaCor']) ? $carroSelecionado['pegaCor'] : 'pegaCor' !!}</p></li></ul></div>
                <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Carroceria') !!}</small>:<p>{!! !empty($carroSelecionado['pegaCarroceria']) ? $carroSelecionado['pegaCarroceria'] : 'pegaCarroceria' !!}</p></li></ul></div>
                <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Portas') !!}</small>:<p>{!! !empty($carroSelecionado['pegaPorta']) ? $carroSelecionado['pegaPorta'] : 'pegaPorta' !!}</p></li></ul></div>
                <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Motorização') !!}</small>:<p>{!! !empty($carroSelecionado['pegaMotorizacao']) ? $carroSelecionado['pegaMotorizacao'] : 'pegaMotorizacao' !!}</p></li></ul></div>
                <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Combustível') !!}</small>:<p>{!! !empty($carroSelecionado['pegaCombustivel']) ? $carroSelecionado['pegaCombustivel'] : 'pegaCombustivel' !!}</p></li></ul></div>
                <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('KM') !!}</small>:<p>{!! !empty($carroSelecionado['km']) ? $carroSelecionado['km'] : 'km' !!}</p></li></ul></div>
                <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Final da placa') !!}</small>:<p>{!! substr(!empty($carroSelecionado['placa']) ? $carroSelecionado['placa'] : null ,-1) !!}</p></li></ul></div>
                <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Ano') !!}</small>:<p>{!! !empty($carroSelecionado['ano_veiculo']) ? $carroSelecionado['ano_veiculo'] : 'ano_veiculo' !!}</p></li></ul></div>
                <div class="col-sm-3"><ul class="ul3"><li style="list-style: 1"><small>{!! trataTraducoes('Versão') !!}</small>:<p>{!! !empty($carroSelecionado['versao']) ? $carroSelecionado['versao'] : 'versao' !!}</p></li></ul></div>
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
                          <div class="txt3" style="background: #393734 !important">{!! currencyToSystemDefaultBD(!empty($carroSelecionado['valor']) ? $carroSelecionado['valor'] : null ,2,true) !!}</div>
                          <div class="txt4">{!! !empty($siteId['name']) ? $siteId['name'] : 'siteId_name' !!}</div>
                          <div class="txt5">
                              {!! !empty($siteId['quaisDados']['endereco']) ? $siteId['quaisDados']['endereco'] : 'endereco'  !!}, {!! !empty($siteId['quaisDados']['numero']) ? $siteId['quaisDados']['numero'] : 'numero' !!}
                              <br>
                              {!! !empty($siteId['quaisDados']['bairro']) ? $siteId['quaisDados']['bairro'] : 'bairro'!!}
                              <br>
                              {!! !empty($siteId['quaisDados']['cidade']) ? $siteId['quaisDados']['cidade'] : 'bairro'!!} / {!! !empty($siteId['quaisDados']['estado']) ? $siteId['quaisDados']['estado'] : 'estado' !!}
                          </div>
                          <div class="form-wrapper">
                              <div id="note2"></div>
                              <div id="fields2">
                                  <div class="top-info clearfix"><div class="info1"><div class="info1">&nbsp;</div></div></div>
                                  <div class="top-info clearfix">
                                      <div class="info1">
                                          <div class="info1">
                                              {!! !empty($data['settings']['site_telefone']) ? $data['settings']['site_telefone'] : 'site_telefone'!!}
                                          </div>
                                      </div>
                                  </div>
                                  @if(session('mensagem'))
                                  <div class="alert alert-success">
                                      {!! session('mensagem') !!}
                                  </div>
                                  @endif
                                  <div class="banner-title">{!! trataTraducoes('Envie-nos uma mensagem') !!}</div>
                                  <form name="formulario" id="formulario" action="/cars/details/{!! !empty($carroSelecionado['hash_id']) ? $carroSelecionado['hash_id'] : null !!}" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true">
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
                                          <textarea style="height: 300px !important" class="form-control form-control-has-validation form-control-last-child" name="texto" rows="9" placeholder="{!! trataTraducoes('Mensagem') !!}" required="required"></textarea>
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
                          <img src="{!! verificaImagemSistem("image") !!}" alt="banner" class="img-responsive">
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
        @include('veiculos::temas.2.cars_box')
        @include('veiculos::temas.2.cars_box')
        @include('veiculos::temas.2.cars_box')
      </div>

    </div>
  </div>
</div>

<div class="snackbars" id="form-output-global"></div>
<script src="/temas/2/js/bootstrap.min.js"></script>
<!-- Google Tag Manager --><noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-P9FT69" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager --></body>

@endsection