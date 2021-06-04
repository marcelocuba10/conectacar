@extends('veiculos::temas.'.$siteId['tema'].'.app')
@section('content')

<section class="section section-xs bg-default">
    <div class="container">
        <div class="row row-30 flex-xl-row-reverse">
            <div class="col-xl-10">
                <div class="row row-ten row-30">
                    @include('veiculos::temas.'.$siteId['tema'].'.banner_home')
                    <div class="col-lg-8">
                        <div class="tabs-custom tabs-horizontal tabs-products" id="tabs-1">
                            <div class="tab-content">
                                <div class="tab-pane fade">
                                    <div class="row row-30">
                                        @foreach( listaVeiculos() as $key => $data )
                                            @include('veiculos::temas.0.cars_box', compact('data'))
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <a class="button button-primary button-ujarak" href="/cars">{!! trataTraducoes('Lista completa') !!}</a>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="row row-30">
                            <div class="col-sm-7 col-md-6 col-lg-4 col-xl-12">
                                <div class="banner">
                                    <div class="banner-image" style="background-image: url('/temas/{!! $siteId['tema'] !!}/images/banner-01-310x232.jpg')"></div>
                                    <div class="banner-body">
                                        <h5 class="banner-title"><a href="new-cars.html">{!! trataTraducoes("Grande variedade de modelos e preços.") !!}</a></h5>
                                        <p class="banner-text">{!! trataTraducoes("Adquirir um novo veículo nunca foi tão fácil e simples") !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 col-lg-4 col-xl-12">
                                <div class="cta">
                                    <div class="cta-image" style="background-image: url('/temas/{!! $siteId['tema'] !!}/images/cta-01-235x325.jpg')"></div>
                                    <div class="cta-body">
                                        <div class="cta-title">{!! trataTraducoes("Publique seu veículo") !!}:</div><a class="cta-tel" href="https://wa.me/+595984124580">{!! !empty($siteId['quaisDados']['fone_1']) ? $siteId['quaisDados']['fone_1'] : trataTraducoes('site_telefone') !!}</a>
                                        <p class="cta-text">{!! trataTraducoes("Contrate um plano básico conosco e comece a publicar seus veículos!") !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2">
                <div class="row row-30">
                    <div class="col-12 col-lg-4 col-xl-12 rd-navbar-link-toggle">
                        @include('veiculos::temas.'.$siteId['tema'].'.busca_esquerda')
                    </div>
                    <div class="col-sm-7 col-md-6 col-lg-4 col-xl-12">
                        <div class="banner">
                            <div class="banner-image" style="background-image: url('/temas/{!! $siteId['tema'] !!}/images/banner_lateral_conectacar.png')"></div>
                            <div class="banner-body">
                                <h5 class="banner-title"><a href="new-cars.html">{!! trataTraducoes("Presença na internet é importante.") !!}</a></h5>
                                <p class="banner-text">{!! trataTraducoes("Se você se anuncia, tem a possibilidade de atingir um grande público.") !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-lg-4 col-xl-12">
                        <div class="cta">
                            <div class="cta-image" style="background-image: url('/temas/{!! $siteId['tema'] !!}/images/cta-01-235x325.jpg')"></div>
                            <div class="cta-body">
                                <div class="cta-title">{!! trataTraducoes("Contate-nos") !!}:</div><a class="cta-tel" href="https://wa.me/+595984124580">{!! !empty($siteId['quaisDados']['fone_1']) ? $siteId['quaisDados']['fone_1'] : trataTraducoes('site_telefone') !!}</a>
                                <p class="cta-text">{!! trataTraducoes("Nossa equipe de atendimento está sempre pronta para esclarecer suas dúvidas.") !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection