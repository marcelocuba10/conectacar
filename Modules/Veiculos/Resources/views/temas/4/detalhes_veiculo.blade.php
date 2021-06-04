@extends('veiculos::temas.4.app')
@section('content')

  <link href="/temas/detail/css/jquery-ui.css" rel="stylesheet">
  <link href="/temas/detail/css/bootstrap.css" rel="stylesheet">
  <link href="/temas/detail/css/light-gallery.css" rel="stylesheet">
  <link href="/temas/detail/css/gflexslider.css" rel="stylesheet">
  <link href="/temas/detail/css/superslides.css" rel="stylesheet">
  <link href="/temas/detail/css/animate.css" rel="stylesheet">
  <link href="/temas/detail/css/select2.css" rel="stylesheet">

  <link href="/temas/4/css/style-detail.css" rel="stylesheet">
  <link href="/temas/4/css/custom-slider.css" rel="stylesheet">
  <link href="/temas/4/css/custom-detail.css" rel="stylesheet">

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


</head>
<body class="not-front page-details">

<div id="main">

<br>
  <div class="section section-md-bottom content novi-background bg-cover">
    <div class="container">
      <div class="row row-fix">
        <div class="col-sm-12 col-md-9 column-content">
              
          <div class="product-slider">
            <div id="carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                @foreach( $carroSelecionado['pegaFotos'] as $key => $fotos )
                  <div class="item {{ $loop->first ? 'active' : '' }}" >
                      <img src="{!! verificaImagemSistem($fotos['imagem']) !!}" alt="">
                  </div>
                @endforeach
              </div>
            </div>
            <div class="clearfix">
              <div id="thumbcarousel" class="carousel slide" data-interval="false">
                <div class="carousel-inner">
                  <div class="item active">
                    @foreach( $carroSelecionado['pegaFotos'] as $key => $fotos )
                      <div data-target="#carousel" data-slide-to="{{$key}}" class="thumb"><img src="{!! verificaImagemSistem($fotos['imagem']) !!}"></div>
                    @endforeach
                  </div>
                </div>
                <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i></a> 
                <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a> 
              </div>
            </div>
          </div>
          
          <div id="second-tab-group" class="tabgroup">
            <div id="tabs3-2" style="display: block;">
              <div class="row row-fix">
                <div class="col-sm-12">
                  <div class="title2">{!! trataTraducoes('DETALHES DO VEÍCULO') !!}</div>
                  <div class="row" style="text-align: initial;">
                    <div class="col-sm-3">
                      <ul class="ul3">
                        <li><strong>{!! trataTraducoes('Montadora') !!}: </strong><a><i class="fa fa-check" aria-hidden="true"></i> {!! !empty($carroSelecionado['pegaMontadora']) ? $carroSelecionado['pegaMontadora'] : 'pegaMontadora' !!}</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <ul class="ul3">
                        <li><strong>{!! trataTraducoes('Tipo') !!}: </strong><a><i class="fa fa-check" aria-hidden="true"></i> {!! !empty($carroSelecionado['pegaTipo']) ? $carroSelecionado['pegaTipo'] : 'pegaTipo' !!}</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <ul class="ul3">
                        <li><strong>{!! trataTraducoes('Câmbio') !!}: </strong><a><i class="fa fa-check" aria-hidden="true"></i> {!! !empty($carroSelecionado['pegaCambio']) ? $carroSelecionado['pegaCambio'] : 'pegaCambio' !!}</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <ul class="ul3">
                        <li><strong>{!! trataTraducoes('Cor') !!}: </strong><a><i class="fa fa-check" aria-hidden="true"></i> {!! !empty($carroSelecionado['pegaCor']) ? $carroSelecionado['pegaCor'] : 'pegaCor' !!}</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <ul class="ul3">
                        <li><strong>{!! trataTraducoes('Carroceria') !!}: </strong><a><i class="fa fa-check" aria-hidden="true"></i> {!! !empty($carroSelecionado['pegaCarroceria']) ? $carroSelecionado['pegaCarroceria'] : 'pegaCarroceria' !!}</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <ul class="ul3">
                        <li><strong>{!! trataTraducoes('Portas') !!}: </strong><a><i class="fa fa-check" aria-hidden="true"></i> {!! !empty($carroSelecionado['pegaPorta']) ? $carroSelecionado['pegaPorta'] : 'pegaPorta' !!}</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <ul class="ul3">
                        <li><strong>{!! trataTraducoes('Motorização') !!}: </strong><a><i class="fa fa-check" aria-hidden="true"></i> {!! !empty($carroSelecionado['pegaMotorizacao']) ? $carroSelecionado['pegaMotorizacao'] : 'pegaMotorizacao' !!}</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <ul class="ul3">
                        <li><strong>{!! trataTraducoes('Combustível') !!}: </strong><a><i class="fa fa-check" aria-hidden="true"></i> {!! !empty($carroSelecionado['pegaCombustivel']) ? $carroSelecionado['pegaCombustivel'] : 'pegaCombustivel' !!}</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <ul class="ul3">
                        <li><strong>{!! trataTraducoes('KM') !!}: </strong><a><i class="fa fa-check" aria-hidden="true"></i> {!! !empty($carroSelecionado['km']) ? $carroSelecionado['km'] : 'km' !!}</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <ul class="ul3">
                        <li><strong>{!! trataTraducoes('Final da placa') !!}: </strong><a><i class="fa fa-check" aria-hidden="true"></i> {!! substr(!empty($carroSelecionado['placa']) ? $carroSelecionado['placa'] : null ,-1) !!}</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <ul class="ul3">
                        <li><strong>{!! trataTraducoes('Ano') !!}: </strong><a><i class="fa fa-check" aria-hidden="true"></i> {!! !empty($carroSelecionado['ano_veiculo']) ? $carroSelecionado['ano_veiculo'] : 'ano_veiculo' !!}</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <ul class="ul3">
                        <li><strong>{!! trataTraducoes('Versão') !!}: </strong><a><i class="fa fa-check" aria-hidden="true"></i> {!! !empty($carroSelecionado['versao']) ? $carroSelecionado['versao'] : 'versao' !!}</a></li>
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
                          action="/cars/details/{!! !empty($carroSelecionado['hash_id']) ? $carroSelecionado['hash_id'] : null !!}" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true">
                          @csrf
                          <div class="form-group form-wrap">
                            <label for="inputNome">{!! trataTraducoes('Nome') !!}</label>
                            <input type="text" class="form-control form-control-has-validation form-control-last-child"
                              name="nome" placeholder="{!! trataTraducoes('Seu nome') !!}" required="required">
                          </div>
                          <div class="form-group form-wrap">
                            <label for="inputEmail">{!! trataTraducoes('Email') !!}</label>
                            <input type="email" class="form-control form-control-has-validation form-control-last-child"
                              name="email" placeholder="{!! trataTraducoes('Endereço de email') !!}"
                              required="required">
                          </div>
                          <div class="form-group form-wrap">
                            <label for="inputEmail">{!! trataTraducoes('Telefone') !!}</label>
                            <input type="text" class="form-control form-control-has-validation form-control-last-child"
                              name="telefone" placeholder="{!! trataTraducoes('Telefone') !!}" required="required">
                          </div>
                          <div class="form-group form-wrap">
                            <label for="inputMessage">{!! trataTraducoes('Mensagem') !!}</label>
                            <textarea style="height: 300px !important;"
                              class="form-control form-control-has-validation form-control-last-child" name="texto"
                              rows="9" placeholder="{!! trataTraducoes('Mensagem') !!}" required="required"></textarea>
                          </div>
                          <div class="checkbox-inline">
                            <label>
                              <input type="checkbox" class="checkbox-custom" name="copia_email" value="copia_email">
                              {!! trataTraducoes('Quero receber uma cópia desse email!') !!}
                            </label>
                          </div>
                          <button type="submit" class="btn-default button-arrow" id="botaoEnviar" style="border-color: transparent;"
                            name="botaoEnviar">{!! trataTraducoes('Enviar mensagem') !!}</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="block-xl">
        <h2>NOSSOS VEICULOS</h2>
    </div>
      <div class="row" style="margin-bottom: 40px;">

        @forelse( retornaCarros() as $key => $retornaCarros )
          @include('veiculos::temas.4.box_cars',compact('retornaCarros'))
          @empty
          <div class="grid_12" style="margin-top: 30px;">
              {!! trataTraducoes('Sem veículos no momento') !!}
          </div>
        @endforelse
      </div>
    </div>
  </div>
</div>

<div class="snackbars" id="form-output-global"></div>
<script src="/temas/detail/js/bootstrap.min.js"></script>

@endsection