<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciamento</title>
    <link href="/temas/inspinia/font-awesome/css/font-awesome.css?v={!! versaoSistema() !!}" rel="stylesheet">
</head>
<body style="color: #636b6f;font-family: 'Nunito', sans-serif;font-weight: 200;height: 100vh;margin: 0;">
    <table width="90%" cellspacing="1" cellpadding="1" align="center" border="0">
        <tr>
            <td style="text-align: center;" colspan="5">
                <span style="font-size: 18pt; font-weight: bold; width: 40% !important">
                    {!! trataTraducoes('CheckList para automóveis') !!}
                </span>
            </td>
        </tr>
        <tr>
            <td style="width: 5% !important">#</td>
            <td style="width: 55% !important">{!! trataTraducoes('Avaliação') !!}</td>
            <td style="width: 10% !important; text-align: center;">{!! trataTraducoes('Não informado') !!}</td>
            <td style="width: 10% !important; text-align: center;">{!! trataTraducoes('Ausente') !!}</td>
            <td style="width: 10% !important; text-align: center;">{!! trataTraducoes('Ruim') !!}</td>
            <td style="width: 10% !important; text-align: center;">{!! trataTraducoes('Bom') !!}</td>
        </tr>
        @foreach( $conteudo['checklistOriginal'] as $key => $data )
        <tr style="background-color: {!! $key % 2 ? '#cecece' : '#ffffff' !!}">
            <td>{!! $key+1 !!}</td>
            <td>{!! trataTraducoes($data['titulo']) !!}</td>
            <td style="text-align: center; font-weight: bold;">{!! strtolower($conteudo['buscaChecklist'][$data['id']]) === 'nao_informado' ? 'x' : Null !!}</td>
            <td style="text-align: center; font-weight: bold;">{!! strtolower($conteudo['buscaChecklist'][$data['id']]) === 'ausente' ? 'x' : Null !!}</td>
            <td style="text-align: center; font-weight: bold;">{!! strtolower($conteudo['buscaChecklist'][$data['id']]) === 'ruim' ? 'x' : Null !!}</td>
            <td style="text-align: center; font-weight: bold;">{!! strtolower($conteudo['buscaChecklist'][$data['id']]) === 'bom' ? 'x' : Null !!}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>