<?php
/*
<div class="container">
<div class="row">
<div class="grid_8">
<p class="txt1">{!! trataTraducoes('Number 1 provider of <br>the gripping driving <br>experiences') !!}</p>
</div>
</div>
</div>
*/
?>


<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<div class="col-md-12" style="padding: 0px;">
	@if( count(retornaCarros()) > 0 )
	<div class="carousel slide" id="carousel-banner_01">
		<ol class="carousel-indicators">
			@foreach( retornaCarros() as $key => $banner )
			<li data-slide-to="{!! $key !!}" data-target="#carousel-banner_01" class="{!! $key === 0 ? 'active' : Null !!}"></li>
			@endforeach
		</ol>
		<div class="carousel-inner">
			@foreach( retornaCarros() as $key => $banner )
			<div class="carousel-item {!! $key === 0 ? 'active' : Null !!}">
				<img class="d-block w-100" alt="Carousel Bootstrap First" src="https://www.layoutit.com/img/sports-q-c-1600-500-1.jpg">
				<div class="carousel-caption">
					<h4>Nome</h4>
					<p>dados</p>
				</div>
			</div>
			@endforeach
		</div>
		<a class="carousel-control-prev" href="#carousel-banner_01" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
			<span class="sr-only">{!! trataTraducoes('Anterior') !!}</span>
		</a>
		<a class="carousel-control-next" href="#carousel-banner_01" data-slide="next">
			<span class="carousel-control-next-icon"></span>
			<span class="sr-only">{!! trataTraducoes('Próximo') !!}</span>
		</a>
	</div>
	@endif
</div>

<script src="/bootstrap/js/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>