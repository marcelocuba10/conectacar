<div class="grid_3" style="margin-top: 30px;">
  <div class="box1">
    <h4 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
      <a href="/cars/details/{!! $retornaCarros['hash_id'] !!}">{!! !empty($retornaCarros['nome']) ? $retornaCarros['nome'] : 'nome_veiculo' !!}</a>
    </h4>
    <a href="/cars/details/{!! $retornaCarros['hash_id'] !!}">
      <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="{!! verificaImagemSistem(( !empty($retornaCarros['pegaFotos']) ? count($retornaCarros['pegaFotos']) > 0 ? $retornaCarros['pegaFotos'][0]['imagem'] : Null : Null )) !!}" alt="" width="" height="180" />
    </a>
    <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
      <span class="first">{!! trataTraducoes('Km') !!}: <span class="highlighted">{!! !empty($retornaCarros['km']) ? $retornaCarros['km'] : 123 !!} km</span></span>
      <span class="second">{!! trataTraducoes('Anho') !!}: <span class="highlighted">{!! !empty($retornaCarros['ano']) ? $retornaCarros['ano'] : 2021 !!}</span></span>
      <div class="clearfix"></div>
    </div>
    <div class="info2 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
      <div class="price">
        <span class="first">{!! trataTraducoes('Valor') !!}:</span>
        <span class="second">{!! currencyToSystemDefaultBD(( !empty($retornaCarros['valor']) ? $retornaCarros['valor'] : 0 ),2,true) !!}</span>
      </div>
      <a class="btn-default" href="/cars/details/{!! $retornaCarros['hash_id'] !!}">
        <span>{!! trataTraducoes('Detalhes') !!}</span>
      </a>
      <div class="clearfix"></div>
    </div>
  </div>
</div>