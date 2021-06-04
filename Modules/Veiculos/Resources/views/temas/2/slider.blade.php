<div class="mySlides fade" style="text-align: center;background-color: #141921;">
    <img src="{!! verificaImagemSistem(( !empty($retornaCarros['pegaFotos']) ? count($retornaCarros['pegaFotos']) > 0 ? $retornaCarros['pegaFotos'][0]['imagem'] : Null : Null )) !!}" style="width:75%;height: 450px;">
    <div class="text">
        <p class="txt12">{!! !empty($retornaCarros['nome']) ? $retornaCarros['nome'] : 'nome_veiculo' !!}</p>
        <p class="subtext-slider">{!! !empty($retornaCarros['km']) ? $retornaCarros['km'] : 'km' !!} km /<span class="price">{!! currencyToSystemDefaultBD(( !empty($retornaCarros['valor']) ? $retornaCarros['valor'] : 0 ),2,true) !!}</p>
    </div>
</div>
