<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>{!! !empty($siteId['name']) ? $siteId['name'] : 'site_name'!!}</title>
    <link rel="icon" href="{!! !empty($siteId['quaisDados']['icone']) ? $siteId['quaisDados']['icone'] : null !!}" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,600,700,800%7CPoppins:300,400,500,600,700">
    <link rel="stylesheet" href="/temas/6/css/bootstrap.css">
    <link rel="stylesheet" href="/temas/6/css/fonts.css">
    <link rel="stylesheet" href="/temas/6/css/style.css">

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
            <p>{!! trataTraducoes("Carregando...") !!}</p>
        </div>
    </div>
    <div class="page">

        @yield('content')

        <footer class="section bg-gray-3 context-dark">
            <div class="footer-modern-aside">
                <div class="container">
                    <div class="row row-30 align-items-center justify-content-between">
                        <div class="col-lg-2 col-xl-auto">
                            <img style="max-height: 75px;max-width: 170px;" src="{!! verificaImagemSistem(( !empty($siteId['quaisDados']['logotipo']) ? $siteId['quaisDados']['logotipo'] : Null ),'veiculo_sem_foto.png') !!}" width="176" height="31" alt="">
                            <p class="privacy">
                                <span>{!! !empty($siteId['name']) ? $siteId['name'] : trataTraducoes('site_name') !!}</span>
                                <span>&nbsp;&copy;&nbsp;</span><span class="copyright-year"></span>
                            </p>
                            <hr>
                            <ul class="footer-menu-list">
                                @foreach( $data['nav'] as $datas )
                                    <li><a href="{!! ( strlen($datas['url']) === 1 ? '/' : '/'.$datas['url'] ) !!}">{!! trataTraducoes($datas['label']) !!}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="right-block footer-modern-item-block">
                                <div class="footer-menu">
                                    <iframe src="{!! $data['settings']['localizacao']['url'] !!}" frameborder="0" scrolling="no"
                                        width="{!! $data['settings']['localizacao']['width'] !!}" height="240px"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-xl-left">
                            <p class="footer-modern-title">{!! trataTraducoes("CONTATO") !!}</p>
                            <div class="soc-block footer-modern-item-block">
                                <div class="info-address">
                                    <span aria-hidden="true" class="fa fa-map-marker novi-icon"></span>
                                    {!! !empty($siteId['quaisDados']['endereco']) ? $siteId['quaisDados']['endereco'] : trataTraducoes('site_endereco') !!}
                                </div>
                                <div class="info-phone">
                                    <span aria-hidden="true" class="fa fa-phone novi-icon"></span>
                                    {!! trataTraducoes('Telefone') !!}: {!! !empty($siteId['quaisDados']['fone_1']) ? $siteId['quaisDados']['fone_1'] : trataTraducoes('site_telefone') !!}
                                </div>
                                <div class="info-email">
                                    <span aria-hidden="true" class="fa fa-envelope novi-icon"></span>
                                    {!! trataTraducoes('Email') !!}: {!! !empty($siteId['email']) ? $siteId['email'] : trataTraducoes('site_email') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-modern-aside">
                <div class="container">
                    <div class="row row-30 align-items-center justify-content-between">
                        <div class="col-lg-2 col-xl-auto"></div>
                        <div class="col-lg-5 col-xl-4 text-xl-right"></div>
                        <div class="col-lg-3 text-xl-left">
                            <div class="footer-modern-list">
                                <div class="group group-sm">
                                    <a class="link-1 icon mdi mdi-instagram" href="#"></a>
                                    <a class="link-1 icon mdi mdi-facebook" href="#"></a>
                                    <a class="link-1 icon mdi mdi-youtube-play" href="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
        </footer>
    </div>

    <div class="snackbars" id="form-output-global"></div>
    <script src="/temas/6/js/core.min.js"></script>
    <script src="/temas/6/js/script.js"></script>

</html>