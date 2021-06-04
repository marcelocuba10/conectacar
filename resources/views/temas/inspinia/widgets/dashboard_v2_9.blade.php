<div class="ibox ">
	<div class="ibox-title">
		{!! !empty($data['subtitulo']) ? '<span class="label label-'.$data['cor'].' float-right">' : '' !!}
			{!! !empty($data['subtitulo']) ? $data['subtitulo'] : '' !!}
		{!! !empty($data['subtitulo']) ? '</span>' : '' !!}
		<div class="row" style="padding-left: 15px;">
			<div class="col-lg-3">
				<h5>{!! !empty($data['titulo']) ? $data['titulo'] : '' !!}</h5>
			</div>
			<div class="col-lg-9">
				{!! montaCamposFormulario(['cor'=>'primary btn-block','url'=>'/financial/payments/create/paste','tipo'=>'LinkGeralIcone','icone'=>'fa fa-usd','label'=>'novo_pagamento_por_codigo_de_transacao'],'b') !!}
			</div>
		</div>
	</div>
	<div class="ibox-content">
		<video id="preview"></video>
		<script type="text/javascript">
		  let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
		  scanner.addListener('scan', function (content) {
		    console.log(content);
		  });
		  Instascan.Camera.getCameras().then(function (cameras) {
		    if (cameras.length > 0) {
		      scanner.start(cameras[0]);
		    } else {
		      console.error('No cameras found.');
		    }
		  }).catch(function (e) {
		    console.error(e);
		  });
		</script>
	</div>
</div>