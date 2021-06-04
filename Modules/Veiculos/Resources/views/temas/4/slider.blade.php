<div class="swiper-slide context-dark" data-slide-bg="{!! verificaImagemSistem(( !empty($retornaCarros['pegaFotos']) ? count($retornaCarros['pegaFotos']) > 0 ? $retornaCarros['pegaFotos'][0]['imagem'] : Null : Null )) !!}">
  <div class="swiper-slide-caption section-xl">
    <div class="container">
      <div class="row justify-content-center justify-content-lg-end">
        <div class="col-md-8 col-lg-5">
          <h1 data-caption-animate="fadeIn" data-caption-delay="100">{!! !empty($retornaCarros['nome']) ? $retornaCarros['nome'] : 'nome veiculo' !!}</h1>
          <h2 data-caption-animate="fadeIn" data-caption-delay="100">{!! !empty($retornaCarros['carroceria']) ? $retornaCarros['carroceria'] : 'carroceria' !!} </h2> <br>
          <h2 data-caption-animate="fadeIn" data-caption-delay="100">{!! currencyToSystemDefaultBD(( !empty($retornaCarros['valor']) ? $retornaCarros['valor'] : 0 ),2,true) !!}</h2>
        </div>
      </div>
    </div>
  </div>
</div>