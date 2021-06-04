<div class="header_section_top">
    <div class="container">
        <h1><a href="/"><img src="{!! $siteId['logotipo'] !!}" alt="{!! $siteId['name'] !!}"></a></h1>
        <nav>
            <ul class="sf-menu header_menu">
                @foreach( $data['nav'] as $datas )
                <li class="{!! Request::is($datas['url']) ? 'current' : Null !!}"><a href="{!! ( strlen($datas['url']) === 1 ? '/' : '/'.$datas['url'] ) !!}"><span></span>{!! trataTraducoes($datas['label']) !!}<strong></strong></a></li>
                @endforeach
            </ul>
        </nav>
    </div>
</div>