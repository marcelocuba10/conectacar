<?php
$siteID = site_id();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{!! $siteID['name'] !!}</title>
    <link href="/temas/inspinia/css/bootstrap.min.css?v={!! versaoSistema() !!}" rel="stylesheet">
    <link href="/temas/inspinia/font-awesome/css/font-awesome.css?v={!! versaoSistema() !!}" rel="stylesheet">
    <link href="/temas/inspinia/css/animate.css?v={!! versaoSistema() !!}" rel="stylesheet">
    <link href="/temas/inspinia/css/plugins/iCheck/custom.css?v={!! versaoSistema() !!}" rel="stylesheet">
    <link href="/temas/inspinia/css/style.css?v={!! versaoSistema() !!}" rel="stylesheet">
    <link href="/temas/inspinia/css/person.css?v={!! versaoSistema() !!}" rel="stylesheet">

    <meta charset=utf-8>
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width,initial-scale=1">
    <meta name=theme-color content=#343a40>
    <meta name=title content="">
    <meta name=description content="">
    <meta name=keywords content="">
    <meta name=robots content="index, follow">
    <meta name=language content=English>

    <link rel=apple-touch-icon sizes=57x57 href=/clientes/{!! $siteID['id'] !!}/pwa/logotipo_57x57.png>
    <link rel=apple-touch-icon sizes=60x60 href=/clientes/{!! $siteID['id'] !!}/pwa/logotipo_60x60.png>
    <link rel=apple-touch-icon sizes=72x72 href=/clientes/{!! $siteID['id'] !!}/pwa/logotipo_72x72.png>
    <link rel=apple-touch-icon sizes=76x76 href=/clientes/{!! $siteID['id'] !!}/pwa/logotipo_76x76.png>
    <link rel=apple-touch-icon sizes=114x114 href=/clientes/{!! $siteID['id'] !!}/pwa/logotipo_114x114.png>
    <link rel=apple-touch-icon sizes=120x120 href=/clientes/{!! $siteID['id'] !!}/pwa/logotipo_120x120.png>
    <link rel=apple-touch-icon sizes=144x144 href=/clientes/{!! $siteID['id'] !!}/pwa/logotipo_144x144.png>
    <link rel=apple-touch-icon sizes=152x152 href=/clientes/{!! $siteID['id'] !!}/pwa/logotipo_152x152.png>
    <link rel=apple-touch-icon sizes=180x180 href=/clientes/{!! $siteID['id'] !!}/pwa/logotipo_180x180.png>
    <link rel=icon type=image/png sizes=192x192 href=/clientes/{!! $siteID['id'] !!}/pwa/logotipo_192x192.png>
    <link rel=icon type=image/png sizes=32x32 href=/clientes/{!! $siteID['id'] !!}/pwa/logotipo_32x32.png>
    <link rel=icon type=image/png sizes=96x96 href=/clientes/{!! $siteID['id'] !!}/pwa/logotipo_96x96.png>
    <link rel=icon type=image/png sizes=16x16 href=/clientes/{!! $siteID['id'] !!}/pwa/logotipo_16x16.png>

    <meta name=msapplication-TileColor content=#ffffff>
    <meta name=msapplication-TileImage content=/clientes/{!! $siteID['id'] !!}/pwa/logotipo_144x144.png>
    <meta name=theme-color content=#ffffff>
    <link rel="shortcut icon" href=/clientes/{!! $siteID['id'] !!}/favicon.ico type=image/x-icon>
    <link rel=icon href=/clientes/{!! $siteID['id'] !!}/favicon.ico type=image/x-icon>

    <link rel="manifest" href="/clientes/{!! $siteID['id'] !!}/pwa/manifest.json">
</head>
<body class="gray-bg" style="background-image: url('{!! $siteID['fundo'] !!}?v={!! versaoSistema() !!}'); background-size: 100% 100%; background-repeat: no-repeat; background-color: #001040">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h2 class="logo-name" style="padding-bottom: 0px !important;"><img src="/clientes/1/logo_conectacar_branco.png?v={!! versaoSistema() !!}" style="width: 100% !important;"></h2>
            </div> 
            @yield('content')
            <div id="status"></div>
            <script src="/js/jquery.form.js?v={!! versaoSistema() !!}"></script>
            <p class="m-t"> <small>{!! copyright(['corTexto'=>'#fff']) !!}</small> </p>
        </div>
    </div>
    <script src="/temas/inspinia/js/jquery-3.1.1.min.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/popper.min.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/bootstrap.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/plugins/iCheck/icheck.min.js?v={!! versaoSistema() !!}"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>
</html>