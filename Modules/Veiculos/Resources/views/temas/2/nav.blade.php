<div class="header_section_top" style="background: #434343;height: 33px;text-align: end;">
    <div class="container">
        <div class="row" style="margin-top: 7px;">
            <div class="info-address" style="color:#d5d5d5">
                <span aria-hidden="true" class="fa fa-map-marker novi-icon"></span>
                {!! !empty($siteId['quaisDados']['endereco']) ? $siteId['quaisDados']['endereco'] : trataTraducoes('site_endereco') !!}
                <span style="margin-left: 15px;" aria-hidden="true" class="fa fa-user novi-icon"><a style="color:#d5d5d5;text-decoration: unset;" href="/login">&nbsp&nbsp{!! trataTraducoes("Entrar") !!}</a></span>
            </div>
        </div>
    </div>
</div>
<div class="header_section_top">
    <div class="container">
        <h1><a href="/2"><img style="width: 229px; height:62px" src="{!! verificaImagemSistem(( !empty($data['settings']['site_logo']) ? $data['settings']['site_logo'] : Null ),'veiculo_sem_foto.png') !!}" alt="{!! $siteId['name'] !!}"></a></h1>
        <nav>
            <ul class="sf-menu header_menu">
                @foreach( $data['nav'] as $datas )
                    <li class="{!! Request::is($datas['url']) ? 'current' : Null !!}"><a href="{!! ( strlen($datas['url']) === 1 ? '/' : '/'.$datas['url'] ) !!}"><span></span>{!! trataTraducoes($datas['label']) !!}<strong></strong></a></li>
                @endforeach
            </ul>
        </nav>
    </div>
</div>