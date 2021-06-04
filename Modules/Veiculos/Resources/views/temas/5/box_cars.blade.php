<div class="product-item product-item-center">
  <div class="img-block">
    <a href="/cars/details/{!! $retornaCarros['hash_id'] !!}">
      <img src="{!! verificaImagemSistem(( !empty($retornaCarros['pegaFotos']) ? count($retornaCarros['pegaFotos']) > 0 ? $retornaCarros['pegaFotos'][0]['imagem'] : Null : Null )) !!}" alt="" class="img-responsive" width="280" height="185" style="height: 185px;"/>
    </a>
  </div>
  <div class="caption">
    <p class="product-title">
      <a href="/cars/details/{!! $retornaCarros['hash_id'] !!}">{!! !empty($retornaCarros['nome']) ? $retornaCarros['nome'] : 'nome_veiculo' !!}</a>
    </p>
    <ul class="list-terms">
      <li>
        <dl>
          <dd><span class="first">{!! trataTraducoes('Km') !!}: <span class="highlighted">{!! !empty($retornaCarros['km']) ? $retornaCarros['km'] : 123 !!} km</span></span></dd>
        </dl>
      </li>
      <li>
        <dl>
          <dd><span class="second">{!! trataTraducoes('Anho') !!}: <span class="highlighted">{!! !empty($retornaCarros['ano']) ? $retornaCarros['ano'] : 2021 !!}</span></span></dd>
        </dl>
      </li>
      <li>
        <dl>
          <dd><span class="second">{!! trataTraducoes('Preco') !!}: <span class="second">{!! currencyToSystemDefaultBD(( !empty($retornaCarros['valor']) ? $retornaCarros['valor'] : 0 ),2,true) !!}</span></span></dd>
        </dl>
      </li>
    </ul>
    <a class="button button-primary button-circle" href="/cars/details/{!! $retornaCarros['hash_id'] !!}">{!! trataTraducoes("Detalhes") !!}</a>
  </div>
</div>