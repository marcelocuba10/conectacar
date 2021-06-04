<div class="col-sm-6 col-lg-3 wow fadeIn">
  <article class="post-creative">
      <a class="post-creative-image" href="/cars/details/{!! $retornaCarros['hash_id'] !!}" style="background-image: url({!! verificaImagemSistem(( !empty($retornaCarros['pegaFotos']) ? count($retornaCarros['pegaFotos']) > 0 ? $retornaCarros['pegaFotos'][0]['imagem'] : Null : Null )) !!});"></a>
      <div class="post-creative-main">
          <p class="post-creative-title">
            <a href="/cars/details/{!! $retornaCarros['hash_id'] !!}">{!! !empty($retornaCarros['nome']) ? $retornaCarros['nome'] : trataTraducoes("Nome_veiculo") !!}</a>
          </p>
          <p class="txt8"><span class="txt9">{!! currencyToSystemDefaultBD(( !empty($retornaCarros['km']) ? $retornaCarros['km'] : 0 ),2,true) !!} km</span> / {!! !empty($retornaCarros['ano']) ? $retornaCarros['ano'] : 2020 !!}</p>
          <p class="box-detail">{!! !empty($retornaCarros['pegaCombustivel']) ? $retornaCarros['pegaCombustivel'] : trataTraducoes("Combustivel") !!}</p>
          <a href="/cars/details/{!! $retornaCarros['hash_id'] !!}">
            <p class="tour-modern-rating box-detail">{!! currencyToSystemDefaultBD(( !empty($retornaCarros['valor']) ? $retornaCarros['valor'] : 0 ),2,true) !!}</p>
          </a>
      </div>
  </article>
</div>