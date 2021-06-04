@extends('veiculos::temas.1.app')
@section('content')

<section class="section section-xs bg-default">
	@include('veiculos::temas.1.breadcrumb',['dados' => ['Quem Somos']])
	<div class="container">
		<div class="row row-30 justify-content-center">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding: 0px 30px 0px 30px;">
				<div class="row row-30">
					<div class="col-xl-12">
						<div class="box-cars-pa">
							<div class="row">
							@foreach( $data['conteudo'] as $key => $datas )
							@include('veiculos::temas.1.'.$datas['layout'])
							@endforeach
							</div>
						</div>
					</div>
					<div class="col-xl-12">&nbsp;</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection