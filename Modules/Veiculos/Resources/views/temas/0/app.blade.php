<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
    <title>ConectaCar - Plataforma online, para la compra & venta de vehículos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="ConectaCar, software de gestión integral para la compraventa de vehículos, gestión de inventarios que garantiza el control eficiente y optimizado de los vehículos en venta." />
    <link rel="icon" href="{!! !empty($siteId['quaisDados']['icone']) ? $siteId['quaisDados']['icone'] : null !!}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/temas/{!! $siteId['tema'] !!}/css/css.css?family=Lato:400,700,900&amp;display=swap">
    <link rel="stylesheet" href="/temas/{!! $siteId['tema'] !!}/css/bootstrap.css">
    <link rel="stylesheet" href="/temas/{!! $siteId['tema'] !!}/css/fonts.css">
    <link rel="stylesheet" href="/temas/{!! $siteId['tema'] !!}/css/style.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
</head>
<body>
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
            <p>{!! trataTraducoes('Carregando') !!}</p>
        </div>
    </div>
    <div class="page">
        <header class="section page-header">
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="147px" data-xl-stick-up-offset="147px" data-xxl-stick-up-offset="147px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse">
                        <span></span>
                    </div>
                    <div class="rd-navbar-custom-toggle rd-navbar-fixed-element-2 rd-custom-toggle" data-custom-toggle=".rd-navbar-link-toggle" data-custom-toggle-disable-on-blur="true">
                        <span class="fa-filter"></span>
                    </div>
                    <div class="rd-navbar-aside-outer rd-navbar-collapse">
                        <div class="rd-navbar-aside">
                            <div class="rd-navbar-aside-element rd-navbar-aside-element-1">
                                <div class="rd-navbar-brand">
                                    <a class="brand" href="/">
                                        <img class="brand-logo-dark" src="{!! verificaImagemSistem(( !empty($siteId['quaisDados']['logotipo']) ? $siteId['quaisDados']['logotipo'] : Null ),'veiculo_sem_foto.png') !!}" alt="" width="372" height="61"/>
                                        <img class="brand-logo-light" src="{!! verificaImagemSistem(( !empty($siteId['quaisDados']['logotipo']) ? $siteId['quaisDados']['logotipo'] : Null ),'veiculo_sem_foto.png') !!}" alt="" width="372" height="61"/>
                                    </a>
                                </div>
                            </div>
                            <div class="rd-navbar-aside-element rd-navbar-aside-element-2">
                                <ul class="list-inline">
                                </ul>
                                <a class="button button-default button-ujarak button-icon button-icon-left" href="/login" style="padding: 1px 1px 1px 1px; background-color: transparent !important; color: #000000 !important; margin-right: 5px !important; font-size: 8pt !important; padding: 5px !important;">{!! trataTraducoes('Entrar') !!}</a>
                                <a class="button button-default button-ujarak button-icon button-icon-left" href="/register" style="padding: 1px 1px 1px 1px; background-color: transparent !important; color: #000000 !important; margin-right: 20px !important; font-size: 8pt !important; padding: 5px !important;">{!! trataTraducoes('Cadastrar') !!}</a>
                                @foreach( pegaIdiomasDisponiveis() as $idiomas )
                                <a class="button button-default button-ujarak button-icon button-icon-left" href="?language={!! $idiomas['sigla'] !!}" style="padding: 1px 1px 1px 1px; background-color: transparent !important;"><img src="{!! $idiomas['imagem'] !!}" style="height: 30px !important;"></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="rd-navbar-main-outer">
                        <div class="rd-navbar-main">
                            <div class="rd-navbar-panel">
                                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                <div class="rd-navbar-brand">
                                    <a class="brand" href=""><img class="brand-logo-dark" src="{!! verificaImagemSistem(( !empty($siteId['quaisDados']['logotipo']) ? $siteId['quaisDados']['logotipo'] : Null ),'veiculo_sem_foto.png') !!}" alt="" width="372" height="61"/></a>
                                </div>
                            </div>
                            <div class="rd-navbar-main-element">
                                <div class="rd-navbar-nav-wrap">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ul class="rd-navbar-nav">
                                                <li class="rd-nav-item {{ Request::is('/') ? 'active' : '' }}" style="line-height: 1 !important; text-align: center !important;"><a class="rd-nav-link" href="/"><span class="fa fa-home"></span><br>{!! trataTraducoes('Início') !!}</a></li>
                                                <li class="rd-nav-item {{ Request::is('stores') ? 'active' : '' }}" style="line-height: 1 !important; text-align: center !important;"><a class="rd-nav-link" href="/stores"><span class="fa fa-building"></span><br>{!! trataTraducoes('Lojas') !!}</a></li>
                                                <li class="rd-nav-item {{ Request::is('cars') ? 'active' : '' }}" style="line-height: 1 !important; text-align: center !important;"><a class="rd-nav-link" href="/cars"><span class="fa fa-car"></span><br>{!! trataTraducoes('Veículos') !!}</a></li>
                                                <li class="rd-nav-item {{ Request::is('contact') ? 'active' : '' }}" style="line-height: 1 !important; text-align: center !important; border-right: 1px solid #C8C8C8;"><a class="rd-nav-link" href="/contact"><span class="fa fa-envelope"></span><br>{!! trataTraducoes('Contato') !!}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        @yield('content')

        <footer class="section footer-classic context-dark">
            <div class="container text-center">
                <div class="row row-12 align-items-center">
                    <div class="col-lg-6 text-lg-left"><a href="/"><img src="{!! verificaImagemSistem(( !empty($siteId['quaisDados']['logotipo']) ? $siteId['quaisDados']['logotipo'] : Null ),'veiculo_sem_foto.png') !!}" alt="" width="372" height="61"/></a></div>
                    <div class="col-lg-6 text-lg-right">
                        <ul class="footer-list-inline">
                            <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">{!! trataTraducoes('Início') !!}</a></li>
                            <li><a href="/stores" class="{{ Request::is('stores') ? 'active' : '' }}">{!! trataTraducoes('Lojas') !!}</a></li>
                            <li><a href="/cars" class="{{ Request::is('cars') ? 'active' : '' }}">{!! trataTraducoes('Veículos') !!}</a></li>
                            <li><a href="/contact" class="{{ Request::is('contact') ? 'active' : '' }}">{!! trataTraducoes('Contato') !!}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row row-12 align-items-center flex-lg-row-reverse">
                    <div class="col-lg-6 text-lg-right">
                        <ul class="list-inline list-inline-sm">
                            <li><a class="icon icon-circle fa-facebook-f" href="#"></a></li>
                            <li><a class="icon icon-circle fa-twitter" href="#"></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 text-lg-left">
                        <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span> ConectaCar <br>{!! trataTraducoes('Todos os direitos reservados') !!}.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="/temas/{!! $siteId['tema'] !!}/js/core.min.js"></script>
    <script src="/temas/{!! $siteId['tema'] !!}/js/script.js"></script>
    </html>