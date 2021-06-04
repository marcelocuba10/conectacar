<h4 style="float: right;">
	@include('temas.inspinia.balao_ajuda')
	<script>
		if (typeof validaTela === "undefined") {
			window.location.href = "/{!! strtolower(Auth()->user()->modulo) !!}/painel";
		}
	</script>
	<div class="col-md-12">&nbsp;</div>
	<a onclick="montaTela('{!! urlCompleta() !!}');" style="cursor: pointer;"><i class="fa fa-refresh"></i></a>
</h4>