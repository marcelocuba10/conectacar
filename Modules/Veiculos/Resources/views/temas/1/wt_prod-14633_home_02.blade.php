<div class="section-title-md">
    {!! trataTraducoes('Mais acessados') !!}
</div>

@foreach( veiculosMaisVistos(4) as $retornaCarros )
@include('veiculos::temas.1.cars_box',compact('retornaCarros'))
@endforeach

<?php
/*


<div class="col-sm-4">
    <div class="product-item-classic">
        <div class="thumbnail clearfix">
            <figure class="product-item-img">
                <a href="/detail">
                    <img src="{!! verificaImagemSistem(( !empty($conteudo['imagem']) ? $conteudo['imagem'] : Null )) !!}" alt="" class="img-responsive">
                </a>
            </figure>
            <div class="caption">
                <div class="rating-block">
                    <span class="rating-text">{!! !empty($conteudo['titulo']) ? $conteudo['titulo'] : Null !!}</span>
                </div>
                <div class="product-item-title">{!! !empty($conteudo['subtitulo']) ? $conteudo['subtitulo'] : Null !!}</div>
                <div class="product-item-text">{!! !empty($conteudo['conteudo']) ? $conteudo['conteudo'] : Null !!}</div>
            </div>
        </div>
    </div>
</div>


<div class="link">
<a href="/detail" class="btn-default btn1">
<span>READ MORE</span>
</a>
</div>
*/
?>