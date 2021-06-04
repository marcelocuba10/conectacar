<div class="item">
  <img src="{!! verificaImagemSistem(( !empty($retornaCarros['pegaFotos']) ? count($retornaCarros['pegaFotos']) > 0 ? $retornaCarros['pegaFotos'][0]['imagem'] : Null : Null )) !!}" alt="">
  <div class="slide-caption">
    <h3>{!! !empty($retornaCarros['ano']) ? $retornaCarros['ano'] : null !!}, {!! !empty($retornaCarros['nome']) ? $retornaCarros['nome'] : 'nome_veiculo' !!}</h3>
    <h4 class="second" style="color: white;">{!! !empty($retornaCarros['carroceria']) ? $retornaCarros['carroceria'] : 'carroceria' !!} <span class="price">{!! currencyToSystemDefaultBD(( !empty($retornaCarros['valor']) ? $retornaCarros['valor'] : 0 ),2,true) !!}</span></h4>
  </div>
</div>
