{!! !empty($dados['dados']['javascript']) ? $dados['dados']['javascript'] : Null !!}

<script src="/temas/inspinia/editor/ckeditor/ckeditor.js"></script>

<link href="/temas/inspinia/css/plugins/chosen/bootstrap-chosen.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/css/style.css?v={!! versaoSistema() !!}" rel="stylesheet">
<script src="/temas/inspinia/js/jquery-3.1.1.min.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/chosen/chosen.jquery.js?v={!! versaoSistema() !!}"></script>
<script src="/js/jquery.mask.js?v={!! versaoSistema() !!}"></script>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<h4 style="float: right;">@include('cabecalho')</h4>
				<div class="ibox-title">
					<h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
					<div class="ibox-tools" style="padding-right: 20px;">
						{!! ( !empty($dados['dados']['botoes_da_datatable']) ? $dados['dados']['botoes_da_datatable'] : Null ) !!}
					</div>
				</div>
				<div class="ibox-content">
					<form name="formulario" id="formulario" action="{!! url($dados['dados']['rota_geral']) !!}" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true">
						@csrf

						<div class="row">
							@foreach( $dados['data'] as $data )
							<div class="col-md-3" style="padding: 10px;">
								<div class="col-md-12" style="text-align: center; border:1px solid #cecece; padding: 5px;">
									<div class="col-md-12" style="font-weight: bold;">
										{!! $data['titulo'] !!}
									</div>
									<div class="col-md-12">&nbsp;</div>
									<div class="row">
										<div class="col-md-3"><label style="line-height:1"><input type="radio" name="veiculo_id[{!! $data['id'] !!}]" checked="checked" value="nao_informado" required="required"><br>N/I</label></div>
										<div class="col-md-3"><label style="line-height:1"><input type="radio" name="veiculo_id[{!! $data['id'] !!}]" value="ausente" required="required"><br>Ausente</label></div>
										<div class="col-md-3"><label style="line-height:1"><input type="radio" name="veiculo_id[{!! $data['id'] !!}]" value="ruim" required="required"><br>Ruim</label></div>
										<div class="col-md-3"><label style="line-height:1"><input type="radio" name="veiculo_id[{!! $data['id'] !!}]" value="bom" required="required"><br>Bom</label></div>
									</div>
								</div>
							</div>
							@endforeach
							<div class="col-md-12">&nbsp;</div>
							<div class="col-md-12">
								{!! montaCamposFormulario(['tamanhoCheio' => 0,'tamDiv' => 12, 'tipo' => 'BotaoModalSalvar','size'=>12,'icone' => 'fa fa-save','titulo' => ( empty($id) ? 'Salvar' : 'Atualizar' ),'cor' => ( empty($id) ? 'primary' : 'warning' )],'b') !!}
							</div>
						</div>

						<script src="/temas/inspinia/js/popper.min.js?v={!! versaoSistema() !!}"></script>
						<script src="/temas/inspinia/js/bootstrap.js?v={!! versaoSistema() !!}"></script>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.mascaraData').mask('11/11/1111');
		$('.mascaraTempo').mask('00:00:00');
		$('.mascaraDataTempo').mask('00/00/0000 00:00:00');
		$('.mascaraCep').mask('00000-000');
		$('.mascaraTelefone4').mask('0000-0000');
		$('.mascaraTelefone4DDD').mask('(00) 0000-0000');
		$('.mascaraTelefoneUS').mask('(000) 000-0000');
		$('.mascaraMixed').mask('AAA 000-S0S');
		$('.mascaraCPF').mask('000.000.000-00', {reverse: true});
		$('.mascaraMoeda').mask('000.000.000.000.000.00', {reverse: true});
	});
</script>

<div style="padding-right: 2px; width: 100%; float: left; display: none;">
	<div class="progress">
		<div class="bar"></div>
		<div class="percent"></div >
	</div>
</div>
<div id="status"></div>

<script src="/js/jquery.form.js?v={!! versaoSistema() !!}"></script>
<script>
	(function() {
		var status = $('#status');
		$('form#formulario').on('submit', function(){for ( instance in CKEDITOR.instances ) {CKEDITOR.instances[instance].updateElement();}})
		$('form').ajaxForm({
			beforeSend: function() {
				status.empty();
			},
			success: function() {
			},
			complete: function(xhr) {
				status.html(xhr.responseText);
			}
		}); 
	})();
</script>