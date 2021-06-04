<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>{!! !empty($siteId['name']) ? $siteId['name'] : 'site_name'!!}</title>
    <link rel="icon" href="{!! !empty($siteId['quaisDados']['icone']) ? $siteId['quaisDados']['icone'] : null !!}" type="image/x-icon">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300italic,400,500,500italic,700">
    <link rel="stylesheet" href="/temas/5/css/bootstrap.css">
    <link rel="stylesheet" href="/temas/5/css/fonts.css">
    <link rel="stylesheet" href="/temas/5/css/style.css">
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

<body class="body-gray">
    <div class="text-center page page-boxed">
        <div class="page-loader">
            <div>
                <div class="page-loader-body">
                    <img src="{!! verificaImagemSistem(( !empty($siteId['quaisDados']['logotipo']) ? $siteId['quaisDados']['logotipo'] : Null ),'veiculo_sem_foto.png') !!}"  width="176" height="30" alt="">
                    <div id="loadingProgressG">
                        <div class="loadingProgressG" id="loadingProgressG_1"> </div>
                    </div>
                </div>
            </div>
        </div>
        <header class="header-default header-home-2" style="margin-bottom: 10px;">
            @include('veiculos::temas.5.nav')
        </header>

        @yield('content')

        <footer class="footer-default bg-gray-6">
            <div class="container">
                <div class="row align-items-md-start">
                    <div style="text-align: center !important" class="col-sm-12 col-md-4 col-lg-4 text-md-left">
                        <a class="footer-brand" href="./">
                            <img src="{!! verificaImagemSistem(( !empty($siteId['quaisDados']['logotipo']) ? $siteId['quaisDados']['logotipo'] : Null ),'veiculo_sem_foto.png') !!}" width="176" height="31" alt="">
                        </a>
                        <p class="privacy" style="margin-top: 10px;">
                            <span>{!! !empty($siteId['name']) ? $siteId['name'] : trataTraducoes('site_name') !!}</span>
                            <span>&nbsp;&copy;&nbsp;</span><span class="copyright-year"></span>
                        </p>
                        <hr>
                        <ul class="footer-menu-list" style="margin-top: 10px;">
                            @foreach( $data['nav'] as $datas )
                                <li>
                                    <a href="{!! ( strlen($datas['url']) === 1 ? '/' : '/'.$datas['url'] ) !!}">{!! trataTraducoes($datas['label']) !!}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 text-md-right">
                        <div class="right-block">
                            <div class="footer-menu">
                                <iframe src="{!! $data['settings']['localizacao']['url'] !!}" frameborder="0"
                                    scrolling="no" width="{!! $data['settings']['localizacao']['width'] !!}"
                                    height="240px"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 text-md-right">
                        <div class="soc-block">
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
        </footer>
    </div>

    <script src="/temas/5/js/core.min.js"></script>
    <script src="/temas/5/js/script.js"></script>

</html>