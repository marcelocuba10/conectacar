<!DOCTYPE html>
<html lang="en">
<head>
    <title>{!! $data['settings']['global']['site_name'] !!}</title>
    <meta charset="utf-8">
    <meta name = "format-detection" content = "telephone=no" />
    <link rel="icon" href="/temas/2/images/favicon.ico">
    <link rel="shortcut icon" href="/temas/2/images/favicon.ico" />
    <link rel="stylesheet" href="/temas/2/css/booking.css">
    <link rel="stylesheet" href="/temas/2/css/camera.css">
    <link rel="stylesheet" href="/temas/2/css/owl.carousel.css">
    <link rel="stylesheet" href="/temas/2/css/style.css">
    <link rel="stylesheet" href="/temas/2/css/form.css">

    <script src="/temas/2/js/jquery.js"></script>
    <script src="/temas/2/js/jquery-migrate-1.2.1.js"></script>
    <script src="/temas/2/js/script.js"></script>
    <script src="/temas/2/js/superfish.js"></script>
    <script src="/temas/2/js/jquery.ui.totop.js"></script>
    <script src="/temas/2/js/jquery.equalheights.js"></script>
    <script src="/temas/2/js/jquery.mobilemenu.js"></script>
    <script src="/temas/2/js/jquery.easing.1.3.js"></script>
    <script src="/temas/2/js/TMForm.js"></script>
    <script src="/temas/2/js/owl.carousel.js"></script>
    <script src="/temas/2/js/camera.js"></script>
    <script src="/temas/2/js/jquery.mobile.customized.min.js"></script>
    <script src="/temas/2/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="/temas/2/js/jquery.fancyform.js"></script>
    <script src="/temas/2/js/jquery.placeholder.js"></script>
    <script src="/temas/2/js/regula.js"></script>
    <script src="/temas/2/js/booking.js"></script>
    <script src="/temas/2/js/jquery.placeholder.js"></script>

    <script>
        $(document).ready(function(){
            jQuery('#camera_wrap').camera({
                loader: false,
                pagination: false ,
                minHeight: '444',
                thumbnails: false,
                height: '28.28125%',
                caption: true,
                navigation: true,
                fx: 'mosaic'
            });
            $().UItoTop({ easingType: 'easeOutQuart' });
        });
    </script>
    <link rel="stylesheet" href="/temas/2/css/style.css">
</head>
<body class="page1" id="top">
    <div class="main">
        <header>
            <div class="menu_block ">
                <div class="container_12">
                    <div class="grid_12">
                        <nav class="horizontal-nav full-width horizontalNav-notprocessed">
                            <div class="container_12">
                                <div class="grid_3">
                                    <a href="/" class="p-left" style="float:left !important;">
                                        <img src="{!! verificaImagemSistem($siteId['logotipo'],'/temas/2/images/logo.png') !!}" alt="{!! $siteId['name'] !!}" style="max-width: 90% !important;">
                                    </a>
                                </div>
                                <div class="grid_9">
                                    <ul class="sf-menu">
                                        @foreach( $data['nav'] as $key => $nav )
                                        <li class="{{ Request::is(( strlen($nav['url']) === 1 ? $nav['url'] : str_replace('/','',$nav['url']) )) ? 'current' : '' }}"><a href="{!! $nav['url'] !!}">{!! $nav['label'] !!}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </header>
        @yield('content')
    </div>
    <footer>
        <div class="container_12">
            <div class="grid_12">
                <div class="f_phone fa fa-phone"> &nbsp; <a href="https://api.whatsapp.com/send/?phone=595986823827&text=">{!! $data['settings']['global']['site_telefone'] !!}</a></div>
                <div class="socials">
                    @foreach( $data['settings']['footer']['social_network'] as $social )
                    <a href="{!! $social !!}" class="fa fa-{!! extraiIconParaRedesSociais($social) !!}"></a>
                    @endforeach
                </div>
                <div class="copy">
                    <div class="st1">
                        <div class="brand">{!! $data['settings']['global']['site_name'] !!}</div>
                    </div>
                    &copy; {!! date('Y') !!} - <a href="https://conectacode.com.py/" target="_blank">ConectaCode</a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </footer>
</body>
</html>            