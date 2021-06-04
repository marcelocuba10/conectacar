<?php
$imagem = (!empty($conteudo) ? json_decode($conteudo['imagem'],true) : []);
$nome = (!empty($conteudo) ? json_decode($conteudo['nome'],true) : []);
$depoimento = (!empty($conteudo) ? json_decode($conteudo['depoimento'],true) : []);
?>

<section class="parallax-container" data-parallax-img="images/bg-image-1.jpg">
    <div class="material-parallax parallax"><img src="/temas/4/images/bg-image-1.jpg" alt=""
            style="display: block; transform: translate3d(-50%, 325px, 0px);"></div>
    <div class="parallax-content section section-lg context-dark bg-overlay bg-overlay-2">
        <div class="container">
            <h2>{{ trataTraducoes("DEPOIMENTOS") }}</h2>
            <div class="row row-40">
                @forelse( $depoimento as $key => $conteudo )
                <div class="col-md-6 col-lg-4">
                    <div class="unit unit-spacing-md box-testimonials">
                        <div class="unit-left"><span class="icon novi-icon icon-xl-1 fa fa-quote-left"></span></div>
                        <div class="unit-body">
                            <p>{!! !empty($depoimento[$key]) ? $depoimento[$key] : 'depoimento-body' !!}</p>
                            <h4 class="box-testimonials-title">{!! !empty($nome[$key]) ? $nome[$key] : 'depoimento-título' !!}</h4>
                        </div>
                    </div>
                </div>
                @empty
                -
                @endforelse
            </div>
        </div>
    </div>
</section>