<div class="grid_4">
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td colspan="8">
                <a href="/cars/details/{!! $data['hash_id'] !!}" class="gal">
                    <img src="{!! verificaImagemSistem($data['image'][0]) !!}" alt="">
                </a>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="width: 50%">
                {!! $data['nome'] !!}
            </td>
            <td colspan="4" style="width: 50%; text-align: right;">
                {!! $data['ano_veiculo'] !!}
            </td>
        </tr>
        <tr><td colspan="8">&nbsp;</td></tr>
        <tr>
            <td colspan="4">
                <a href="/cars/?valor={!! $data['valor'] !!}"><i class="fa fa-usd" style="font-size: 16pt;"></i> {!! currencyToSystemDefaultBD($data['valor']) !!}</a>
            </td>
            <td colspan="4" style="text-align: right;">
                <a href="/cars/?km2={!! $data['km'] !!}">{!! $data['km'] !!} <i class="fa fa-road" style="font-size: 16pt;"></i></a>
            </td>
        </tr>
        <tr><td colspan="8">&nbsp;</td></tr>
        <tr style="font-size: 8pt !important;">
            <td colspan="2" style="width: 25% !important;"><a href="/cars/?cambio={!! $data['cambio'] !!}">{!! ( !empty($data['cambio']) ? $data['cambio'] : ' - ' ) !!}</a></td>
            <td colspan="2" style="width: 25% !important;"><a href="/cars/?cor={!! $data['cor'] !!}">{!! ( !empty($data['cor']) ? $data['cor'] : ' - ' ) !!}</a></td>
            <td colspan="2" style="width: 25% !important;"><a href="/cars/?carroceria={!! $data['carroceria'] !!}">{!! ( !empty($data['carroceria']) ? $data['carroceria'] : ' - ' ) !!}</a></td>
            <td colspan="2" style="width: 25% !important;"><a href="/cars/?motorizacao={!! $data['motorizacao'] !!}">{!! ( !empty($data['motorizacao']) ? $data['motorizacao'] : ' - ' ) !!}</a></td>
        </tr>
        <tr style="font-size: 8pt !important;">
            <td colspan="2"><a href="/cars/?combustivel={!! $data['combustivel'] !!}">{!! ( !empty($data['combustivel']) ? $data['combustivel'] : ' - ' ) !!}</a></td>
            <td colspan="2">02</td>
            <td colspan="2">03</td>
            <td colspan="2">04</td>
        </tr>
    </table>
</div>