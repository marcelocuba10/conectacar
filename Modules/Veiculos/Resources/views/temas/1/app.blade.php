<?php
/*
https://livedemo00.template-help.com/wt_prod-14633/
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>{!! $data['settings']['site_name'] !!}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="marzelo">
    <link
    href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700%7COpen+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
    rel="stylesheet" type="text/css">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <link href="/temas/1/css/jquery-ui.css" rel="stylesheet">
    <link href="/temas/1/css/bootstrap.css" rel="stylesheet">
    <link href="/temas/1/css/font-awesome.css" rel="stylesheet">
    <link href="/temas/1/css/light-gallery.css" rel="stylesheet">
    <link href="/temas/1/css/gflexslider.css" rel="stylesheet">
    <link href="/temas/1/css/superslides.css" rel="stylesheet">
    <link href="/temas/1/css/elegant-icons.css" rel="stylesheet">
    <link href="/temas/1/css/animate.css" rel="stylesheet">
    <link href="/temas/1/css/select2.css" rel="stylesheet">
    <link href="/temas/1/css/style.css" rel="stylesheet">

    <script src="/temas/1/js/jquery.js"></script>
    <script src="/temas/1/js/jquery-ui.js"></script>
    <script src="/temas/1/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="/temas/1/js/jquery.easing.1.3.js"></script>
    <script src="/temas/1/js/pointer-events.js"></script>
    <script src="/temas/1/js/jquery.flexslider-min.js"></script>
    <script src="/temas/1/js/select2.js"></script>
    <script src="/temas/1/js/jquery.superslides.js"></script>
    <script src="/temas/1/js/jquery.sticky.js"></script>
    <script src="/temas/1/js/jquery.appear.js"></script>
    <script src="/temas/1/js/jquery.ui.totop.js"></script>
    <script src="/temas/1/js/jquery.caroufredsel.js"></script>
    <script src="/temas/1/js/jquery.touchSwipe.min.js"></script>
    <script src="/temas/1/js/material-parallax.js"></script>
    <script src="/temas/1/js/owl-carousel.js"></script>
    <script src="/temas/1/js/rd-mailform.js"></script>
    <script src="/temas/1/js/rd-navbar.js"></script>
    <script src="/temas/1/js/light-gallery.js"></script>
    <script src="/temas/1/js/swiper.js"></script>
    <script src="/temas/1/js/waypoint.js"></script>
    <script src="/temas/1/js/scripts.js"></script>

</head>

<body class="front" data-spy="scroll" data-target="#top1" data-offset="96">
    <div id="main">
        <header class="section page-header">
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse">
                        <span></span>
                    </div>
                    <div class="rd-navbar-aside-outer rd-navbar-collapse bg-gray-dark">
                        <div class="rd-navbar-aside">
                            <div class="block-left">
                                <ul class="list-inline">
                                    <li>
                                        <div class="unit  align-items-center">
                                            <div class="unit-left"><span class="icon ei icon_phone novi-icon"></span></div>
                                            <div class="unit-body">{!! $siteId['quaisDados']['fone_1'] !!}</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="unit  align-items-center">
                                            <div class="unit-left"><span class="icon ei icon_pin novi-icon"></span></div>
                                            <div class="unit-body">{!! $data['settings']['site_endereco'] !!}</div>
                                        </div>
                                    </li>
                                    @if( !empty($data['settings']['social_network']) )
                                    <li>
                                        <ul class="social-list">
                                            @foreach( $data['settings']['social_network'] as $datas )
                                            <li><a href="{!! explode('|',$datas)[0] !!}" target="_blank" class="icon {!! explode('|',$datas)[1] !!} novi-icon"></a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="block-right">
                                <ul class="list-inline">
                                    @foreach( pegaIdiomasDisponiveis() as $idiomas )
                                    <li>
                                        <a href="/?idioma={!! strtolower($idiomas['url']) !!}" data-toggle='modal'>
                                            <img src="{!! $idiomas['imagem'] !!}" style="height: 15px; {!! strtolower($idiomas['sigla']) === strtolower($_SESSION['idioma']) ? ' border-bottom: 1px solid #fff; ' : Null !!}">
                                        </a>
                                    </li>
                                    @endforeach
                                    <li>
                                        <a href="/login" data-toggle='modal'>{!! trataTraducoes('Entrar') !!}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="rd-navbar-main-outer">
                        <div class="rd-navbar-main">
                            <!-- RD Navbar Panel-->
                            <div class="rd-navbar-panel">
                                <!-- RD Navbar Toggle-->
                                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                <!-- RD Navbar Brand-->
                                <div class="rd-navbar-brand"><a class="brand" href="/1"><img class="brand-logo-dark" src="{!! $siteId['quaisDados']['logotipo'] !!}" alt="" /></a>
                                </div>
                            </div>
                            <div class="rd-navbar-main-element">
                                <div class="rd-navbar-nav-wrap">
                                    <!-- RD Navbar Nav-->
                                    <ul class="rd-navbar-nav">
                                        @foreach( $data['nav'] as $datas )
                                        <li class="rd-nav-item {!! Request::is($datas['url']) ? 'active' : Null !!}">
                                            <a class="rd-nav-link" href="{!! ( strlen($datas['url']) === 1 ? '/' : '/'.$datas['url'] ) !!}">{!! trataTraducoes($datas['label']) !!}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        @yield('content')
        <div class="footer-map">
            <iframe src="{!! $data['settings']['localizacao']['url'] !!}" frameborder="0" scrolling="no" width="{!! $data['settings']['localizacao']['width'] !!}" height="{!! $data['settings']['localizacao']['height'] !!}"></iframe>
        </div>
        <footer class="section novi-background bg-cover">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="left-block">
                            <div class="col-md-12">
                                <div class="footer-logo">
                                    <a href="/" class="logo2">
                                        <img src="{!! $siteId['quaisDados']['logotipo'] !!}" alt="" class="img-responsive" style="width: 70% !important;">
                                    </a>
                                </div>
                                <div>
                                    <span>&copy;&nbsp; </span>
                                    <span class="copyright-year"></span>
                                    <span>&nbsp;</span>
                                    <span>{!! $data['settings']['site_name'] !!}</span>
                                    <span>.&nbsp;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="social-footer">
                            @if( !empty($data['settings']['social_network']) )
                            <ul class="social-footer-list">
                                @foreach( $data['settings']['social_network'] as $datas )
                                <li>
                                    <a href="{!! explode('|',$datas)[0] !!}" target="_blank">
                                        <span aria-hidden="true" class="ei {!! explode('|',$datas)[1] !!} novi-icon" style="font-size: 12pt;"></span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <div class="footer-menu">
                            <ul class="footer-menu-list">
                                @foreach( $data['nav'] as $datas )
                                <li><a href="{!! ( strlen($datas['url']) === 1 ? '/' : '/'.$datas['url'] ) !!}">{!! trataTraducoes($datas['label']) !!}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <address>
                            <span aria-hidden="true" class="fa fa-map-marker novi-icon"></span>
                            {!! $siteId['quaisDados']['endereco'] !!}, {!! $siteId['quaisDados']['numero'] !!}<br>
                            {!! $siteId['quaisDados']['bairro'] !!} - {!! $siteId['quaisDados']['cidade'] !!} / {!! $siteId['quaisDados']['estado'] !!}
                        </address>
                        <div class="footer-info">
                            <div class="info-phone">
                                <span aria-hidden="true" class="fa fa-phone novi-icon"></span>
                                <div class="row">
                                    <div class="col-md-5">
                                        {!! trataTraducoes('Telefone') !!}:
                                    </div>
                                    <div class="col-md-7">
                                        {!! $siteId['quaisDados']['fone_1'] !!}
                                        {!! !empty($siteId['quaisDados']['fone_2']) ? '<br>'.$siteId['quaisDados']['fone_2'] : Null !!}
                                        {!! !empty($siteId['quaisDados']['fone_3']) ? '<br>'.$siteId['quaisDados']['fone_3'] : Null !!}
                                        {!! !empty($siteId['quaisDados']['fone_4']) ? '<br>'.$siteId['quaisDados']['fone_4'] : Null !!}
                                    </div>
                                </div>
                            </div>
                            <div class="info-email">
                                <span aria-hidden="true" class="fa fa-envelope novi-icon"></span>Email:
                                {!! $siteId['email'] !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
<div class="snackbars" id="form-output-global"></div>
<script src="/temas/1/js/bootstrap.min.js"></script>
</html>