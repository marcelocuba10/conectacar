<div class="row" style="background-color: #001040 !important; color: #ffffff !important; text-align: center !important;">
	<div class="col-lg-12" id="mostraCotacao"></div>
</div>

<div class="row border-bottom">
	<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<a class="navbar-minimalize minimalize-styl-2 btn btn-primary text-white" style="cursor: pointer;"><i class="fa fa-bars"></i> </a>
		</div>
		<a style="padding-top: 20px; padding-right: 30px;" onclick="ajaxGlobal()" class="cursor_pointer"> 
			{!! trataTraducoes('Bem vindo') !!} - {!! explode(' ',Auth()->user()->name)[0] !!} 
		</a>
		<ul class="nav navbar-top-links navbar-right botoesAdicionaisResponsivo">
			@if( !is_null(dadosUsuarioCompleto()['termos_e_condicoes']) )
			<li class="botoesAdicionaisResponsivoInterno"></li>
			@include('temas.inspinia.topo.alertas')
			@include('temas.inspinia.topo.chat')
			@include('temas.inspinia.topo.ticket')
			@include('temas.inspinia.topo.correio_interno')
			@include('temas.inspinia.topo.idiomas')
			@endif
			<li class="botoesAdicionaisResponsivoBotoes"><a href="/painel/sair" title="{!! trataTraducoes('sair') !!}"><i class="fa fa-power-off"></i></a></li>
		</ul>
	</nav>
</div>