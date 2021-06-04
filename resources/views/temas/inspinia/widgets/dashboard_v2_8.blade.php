<div class="ibox ">
	<div class="ibox-title">
		{!! !empty($data['subtitulo']) ? '<span class="label label-'.$data['cor'].' float-right">' : '' !!}
			{!! !empty($data['subtitulo']) ? $data['subtitulo'] : '' !!}
		{!! !empty($data['subtitulo']) ? '</span>' : '' !!}
		<h5>{!! trataTraducoes('senha_financeira') !!}</h5>
	</div> 
	<div class="ibox-content">
		<h3 class="text-center"><a onclick="montaTela('/settings/pins')">{!! trataTraducoes('instrucao_topo_dashboard_senha_financeira') !!}</a></h3>
	</div>
</div>