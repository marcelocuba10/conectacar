<?php
unset($_SESSION['ultimo_recibo']);

$dados = json_decode($conteudo['dados_origem'],true);
$cliente = Model('Gerenciamento','Users')::join('users_dados','users_dados.id','=','users.id')->find($dados['cliente_id']);
$conteudo_recibo = explode('-',$dados['data_recibo']);

$diaRecibo = $conteudo_recibo[2];
$mesRecibo = $conteudo_recibo[1];
$anoRecibo = $conteudo_recibo[0];

$dadosUsuarioCompleto = dadosUsuarioCompleto();

$moedaPadrao = Model('Veiculos','Configuracoes')::where('emp_id', Auth()->user()->emp_id)->where('chave','moeda_padrao')->first();
$moedaPadrao = ( !empty($moedaPadrao) ? $moedaPadrao['conteudo'] : 'USD' );

?>

<table width="100%" cellspacing="0" cellpadding="10" border="0" style="border:1px solid #000; background-color: #cecece">
    <tr>
        <td>
            <table width="100%" cellspacing="0" cellpadding="5" border="1" style="background-color: #fff">
                <tr>
                    <td style="width: 25%; font-weight: bold !important; text-transform: uppercase !important; font-size: 22pt !important;">
                        {!! trataTraducoes('Recibo') !!}
                    </td>
                    <td style="width: 25%; font-weight: bold !important; text-transform: uppercase !important; font-size: 22pt !important;">
                        {!! adicionaCamposTexto(['entrada' => $conteudo['id']]) !!}
                    </td>
                    <td style="width: 50%; font-weight: bold !important; text-transform: uppercase !important; font-size: 22pt !important; float: right !important;">
                        <sup style="font-size: 14pt !important;">{!! $moedaPadrao !!}</sup><div style="float: right;">{!! $dados['valor'] !!}</div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" cellspacing="0" cellpadding="5" border="1" style="background-color: #fff">
                <tr>
                    <td style="font-weight: bold !important; text-transform: uppercase !important; font-size: 10pt !important;">
                        {!! trataTraducoes('Recebi(emos) de') !!} {!! $cliente['name'] !!}
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold !important; text-transform: uppercase !important; font-size: 10pt !important;">
                        {!! trataTraducoes('em') !!} {!! $moedaPadrao !!} {!! trataTraducoes('a quantia de') !!} {!! escreveValoresPorExtenso(currencyToSystemDefaultBD($dados['valor'],( strtolower($moedaPadrao) === 'pyg' ? 3 : 2 ))) !!}
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold !important; text-transform: uppercase !important; font-size: 10pt !important;">
                        {!! trataTraducoes('Correspondente a') !!} {!! $dados['recibo_referente_a'] !!}
                        <br>
                        <small>{!! trataTraducoes('e para clareza firmo(amos) o presente') !!}</small>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold !important; text-transform: uppercase !important; font-size: 10pt !important;">
                        {!! $dadosUsuarioCompleto['cidade'] !!}{!! !empty($dadosUsuarioCompleto['cidade']) ? ', ' : Null !!} {!! $diaRecibo !!} {!! trataTraducoes('de') !!} {!! mesesAno($mesRecibo) !!} {!! trataTraducoes('de') !!} {!! $anoRecibo !!}
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td style="font-weight: bold !important; text-transform: uppercase !important; font-size: 10pt !important; padding: 50px 0px 5px 5px;">
                        <hr style="width: 90%; text-align: left !important;"><br>
                        {!! trataTraducoes('Assinatura') !!}
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold !important; text-transform: uppercase !important; font-size: 10pt !important;">
                        {!! trataTraducoes('Nome') !!}: {!! $dadosUsuarioCompleto['name'] !!} ( {!! $dadosUsuarioCompleto['razao'] !!} )
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold !important; text-transform: uppercase !important; font-size: 10pt !important;">
                        {!! trataTraducoes('Documento') !!}: {!! $dadosUsuarioCompleto['documento_principal'] !!}
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold !important; text-transform: uppercase !important; font-size: 10pt !important;">
                        {!! trataTraducoes('Endereço') !!} {!! $dadosUsuarioCompleto['endereco'] !!}: {!! $dadosUsuarioCompleto['numero'] !!}, {!! $dadosUsuarioCompleto['bairro'] !!} - {!! $dadosUsuarioCompleto['cidade'] !!} / {!! $dadosUsuarioCompleto['estado'] !!}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>