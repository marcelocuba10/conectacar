<div id="wrapper" style="background-image: url('{!! site_id()['fundo'] !!}'); background-size: auto 100% !important; background-repeat: no-repeat !important;">
	@include('temas.inspinia.menu')
	<div id="page-wrapper" class="gray-bg dashbard-1">
		@include('temas.inspinia.navegacaotopo')
		<section class="content" id="destinoHtml" style="margin-top: -20px !important;">
			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-lg-12">
						<div class="wrapper wrapper-content">
							<div class="row">
								
								<div class="col-lg-12"><div class="ibox "><h5>{!! trataTraducoes('Veja como está sua empresa hoje') !!}</h5></div></div>

								<div class="col-md-4">
									@include('temas.inspinia.widgets.dashboard_v4_1',['titulo' => 'Veículos','subtitulo' => 'Disponíveis','conteudo' => $data['data']['totalVeiculos'],'cor'=>'primary'])
								</div>
								<div class="col-md-4">
									@include('temas.inspinia.widgets.dashboard_v4_1',['titulo' => 'Veículos','subtitulo' => 'Visualizados','conteudo' => $data['data']['veiculosVisualizados'],'cor'=>'info'])
								</div>
								<div class="col-md-4">
									@include('temas.inspinia.widgets.dashboard_v4_1',['titulo' => 'Visitas','subtitulo' => 'Site','conteudo' => $data['data']['visitasNoSite'],'cor'=>'success'])
								</div>
								<div class="col-md-3">
									@include('temas.inspinia.widgets.dashboard_v4_1',['titulo' => 'Veículos','subtitulo' => 'Vendidos em '.date('y / m'),'conteudo' => $data['data']['mesesPercorridos'][0]['total'],'cor'=>'primary'])
								</div>
								<div class="col-md-3">
									@include('temas.inspinia.widgets.dashboard_v4_1',['titulo' => 'Mensagens','subtitulo' => 'Enviadas','conteudo' => $data['data']['mensagensEnviadasTotal'],'cor'=>'default'])
								</div>
								<div class="col-md-3">
									@include('temas.inspinia.widgets.dashboard_v4_1',['titulo' => 'A receber','subtitulo' => 'Contas','conteudo' => $data['data']['contasReceber'],'cor'=>'primary'])
								</div>
								<div class="col-md-3">
									@include('temas.inspinia.widgets.dashboard_v4_1',['titulo' => 'A pagar','subtitulo' => 'Contas','conteudo' => $data['data']['contasPagar'],'cor'=>'danger'])
								</div>
								
								<div class="col-lg-12"><div class="ibox "><h5></h5></div></div>
								<div class="col-lg-12"><div class="ibox "><h5>{!! trataTraducoes('Histórico de vendas nos últimos 12 meses') !!}</h5></div></div>

								@foreach( $data['data']['mesesPercorridos'] as $key => $meses )
								@if( $key > 0 )
								<div class="col-md-2">
									@include('temas.inspinia.widgets.dashboard_v4_1',['titulo' => 'Vendas','subtitulo' => dateCalculate($meses['ini'],0,'d','y - m'),'conteudo' => $meses['total'],'cor'=>'info'])
								</div>
								@endif
								@endforeach

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="footer">
			<div class="float-right">&copy; Copyright {!! date('Y') !!} {!! site_id()['name'] !!} - {!! trataTraducoes('Todos os direitos reservados') !!}</div>
		</div>
	</div>
</div>