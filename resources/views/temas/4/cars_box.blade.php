<div class="grid_4">
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td colspan="8">
                <a href="/cars/details/{!! !empty($data['hash_id']) ? $data['hash_id'] : null !!}" class="gal">
                    <img src="{!! verificaImagemSistem("image") !!}" alt="">
                </a>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="width: 50%">
                {!! !empty($data['nome']) ? $data['nome'] : 'nome'!!}
            </td>
            <td colspan="4" style="width: 50%; text-align: right;">
                {!! !empty($data['ano_veiculo']) ? $data['ano_veiculo'] : 'ano_veiculo' !!}
            </td>
        </tr>
        <tr><td colspan="8">&nbsp;</td></tr>
        <tr>
            <td colspan="4">
                <a href="/cars/?valor={!! !empty($data['valor']) ? $data['valor'] : null !!}"><i class="fa fa-usd" style="font-size: 16pt;"></i> {!! currencyToSystemDefaultBD(!empty($data['valor']) ? $data['valor'] : null ) !!}</a>
            </td>
            <td colspan="4" style="text-align: right;">
                <a href="/cars/?km2={!! !empty($data['km']) ? $data['km'] : null !!}">{!! !empty($data['km']) ? $data['km'] : null !!} <i class="fa fa-road" style="font-size: 16pt;"></i></a>
            </td>
        </tr>
        <tr><td colspan="8">&nbsp;</td></tr>
        <tr style="font-size: 8pt !important;">
            <td colspan="2" style="width: 25% !important;"><a href="/cars/?cambio={!! !empty($data['cambio']) ? $data['cambio'] : null !!}">{!! ( !empty($data['cambio']) ? $data['cambio'] : 'cambio' ) !!}</a></td>
            <td colspan="2" style="width: 25% !important;"><a href="/cars/?cor={!! !empty($data['cor']) ? $data['cor'] : null !!}">{!! ( !empty($data['cor']) ? $data['cor'] : 'cor' ) !!}</a></td>
            <td colspan="2" style="width: 25% !important;"><a href="/cars/?carroceria={!! !empty($data['carroceria']) ? $data['carroceria'] : null !!}">{!! ( !empty($data['carroceria']) ? $data['carroceria'] : 'carroceria' ) !!}</a></td>
            <td colspan="2" style="width: 25% !important;"><a href="/cars/?motorizacao={!! !empty($data['motorizacao']) ? $data['motorizacao'] : null !!}">{!! ( !empty($data['motorizacao']) ? $data['motorizacao'] : 'motorizacao' ) !!}</a></td>
        </tr>
        <tr style="font-size: 8pt !important;">
            <td colspan="2"><a href="/cars/?combustivel={!! !empty($data['combustivel']) ? $data['combustivel'] : '-'!!}">{!! ( !empty($data['combustivel']) ? $data['combustivel'] : 'combustivel' ) !!}</a></td>
            <td colspan="2">02</td>
            <td colspan="2">03</td>
            <td colspan="2">04</td>
        </tr>
    </table>
</div>