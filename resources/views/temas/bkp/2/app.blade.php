<!DOCTYPE html>
<html lang="es">
<head>
    <title>{!! $data['settings']['global']['site_name'] !!}</title>
    <meta charset="utf-8">
    <meta name = "format-detection" content = "telephone=no" />
    <link rel="icon" href="/temas/page186/images/favicon.ico">
    <link rel="shortcut icon" href="/temas/page186/images/favicon.ico" />
    <link rel="stylesheet" href="/temas/page186/css/booking.css">
    <link rel="stylesheet" href="/temas/page186/css/camera.css">
    <link rel="stylesheet" href="/temas/page186/css/owl.carousel.css">
    <link rel="stylesheet" href="/temas/page186/css/style.css">
    <link rel="stylesheet" href="/temas/page186/css/form.css">

    <script src="/temas/page186/js/jquery.js"></script>
    <script src="/temas/page186/js/jquery-migrate-1.2.1.js"></script>
    <script src="/temas/page186/js/script.js"></script>
    <script src="/temas/page186/js/superfish.js"></script>
    <script src="/temas/page186/js/jquery.ui.totop.js"></script>
    <script src="/temas/page186/js/jquery.equalheights.js"></script>
    <script src="/temas/page186/js/jquery.mobilemenu.js"></script>
    <script src="/temas/page186/js/jquery.easing.1.3.js"></script>
    <script src="/temas/page186/js/TMForm.js"></script>
    <script src="/temas/page186/js/owl.carousel.js"></script>
    <script src="/temas/page186/js/camera.js"></script>

    <script src="/temas/page186/js/jquery.mobile.customized.min.js"></script>
    <script src="/temas/page186/js/booking.js"></script>
    <script src="/temas/page186/js/jquery.placeholder.js"></script>
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
    <link rel="stylesheet" href="/temas/page186/style.css">
</head>
<body class="page1" id="top">
    <div class="main">
        <header>
            <div class="menu_block ">
                <div class="container_12">
                    <div class="grid_12">
                        <nav class="horizontal-nav full-width horizontalNav-notprocessed">
                            <ul class="sf-menu">
                                <a href="index.html" class="p-left">
                                    <img src="/temas/page186/images/logo.png" alt="Your Happy Family">
                                </a>
                                @foreach( $data['nav'] as $key => $menu )
                                <li class="{{ Request::is($menu['url']) ? 'current' : '' }}"><a href="{!! $menu['url'] !!}">{!! $menu['label'] !!}</a></li>
                                @endforeach
                            </ul>
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
                <div class="f_phone">{!! $data['settings']['global']['site_telefone'] !!}</div>
                <div class="socials">
                    @foreach( $data['settings']['footer']['social_network'] as $key => $social )
                    <a href="{!! $key !!}" class="fa fa-{!! str_replace('https://','',explode('.',$key)[0]) !!}"></a>
                    @endforeach
                </div>
                <div class="copy">
                    <div class="st1">
                        <div class="brand">{!! $data['settings']['global']['site_name'] !!}</div>
                    &copy; {!! date('Y') !!}</div>
                    <a href="http://www.conectacode.com.py/" target="_blank">ConectaCode</a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </footer>
</body>
</html>            