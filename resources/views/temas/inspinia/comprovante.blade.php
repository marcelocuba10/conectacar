<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">

	<title>{!! trataTraducoes($conteudo['tipo']) !!}</title>

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
			<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center" style="border: 0px solid #E7EAEC">
				<tr>
					<td>
						<table cellpadding="10" cellspacing="0" border="0" width="80%" align="center">
							<tr>
								<td style="width: 20%">&nbsp;</td>
								<td style="width: 30%">&nbsp;</td>
								<td style="width: 30%">&nbsp;</td>
								<td style="width: 20%">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2"><h1>{!! trataTraducoes('Recibo') !!}</h1></td>
								<td colspan="2" style="text-align: right;">
									<h3 style="line-height:1">{!! site_id()['name'] !!}<br>
									{!! site_id()['email'] !!}</h3>
								</td>
							</tr>
							<tr><td colspan="4" style="line-height: 1px">&nbsp;</td></tr>
							<tr>
								<td colspan="4" style="line-height: 1px">
									<h3>{!! trataTraducoes('Código da transação') !!}</h3>
									<small>{!! $conteudo['codigo_transacao'] !!}</small>
								</td>
							</tr>
							<tr><td colspan="4" style="line-height: 1px">&nbsp;</td></tr>
							<tr>
								<td colspan="2" style="line-height: 1px;">
									<h3>Pagamento referente à</h3>
									{!! trataTraducoes($conteudo['tipo']) !!}
								</td>
								<td colspan="2" style="line-height: 1px; text-align: right;">
									<h3>{!! trataTraducoes('Data / Hora') !!}</h3>
									<small>{!! $conteudo['created_at']!!}</small>
								</td>
							</tr>
							<tr><td colspan="4" style="line-height: 1px">&nbsp;</td></tr>
							<tr>
								<td colspan="4" style="line-height: 1px">
									<h3>Valor do pagamento</h3>
									<strong>{!! strtoupper(site_id()['quaisDados']['moeda_padrao']) !!}</strong> {!! currencyToSystemDefaultBD($conteudo['valor'],(site_id()['quaisDados']['moeda_padrao'] === 'pyg' ? 3:2 ) ,true) !!}
								</td>
							</tr>
							<tr><td colspan="4" style="line-height: 1px">&nbsp;</td></tr>
							<tr>
								<td colspan="4" style="line-height: 1px">
									<h3>Total</h3>
									<strong>{!! strtoupper(site_id()['quaisDados']['moeda_padrao']) !!}</strong> {!! currencyToSystemDefaultBD($conteudo['total'],(site_id()['quaisDados']['moeda_padrao'] === 'pyg' ? 3:2 ),true) !!}
								</td>
							</tr>
							<tr><td colspan="4">&nbsp;</td></tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>