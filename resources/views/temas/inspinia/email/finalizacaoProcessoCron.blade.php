@extends('temas.inspinia.email.layout_padrao')
@section('content')

<tr>
  <td>
    <div style="padding:0 30px;background:#fff">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td style="border-bottom:1px solid #e6e6e6;font-size:18px;padding:20px 0; text-align: center;">
              {!! $data['titulo_corpo_email'] !!}
            </td>
          </tr>
          <tr>
            <td style="font-size:14px;line-height:30px;padding:20px 0;color:#666; text-align: center;">
              <h3>{!! $data['subtitulo_corpo_email'] !!}</h3>
            </td>
          </tr>
          <tr>
            <td style="font-size:12px;line-height:25px;padding:20px 0 10px 0;color:#666;font-weight:bolder; text-align: center;"> 
              {!! $data['corpo_email'] !!}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </td>
</tr>

@endsection