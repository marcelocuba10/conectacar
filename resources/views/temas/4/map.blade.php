<div class="wrapper marTop1">
    <div class="adress_section">
        <div class="adress_section_inner1">
            <p class="txt12">{!! !empty($siteId['name']) ? $siteId['name'] : 'nome_site' !!}</p>
        </div>
        <div class="adress_section_inner2">
            <p class="txt14">{!! !empty($siteId['quaisDados']['endereco']) ? $siteId['quaisDados']['endereco'] : 'endereco'  !!}, {!! !empty($siteId['quaisDados']['numero']) ? $siteId['quaisDados']['numero'] : 'numero' !!}</p>
            <div class="phone_section">
                {!! !empty($data['settings']['site_telefone']) ? $data['settings']['site_telefone'] : 'site_telefone'!!}
            </div>
            <p class="txt14 color1">Email:  {!! !empty($data['settings']['email']) ? $data['settings']['email'] : 'email'!!}</p>
        </div>
    </div>
    <figure class="img_inner">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d24214.807650104907!2d-73.94846048422478!3d40.65521573400813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1395650655094" style="border:0"></iframe>
    </figure>
</div>