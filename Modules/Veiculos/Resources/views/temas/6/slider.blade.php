<div class="swiper-slide context-dark bg-overlay-4" data-slide-bg="{!! verificaImagemSistem(( !empty($retornaCarros['pegaFotos']) ? count($retornaCarros['pegaFotos']) > 0 ? $retornaCarros['pegaFotos'][0]['imagem'] : Null : Null )) !!}">
    <div class="swiper-slide-caption section-xxl">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-7 col-xxl-6">
                    <div class="inset-6">
                        <div class="box-decorative" data-caption-animate="fadeInUp" data-caption-delay="100" data-caption-duration="900">
                            <span class="box-decorative-divider"></span>
                            <h2><span class="big">{!! !empty($retornaCarros['ano']) ? $retornaCarros['ano'] : 2020 !!}, {!! !empty($retornaCarros['nome']) ? $retornaCarros['nome'] : 'nome_veiculo' !!}</span></h2>
                        </div>
                        <h3 class="big" data-caption-animate="fadeInUp"
                            data-caption-delay="250" data-caption-duration="900"
                            style="max-width: 500px">{!! !empty($retornaCarros['carroceria']) ? $retornaCarros['carroceria'] : 'carroceria' !!}</h3>
                        <h3 class="big" data-caption-animate="fadeInUp"
                            data-caption-delay="250" data-caption-duration="900"
                            style="max-width: 500px">{!! currencyToSystemDefaultBD(( !empty($retornaCarros['valor']) ? $retornaCarros['valor'] : 0 ),2,true) !!}</h3>
                        <div class="inset-5 mt-26"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-slide-lines" data-caption-animate="fadeInLeft" data-caption-delay="100" data-caption-duration="900">
        <div class="swiper-slide-line">
            <div class="swiper-slide-line-stroke swiper-slide-line-stroke-1"></div>
            <div class="swiper-slide-line-stroke swiper-slide-line-stroke-2"></div>
        </div>
        <div class="swiper-slide-line">
            <div
                class="swiper-slide-line-stroke swiper-slide-line-stroke-3 swiper-slide-line-stroke-skew">
            </div>
        </div>
    </div>
</div>

