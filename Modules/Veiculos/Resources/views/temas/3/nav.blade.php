<header id="header">
  <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
    <div class="width-wrapper">
      <h1>
        <a class="brand" href="/4"><img style="vertical-align: inherit;" class="brand-logo-dark" src="{!! verificaImagemSistem(( !empty($siteId['quaisDados']['logotipo']) ? $siteId['quaisDados']['logotipo'] : Null ),'veiculo_sem_foto.png') !!}" alt="" width="238" height="34" /></a>
      </h1>
      <div class="authorization-block">
        <a style="margin-top: 2px;" class="create">{!! !empty($siteId['quaisDados']['fone_1']) ? $siteId['quaisDados']['fone_1'] : trataTraducoes('Telefone nao disponivel') !!}</a>
        <div class="authorization">
          <span class="divider"></span>
          <a class="create">{!! !empty($siteId['email']) ? $siteId['email'] : trataTraducoes('Email nao disponivel') !!}</a>
          <span class="divider"></span>
          <a class="login" href="/login">{!! trataTraducoes("Login") !!}</a>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div id="stuck_container">
    <div class="width-wrapper">
      <nav>
        <ul class="sf-menu">
          @foreach( $data['nav'] as $datas )
            <li class="{!! Request::is($datas['url']) ? 'current' : Null !!}">
              <a href="{!! ( strlen($datas['url']) === 1 ? '/' : '/'.$datas['url'] ) !!}">{!! trataTraducoes($datas['label']) !!}</a>
            </li>
          @endforeach
        </ul>
      </nav>
      <div class="clearfix"></div>
    </div>
  </div>
</header>