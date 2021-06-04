<div class="grid_4">
    <div>
        <a href="/tema/detail" class="link_img">
            <div class="img_section">
                <img src="{!! verificaImagemSistem("image") !!}" alt="">
                <div class="img_section_txt">
                    <p class="txt8"><span class="txt9">{!! currencyToSystemDefaultBD(!empty($data['valor']) ? $data['valor'] : null) !!}</span> {!! !empty($data['km']) ? $data['km'] : null !!} KM</p>
                </div>
                <div class="img_more_btn_section">
                    <div href="/tema/details" class="more_btn3">{!! trataTraducoes('Details') !!}</div>
                </div>
            </div>
        </a>
        <p class="txt10"><a href="#" class="link">{!! !empty($data['nome']) ? $data['nome'] : 'nome_veiculo' !!}</a></p>
    </div>
</div>