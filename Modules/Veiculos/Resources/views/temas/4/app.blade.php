<!DOCTYPE html>
<html class="wide wow-animation" lang="pt">
<head>
  <title>{!! !empty($siteId['name']) ? $siteId['name'] : 'site_name'!!}</title>
  <link rel="icon" href="{!! !empty($siteId['quaisDados']['icone']) ? $siteId['quaisDados']['icone'] : null !!}" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:400,700%7CRighteous">
  <link rel="stylesheet" href="/temas/4/css/bootstrap.css">
  <link rel="stylesheet" href="/temas/4/css/fonts.css">
  <link rel="stylesheet" href="/temas/4/css/style.css">
  <style>
    .ie-panel {
      display: none;
      background: #212121;
      padding: 10px 0;
      box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
      clear: both;
      text-align: center;
      position: relative;
      z-index: 1;
    }

    html.ie-10 .ie-panel,
    html.lt-ie-10 .ie-panel {
      display: block;
    }
  </style>
</head>

<body>
  <div class="preloader">
    <div class="preloader-body">
      <div class="cssload-container">
        <div class="cssload-speeding-wheel"></div>
      </div>
      <p>{!! trataTraducoes("Carregando") !!}...</p>
    </div>
  </div>
  <div class="page">
    <header class="section">
      <div class="rd-navbar-wrap">
        @include('veiculos::temas.4.nav')
      </div>
    </header>

    @yield('content')

    <section class="bg-gray-100 section section section-md text-center text-md-left">
      <div class="container">
        <div class="row row-50">
          <div class="col-md-6 col-lg-4">
            <h3 style="margin-bottom: 20px">{!! trataTraducoes("CONTATO") !!}</h3>
            <ul class="list-address">
              <li>
                <div class="unit unit-spacing-sm flex-column flex-md-row">
                  <div class="unit-left">
                    <div class="icon novi icon icon-gray-300 icon-lg fa fa-map-marker"></div>
                  </div>
                  <div class="unit-body">
                    <address>
                      <a class="link-gray-600">{!! !empty($siteId['quaisDados']['endereco']) ? $siteId['quaisDados']['endereco'] : trataTraducoes('site_endereco') !!}</a></address>
                  </div>
                </div>
              </li>
              <li>
                <div class="unit unit-spacing-md align-items-center flex-column flex-md-row">
                  <div class="unit-left">
                    <div class="icon novi icon icon-gray-300 icon-lg fa fa-mobile"></div>
                  </div>
                  <div class="unit-body"><a class="link-tel" style="color: #ff5639;">{!! !empty($siteId['quaisDados']['fone_1']) ? $siteId['quaisDados']['fone_1'] : trataTraducoes('site_telefone') !!}</a></div>
                </div>
              </li>
              <li>
                <div class="unit unit-spacing-xs-1 flex-column flex-md-row">
                  <div class="unit-left">
                    <div class="icon novi icon icon-gray-300 icon-md fa fa-envelope"></div>
                  </div>
                  <div class="unit-body font-size-md"><span class="text-primary">{!! trataTraducoes("Email") !!}:</span><a style="color: #ff5639;">
                    {!! !empty($siteId['email']) ? $siteId['email'] : trataTraducoes('site_email') !!}</a></div>
                </div>
              </li>
            </ul>
            <ul class="list-socials list-inline">
              <li><a class="icon novi-icon icon-lg link-gray-300 fa fa-facebook-square"></a></li>
              <li><a class="icon novi-icon icon-lg link-gray-300 fa fa-instagram"></a></li>
            </ul>
          </div>
          <div class="col-md-6 col-lg-4 order-lg-3" style="text-align: center;">
              <a class="footer-brand" href="/">
                  <img style="max-height: 75px;max-width: 170px;" src="{!! verificaImagemSistem(( !empty($siteId['quaisDados']['logotipo']) ? $siteId['quaisDados']['logotipo'] : Null ),'veiculo_sem_foto.png') !!}" width="176" height="31" alt="">
              </a>
              <p class="privacy" style="margin-top: 10px;">
                  <span class="link-gray-600 font-size-md">{!! !empty($siteId['nome_fantasia']) ? $siteId['nome_fantasia'] : trataTraducoes('nome_fantasia') !!} &nbsp;&copy;&nbsp; 2021</span>
              </p>
              <hr style="width: 75%;">
              <ul class="footer-menu-list" style="margin-top: 10px;">
                  @foreach( $data['nav'] as $datas )
                      <li>
                          <a href="{!! ( strlen($datas['url']) === 1 ? '/' : '/'.$datas['url'] ) !!}">{!! trataTraducoes($datas['label']) !!}</a>
                      </li>
                  @endforeach
              </ul>
            </div>
          <div class="col-lg-4">
            <h3 style="margin-bottom: 20px">{!! trataTraducoes("LOCALIZACAO") !!}</h3>
            <div class="google-map-container">
              <iframe src="{!! $data['settings']['localizacao']['url'] !!}" frameborder="0" scrolling="no" width="{!! $data['settings']['localizacao']['width'] !!}" height="200"></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="section footer-classic context-dark text-center text-md-left">
      <div class="container">
        <p class="rights">
          <span>{!! !empty($siteId['name']) ? $siteId['name'] : trataTraducoes('site_name') !!}</span>
          <span>&nbsp;</span><span>&copy;&nbsp;</span>
          <span class="copyright-year"></span>
          <span>.&nbsp;</span>
          <a href="#">{!! trataTraducoes("Política de Privacidade") !!}</a>
        </p>
      </div>
    </footer>

  </div>
  <div class="snackbars" id="form-output-global"></div>
  <script src="/temas/4/js/core.min.js"></script>
  <script src="/temas/4/js/script.js"></script>

</html>