<div class="rd-navbar-wrap rd-navbar-wrap-mod-1">
    <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
      data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed"
      data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed"
      data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static"
      data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px"
      data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
        <div class="rd-navbar-main-outer">
            <div class="rd-navbar-main">
                <div class="rd-navbar-panel">
                    <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                    <div class="rd-navbar-brand">
                        <a class="brand" href="/">
                            <img class="brand-logo-dark" src="{!! verificaImagemSistem(( !empty($siteId['quaisDados']['logotipo']) ? $siteId['quaisDados']['logotipo'] : Null ),'veiculo_sem_foto.png') !!}" alt="" width="134" height="25"/>
                            <img class="brand-logo-light" src="{!! verificaImagemSistem(( !empty($siteId['quaisDados']['logotipo']) ? $siteId['quaisDados']['logotipo'] : Null ),'veiculo_sem_foto.png') !!}" alt="" width="125" height="23"/>
                        </a>
                    </div>
                </div>
                <div class="rd-navbar-right">
                    <div class="rd-navbar-nav-wrap">
                        <ul class="rd-navbar-nav">
                            @foreach( $data['nav'] as $datas )
                                <li class="rd-nav-item {!! Request::is($datas['url']) ? 'active' : Null !!}">
                                    <a class="rd-nav-link" href="{!! ( strlen($datas['url']) === 1 ? '/' : '/'.$datas['url'] ) !!}">{!! trataTraducoes($datas['label']) !!}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="rd-navbar-search toggle-original-elements">
                        <a class="rd-navbar-search-toggle" style="color: #dee2e6;font-size: large;" href="/login"><i class="fa fa-user rd-navbar-search-toggle" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
  </nav>
</div>