<div id="welcome" class="section text-center">
    <section class="parallax-container parallax1" data-parallax-img="{!! !empty($conteudo['fundo']) ? $conteudo['fundo'] : Null !!}">
        <div class="parallax-content">
            <div class="container">
                <div class="brand">
                    @if(!empty($conteudo['site_logo']))
                    <img src="{!! verificaImagemSistem(( !empty($conteudo['site_logo']) ? $conteudo['site_logo'] : Null )) !!}" alt="" class="img-responsive">
                    @endif
                </div>
                <div class="section-title">{!! !empty($conteudo['titulo']) ? $conteudo['titulo'] : Null !!}</div>
                <div class="row ">
                    <div class="col-sm-12">
                        <h2 class="text-accent">{!! !empty($conteudo['subtitulo']) ? $conteudo['subtitulo'] : Null !!}</h2>
                        <p class="text-block-center">{!! !empty($conteudo['conteudo']) ? $conteudo['conteudo'] : Null !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>