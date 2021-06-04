<!DOCTYPE html>
<html lang="en">

<head>
    <title>{!! !empty($siteId['name']) ? $siteId['name'] : 'site_name'!!}</title>
    <link rel="icon" href="{!! !empty($siteId['quaisDados']['icone']) ? $siteId['quaisDados']['icone'] : null !!}" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <link rel="stylesheet" href="/temas/3/css/grid.css">
    <link rel="stylesheet" href="/temas/3/css/search.css">
    <link rel="stylesheet" href="/temas/3/css/camera.css">
    <link rel="stylesheet" href="/temas/3/booking/css/booking.css">
    <link rel="stylesheet" href="/temas/3/css/style.css">
    <link rel="stylesheet" href="/temas/3/css/contact-form.css">
    <link rel="stylesheet" href="/temas/3/css/custom-style.css">

    <script src="/temas/3/js/jquery.js"></script>
    <script src="/temas/3/js/jquery-migrate-1.2.1.js"></script>
    <script src="/temas/3/js/camera.js"></script>
    <script src="/temas/3/js/jquery.equalheights.js"></script>
    <script src="/temas/3/search/search.js"></script>
    <script src="/temas/3/booking/js/booking.js"></script>
    <script src="/temas/3/booking/js/jquery.placeholder.js"></script>
    <script src="/temas/3/js/jquery.mobile.customized.min.js"></script>
    <script src="/temas/3/js/wow/wow.js"></script>
    <script src="/temas/3/js/TMForm.js"></script>
    <script src="/temas/3/js/modal.js"></script>

    <script>
        $(document).ready(function () {
            $('#camera_wrap').camera({
                loader: true,
                pagination: true,
                minHeight: '',
                thumbnails: false,
                height: '52.8735632183908%',
                caption: true,
                navigation: false,
                fx: 'simpleFade',
                onLoaded: function () {
                    $('.slider-wrapper')[0].style.height = 'auto';
                }
            });
            $("#tabs").tabs();
            $('#bookingForm').bookingForm({
                ownerEmail: '#'
            });
            $('#bookingForm2').bookingForm({
                ownerEmail: '#'
            });
        });
    </script>
    <script src="/temas/3/js/jquery.tabs.js"></script>

</head>

<body>

    @include('veiculos::temas.3.nav')
    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="grid_3">
                    <div class="left-block">
                        <div class="col-md-12">
                            <div class="footer-logo">
                                <a href="/" class="logo2">
                                    <img src="{!! verificaImagemSistem(( !empty($siteId['quaisDados']['logotipo']) ? $siteId['quaisDados']['logotipo'] : Null ),'veiculo_sem_foto.png') !!}" alt="" class="img-responsive" style="width: 85% !important;">
                                </a>
                            </div>
                            <div class="privacy" style="margin-top: 20px;">
                                <span>©&nbsp; </span>
                                <span class="copyright-year">{!! date('Y') !!}</span>
                                <span>&nbsp;</span>
                                <span>{!! !empty($siteId['name']) ? $siteId['name'] : trataTraducoes('site_name') !!}</span>
                                <hr>
                                <ul class="footer-menu-list">
                                    @foreach( $data['nav'] as $datas )
                                        <li><a href="{!! ( strlen($datas['url']) === 1 ? '/' : '/'.$datas['url'] ) !!}">{!! trataTraducoes($datas['label']) !!}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid_6">
                    <div class="right-block">
                        <div class="footer-menu" style="text-align: center">
                            <iframe src="{!! $data['settings']['localizacao']['url'] !!}" frameborder="0" scrolling="no"
                                width="90%" height="240px"></iframe>
                        </div>
                    </div>
                </div>
                <div class="grid_3">
                    <div class="footer-info">
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
    <script src="/temas/3/js/script.js"></script>

</body>
</html>