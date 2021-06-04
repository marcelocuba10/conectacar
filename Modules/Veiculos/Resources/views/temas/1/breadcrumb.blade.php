<div class="breadcrumbs1_wrapper novi-background">
	<div class="container">
		<div class="breadcrumbs1">
			<a href="/">{!! trataTraducoes('Início') !!}</a>
			@foreach( $dados as $key => $dado )
			<span></span>
				{!! trataTraducoes($dado) !!}
			@endforeach
		</div>
	</div>
</div>