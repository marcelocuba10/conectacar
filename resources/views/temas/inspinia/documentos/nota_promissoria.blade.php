<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">

	<title>Pagar é</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

	<!-- Styles -->
	<style>
		html, body {
			background-color: #fff;
			color: #636b6f;
			font-family: 'Nunito', sans-serif;
			font-weight: 200;
			height: 100vh;
			margin: 0;
		}

		.full-height {
			height: 100vh;
		}

		.flex-center {
			align-items: center;
			display: flex;
			justify-content: center;
		}

		.position-ref {
			position: relative;
		}

		.top-right {
			position: absolute;
			right: 10px;
			top: 18px;
		}

		.content {
			text-align: left;
			width: 90%;
		}

		.title {
			font-size: 84px;
		}

		.links > a {
			color: #636b6f;
			padding: 0 25px;
			font-size: 13px;
			font-weight: 600;
			letter-spacing: .1rem;
			text-decoration: none;
			text-transform: uppercase;
		}

		.m-b-md {
			margin-bottom: 30px;
		}
	</style>
</head>
<body>
	<div class="flex-center position-ref full-height">
		<div class="content">
			<table cellpadding="10" cellspacing="10" border="0" width="100%" align="center">
				<tr>
					<td style="width: 5%; border:1px solid #000">&nbsp;</td>
					<td style="width: 1%">&nbsp;</td>
					<td style="width: 93%">
						<table cellpadding="10" cellspacing="10" border="0" width="100%" align="center">
							<tr>
								<td colspan="10" style="text-align: center; font-size: 35pt !important; font-weight: bold !important;">{!! trataTraducoes('Recibo de dinheiro') !!}</td>
							</tr>
							<tr>
								<td colspan="6" style="width: 40% !important;"><span style="font-size: 16pt !important; font-weight: bold !important;">Nº:</span> {!! $conteudo['hash_id'] !!}</td>
								<td colspan="4" style="width: 60% !important; text-align: right !important;"> <span style="font-size: 16pt !important; font-weight: bold !important;">{!! $conteudo['siteID']['quaisDados']['moeda_padrao'] !!}</span> {!! currencyToSystemDefaultBD($conteudo['valor'],2,true) !!}</td>
							</tr>
							<tr>
								<td colspan="5" style="width: 50% !important">&nbsp;</td>
								<td colspan="5" style="width: 50% !important; text-align: right !important;">{!! ( !empty($conteudo['siteID']['quaisDados']['cidade']) ? $conteudo['siteID']['quaisDados']['cidade'].', ' : Null ) !!} {!! formataData($conteudo['created_at'],'d') !!} <span style="font-size: 16pt !important; font-weight: bold !important;">{!! trataTraducoes('de') !!}</span> {!! formataData($conteudo['created_at'],'m') !!} <span style="font-size: 16pt !important; font-weight: bold !important;">{!! trataTraducoes('de') !!}</span> {!! formataData($conteudo['created_at'],'Y') !!}</td>
							</tr>
							<tr>
								<td colspan="10">
									<span style="font-size: 16pt !important; font-weight: bold !important;">{!! trataTraducoes('Recebi do senhor') !!}</span> {!! $conteudo['credor']['nome'] !!}
								</td>
							</tr>
							<tr>
								<td colspan="10">
									<span style="font-size: 16pt !important; font-weight: bold !important;">{!! trataTraducoes('a quantia em') !!}</span> {!! $conteudo['siteID']['quaisDados']['moeda_padrao'] !!} <span style="font-size: 16pt !important; font-weight: bold !important;">{!! trataTraducoes('de') !!}</span> {!! escreveValoresPorExtenso($conteudo['valor']) !!}
								</td>
							</tr>
							<tr>
								<td colspan="6" style="width: 60% !important">
									<span style="font-size: 16pt !important; font-weight: bold !important;">{!! trataTraducoes('Nome') !!}</span> {!! $conteudo['credor']['nome'] !!}
									<br>
									<span style="font-size: 16pt !important; font-weight: bold !important;">{!! trataTraducoes('Documento') !!}</span> {!! $conteudo['credor']['cpf_cnpj'] !!}
								</td>
								<td colspan="4" style="width: 40% !important">
									<br>
									<hr>
									<span style="font-size: 16pt !important; font-weight: bold !important;">{!! trataTraducoes('Empresa') !!}</span> {!! $conteudo['siteID']['name'] !!}
								</td>
							</tr>
						</table>
					</td>
					<td style="width: 1%; border:1px solid #000">&nbsp;</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>