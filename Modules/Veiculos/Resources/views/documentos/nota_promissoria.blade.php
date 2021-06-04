
<html>
<body style="border: 0px; margin: 0px; font-family: verdana; font-size: 12pt;">
    <table width="100%" cellspacing="0" cellpadding="30" border="0">
        <tr>
            <td align="center" valign="top">
                @foreach( $conteudo['data'] as $key => $data )
                <table width="100%" cellspacing="5" cellpadding="5" border="1" style="background-color: #BDD5D5">
                    <tr>
                        <td>{!! trataTraducoes('Nota promissória') !!}</td>
                        <td>&nbsp;</td>
                        <td>Lugar de pago</td>
                    </tr>
                    <tr>
                        <td colspan="2">Vencimento {!! formataData($data['vencimento'],'d') !!} de {!! mesesAno()[(((int)formataData($data['vencimento'],'m'))-1)] !!} de {!! formataData($data['vencimento'],'Y') !!}</td>
                        <td>
                            <div style="float: left !important">{!! mostraMoedaPadrao('g') !!}</div> <div style="float: right !important">{!! currencyToSystemDefaultBD($data['valor'],2,true) !!}</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right; font-size: 8pt">
                            POR ESTE PAGARÉ ME COMPROMETO A PAGAR NO DIA DO VENCIMENTO INDICADO
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">{!! Auth()->user()->name !!}</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            {!! mostraMoedaPadrao('g') !!} {!! escreveValoresPorExtenso(currencyToSystemDefaultBD($data['valor'])) !!}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%">&nbsp;</td>
                        <td colspan="2">{!! $data['siteID']['quaisDados']['endereco'] !!}, {!! formataData($data['created_at'],'d') !!} de {!! mesesAno()[(((int)formataData($data['created_at'],'m'))-1)] !!} de {!! formataData($data['created_at'],'Y') !!}</td>
                    </tr>
                    <tr>
                        <td style="width: 75%" colspan="2">&nbsp;</td>
                        <td style="width: 25%">
                            {!! $data['credor']['nome'] !!}
                            {!! !empty($data['credor']['logradouro']) ? '<br>'.$data['credor']['logradouro'] : Null !!} {!! !empty($data['numero']) ? ', '.$data['numero'] : Null !!}<br>
                            {!! $data['credor']['bairro'] !!} {!! !empty($data['numero']) ? ', '.$data['credor']['cidade'] : Null !!} {!! !empty($data['numero']) ? ' - '.$data['credor']['estado'] : Null !!}
                        </td>
                    </tr>
                </table>
                @if( $key < (count($conteudo['data'])-1) )
                <div style='page-break-after: always;'></div>
                @endif
                @endforeach
            </td>
        </tr>
    </table>
</body>
</html>