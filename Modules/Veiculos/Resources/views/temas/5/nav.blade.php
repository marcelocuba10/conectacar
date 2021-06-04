<div class="rd-navbar-wrap">
  <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
    data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
    data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static"
    data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-md-stick-up-offset="42px"
    data-lg-stick-up-offset="42px" data-xl-stick-up-offset="42px" data-xxl-stick-up-offset="42px" data-stick-up="true"
    data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true"
    data-xxl-stick-up="true">
    <div class="rd-navbar-collapse-toggle" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
    <div class="rd-navbar-top-panel rd-navbar-collapse toggle-original-elements">
      <div class="rd-navbar-top-panel-inner">
        <address class="contact-info">
          <ul class="group-lg">
            <li>
              <div class="unit align-items-center flex-row unit-spacing-xs align-items-sm-start">
                <div class="unit-left"><span class="icon text-middle material-icons-location_on"></span></div>
                <div class="unit-body">
                  <div class="p">{!! !empty($siteId['quaisDados']['endereco']) ? $siteId['quaisDados']['endereco'] : trataTraducoes('Endereco nao disponivel') !!}</div>
                </div>
              </div>
            </li>
            <li>
              <div class="unit align-items-center flex-row unit-spacing-xs align-items-sm-start">
                <div class="unit-left"><span class="icon text-middle material-icons-phone_iphone"></span></div>
                <div class="unit-body">
                  <div class="p"><a class="text-middle">{!! !empty($siteId['quaisDados']['fone_1']) ? $siteId['quaisDados']['fone_1'] : trataTraducoes('Telefone nao disponivel') !!}</a></div>
                </div>
              </div>
            </li>
          </ul>
        </address>
        <ul class="icon-block list-inline">
          <li><a class="icon material-icons-person" style="color: #dee2e6;" href="/login">&nbsp;{!! trataTraducoes('Entrar') !!}</a></li>
        </ul>
      </div>
    </div>
    <div class="rd-navbar-inner">
      <div class="rd-navbar-panel">
        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
        <div class="rd-navbar-brand"><a class="brand" href="/4"><img class="brand-logo-dark"
              src="{!! verificaImagemSistem(( !empty($siteId['quaisDados']['logotipo']) ? $siteId['quaisDados']['logotipo'] : Null ),'veiculo_sem_foto.png') !!}" alt=""
              width="238" height="34" /></a></div>
      </div>
      <div class="rd-navbar-aside-right">
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
  </nav>
</div>