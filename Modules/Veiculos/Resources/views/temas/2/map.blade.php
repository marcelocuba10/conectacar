<div class="wrapper marTop1">
    <div class="adress_section">
        <div class="adress_section_inner1">
            <p class="txt12">{!! !empty($siteId['name']) ? $siteId['name'] : 'nome_site' !!}</p>
        </div>
        <div class="adress_section_inner2">
            <p class="txt14">{!! !empty($data['settings']['site_endereco']) ? $data['settings']['site_endereco'] : 'site_endereco' !!}</p>
            <div class="phone_section">
                {!! !empty($data['settings']['site_telefone']) ? $data['settings']['site_telefone'] : 'site_telefone'!!}
            </div>
            <p class="txt14 color1">Email:  {!! !empty($data['settings']['site_email']) ? $data['settings']['site_email'] : 'site_email' !!}</p>
        </div>
    </div>
    <figure class="img_inner">
        <iframe src="{!! $data['settings']['localizacao']['url'] !!}" frameborder="0" scrolling="no"
        width="{!! $data['settings']['localizacao']['width'] !!}"
        height="{!! $data['settings']['localizacao']['height'] !!}"></iframe>    
    </figure>
</div>