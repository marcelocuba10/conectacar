<nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
    data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed"
    data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static"
    data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px"
    data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true"
    data-xxl-stick-up="true">
    <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse">
        <span></span>
    </div>
    <div class="rd-navbar-aside-outer rd-navbar-collapse bg-default">
        <div class="rd-navbar-aside">
            <div class="rd-navbar-brand">
                <a class="brand" href="/">
                    <img style="max-height: 75px;max-width: 170px;" class="brand-logo-dark" src="{!! verificaImagemSistem(( !empty($siteId['quaisDados']['logotipo']) ? $siteId['quaisDados']['logotipo'] : Null ),'veiculo_sem_foto.png') !!}" alt="" width="238" height="34" />
                </a>
            </div>
            <div class="rd-navbar-aside-right">
                <ul class="list-inline list-inline-md list-inline-navbar">
                    <li>
                        <div class="unit unit-spacing-xs-2">
                            <div class="unit-left">
                                <div class="icon novi icon icon-gray-300 icon-sm-1 fa fa-envelope"></div>
                            </div>
                            <div class="unit-body">
                                <a style="color: #ff5639;" class="link-mail">{!! !empty($siteId['email']) ? $siteId['email'] : trataTraducoes('Email nao disponivel') !!}</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="unit unit-spacing-xs-4 align-items-center">
                            <div class="unit-left">
                                <div class="icon novi icon icon-gray-300 icon-lg fa fa-mobile"></div>
                            </div>
                            <div class="unit-body">
                                <a style="color: #ff5639;" class="link-tel">{!! !empty($siteId['quaisDados']['fone_1']) ? $siteId['quaisDados']['fone_1'] : trataTraducoes('Telefone nao disponivel') !!}</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="unit unit-spacing-xs-2">
                            <div class="unit-left">
                                <div class="icon novi icon icon-gray-300 icon-sm-1 fa fa-user"></div>
                            </div>
                            <div class="unit-body">
                                <a style="color: #4b4847;" href="/login" class="link-mail">Entrar</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="rd-navbar-main-outer">
        <div class="rd-navbar-main">
            <div class="rd-navbar-panel">
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <div class="rd-navbar-brand">
                    <a class="brand" href="/4"><img class="brand-logo-dark" src="{!! verificaImagemSistem(( !empty($siteId['quaisDados']['logotipo']) ? $siteId['quaisDados']['logotipo'] : Null ),'veiculo_sem_foto.png') !!}" alt="" width="238" height="34" /></a>
                </div>
            </div>
            <div class="rd-navbar-main-element">
                <div class="rd-navbar-nav-wrap">
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