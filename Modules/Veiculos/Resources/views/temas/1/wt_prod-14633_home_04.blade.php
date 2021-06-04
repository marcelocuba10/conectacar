<div id="best" class="section section-md best novi-background bg-cover">
	<div class="container">
		<div class="section-title-md">
			{!! trataTraducoes('Últimas inclusões') !!}
		</div>
		<div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs-1">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="tabs-1-1">
					<div class="row row-fix">
						<div class="col-sm-12 col-md-12">
							<div class="row">
								@foreach( retornaCarros() as $key => $retornaCarros )
								@include('veiculos::temas.1.cars_box',compact('retornaCarros'))
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>