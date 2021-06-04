<?php
    $imagem = (!empty($conteudo) ? json_decode($conteudo['imagem'],true) : []);
    $nome = (!empty($conteudo) ? json_decode($conteudo['nome'],true) : []);
    $depoimento = (!empty($conteudo) ? json_decode($conteudo['depoimento'],true) : []);
?>

<div class="owl-carousel carousel-type-1" data-items="1" data-md-items="2" data-lg-items="3" data-dots="true" data-nav="false" data-stage-padding="15" data-loop="false" data-margin="30" data-mouse-drag="false">
    @forelse( $depoimento as $key => $conteudo )
      <div class="team-item">
        <div class="img-block">
          <img src="{!! !empty($imagem[$key]) ? $imagem[$key] : Null !!}" alt="" width="125" height="125"/>
        </div>
        <div class="caption">
          <h5>{!! !empty($nome[$key]) ? $nome[$key] : Null !!}</h5>
          <p class="small">Cliente</p>
          <p class="text">{!! !empty($depoimento[$key]) ? $depoimento[$key] : Null !!}</p>
        </div>
      </div>
    @empty
      -
    @endforelse
</div>