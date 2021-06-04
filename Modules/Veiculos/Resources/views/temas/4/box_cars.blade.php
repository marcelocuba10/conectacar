<div class="col-md-6 col-lg-3">
  <div class="thumbnail-classic">
    <a class="thumbnail-classic-link" href="/cars/details/{!! $retornaCarros['hash_id'] !!}">
        <img src="{!! verificaImagemSistem(( !empty($retornaCarros['pegaFotos']) ? count($retornaCarros['pegaFotos']) > 0 ? $retornaCarros['pegaFotos'][0]['imagem'] : Null : Null )) !!}" alt="" class="img-responsive" width="370" height="175" style="height: 180px;" />
      <span class="icon novi-icon fa fa-expand"></span>
    </a>
    <div class="thumbnail-classic-caption">
        <h3 class="thumbnail-classic-title"><span class="text-primary"><a href="/cars/details/{!! $retornaCarros['hash_id'] !!}">{!! !empty($retornaCarros['nome']) ? $retornaCarros['nome'] : 'nome_veiculo' !!}</a></span></h3>
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
        <a style="font-size: xx-large;" class="icon icon-xl novi-icon fa fa-angle-right button-arrow" href="/cars/details/{!! $retornaCarros['hash_id'] !!}"></a>
    </div>
  </div>
</div>