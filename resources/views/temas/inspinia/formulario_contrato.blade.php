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
					<div class="ibox-tools" style="padding-right: 5px;">
						@if( empty($dados['dados']['botao_listagem']) )
						{!! montaCamposFormulario(['cor'=>'warning','url'=>( !empty($dados['dados']['rota_geral_voltar']) ? $dados['dados']['rota_geral_voltar'] : $dados['dados']['rota_geral'] ),'tipo'=>'LinkGeralIcone','titulo'=>'Voltar para a listagem','icone'=>'fa fa-list'],'b') !!}
						@endif
						{!! ( !empty($dados['dados']['botoes_da_datatable']) ? $dados['dados']['botoes_da_datatable'] : Null ) !!}
					</div>
				</div>
				<div class="ibox-content">
					<form name="formulario" id="formulario" action="{!! url($dados['dados']['rota_geral']) !!}" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true">
						@csrf
						@foreach( $dados['formulario'] as $formulario )
						{!! $formulario !!}
						@endforeach
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function calculaGeral(){
		var total01,total1,total02,total2,parcela,total;

		valor01 = document.getElementById('valor_veiculo').value;
		(valor01).toLocaleString();
		valor1 = valor01.replace(/,/gi, '');

		valor02 = document.getElementById('valor_entrada').value;
		if( !valor02 ){
			valor02 = 0;
		}
		(valor02).toLocaleString();
		valor2 = valor02.replace(/,/gi, '');

		parcela = document.getElementById('qdade_parcela').value;
		if( !parcela ){
			parcela = 1;
		}

		total01 = valor1 - valor2;
		total01 = total01/parcela;
		var total = total01.toFixed({!! $dados['casasDecimais'] !!})

		document.getElementById('valor_parcela').value = (total);
	}
</script>

@include('temas.inspinia.script_formulario')