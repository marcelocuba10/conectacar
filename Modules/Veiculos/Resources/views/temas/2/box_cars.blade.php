<div class="grid_4">
    <div>
        <a href="/cars/details/{!! $retornaCarros['hash_id'] !!}" class="link_img">
            <div class="img_section">
                <img src="{!! verificaImagemSistem(( !empty($retornaCarros['pegaFotos']) ? count($retornaCarros['pegaFotos']) > 0 ? $retornaCarros['pegaFotos'][0]['imagem'] : Null : Null )) !!}" alt="" width="370" height="250" style="height: 250px;">
                <div class="img_section_txt">
                    <p class="txt8"><span class="txt9">{!! currencyToSystemDefaultBD(( !empty($retornaCarros['valor']) ? $retornaCarros['valor'] : 0 ),2,true) !!}</span> {!! !empty($retornaCarros['km']) ? $retornaCarros['km'] : 123 !!} KM</p>
                </div>
                <div class="img_more_btn_section">
                    <div href="/cars/details/{!! $retornaCarros['hash_id'] !!}" class="more_btn3">{!! trataTraducoes('Detalhes') !!}</div>
                </div>
            </div>
        </a>
        <p class="txt10"><a href="/cars/details/{!! $retornaCarros['hash_id'] !!}" class="link">{!! !empty($retornaCarros['nome']) ? $retornaCarros['nome'] : trataTraducoes("Nome_veiculo") !!}</a></p>
    </div>
</div>