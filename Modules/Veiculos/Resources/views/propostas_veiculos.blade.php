<table width="100%" cellspacing="10" cellspacing="0" border="0">
	<tr>
		<td colspan="2"><img src="{!! url($data['logotipo']) !!}"></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td>Veículo</td>
		<td>{!! url('/cars/details/'.$data['veiculo']['hash_id']) !!}</td>
	</tr>
	<tr>
		<td>Nome</td>
		<td>{!! $data['nome'] !!}</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>{!! $data['email'] !!}</td>
	</tr>
	<tr>
		<td>Telefone</td>
		<td>{!! $data['telefone'] !!}</td>
	</tr>
	<tr>
		<td>Mensagem</td>
		<td>{!! $data['texto'] !!}</td>
	</tr>
</table>