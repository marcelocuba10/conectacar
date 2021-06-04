<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox ">
        <h4 style="float: right;">@include('cabecalho')</h4>
        <div class="ibox-title">
          <h5 class="text-center">{!! trataTraducoes('faca_a_leitura_do_codigo_abaixo') !!}</h5>
          <div class="ibox-tools" style="padding-right: 5px;">
            <a class="btn-apagar btn btn-warning btn-xs float-right" data-toggle="tooltip" data-placement="top" style="margin: 0px 2px;" onclick="montaTela('{!! $url !!}')" title="{!! trataTraducoes('voltar') !!}">
              <i class="fa fa-mail-reply" style="color: #fff"></i>
              <span style="color: #fff">{!! trataTraducoes('voltar') !!}</span>
            </a>
          </div> 
        </div>
        <div class="ibox-content text-center">
          <div class="row">
            <div class="col-lg-8 text-left" style="padding-top: 40px;">
              <div class="table-responsive">
                <table class="table-hover" cellpadding="5" cellspacing="0" border="0">
                  <tr>
                    <td style="width: 10%; white-space: nowrap; font-weight: bold;">{!! trataTraducoes('data_hora') !!}</td>
                    <td style="width: 90%">{!! formataDataCompleta($data['created_at'],'data_hora') !!}</td>
                  </tr>
                  <tr>
                    <td style="font-weight: bold; white-space: nowrap;">{!! trataTraducoes('valor') !!} ( <i class="fa fa-{!! empty($tipo) ? 'btc' : 'usd' !!} text-right"></i> ) </td>
                    <td>
                      {!! conversorMoedas(empty($tipo) ? json_decode($data['json_transacao'])->total : $data['valor'], moeda_padrao(), moeda_usuario(), true) !!}
                    </td>
                  </tr>
                  @if( empty($tipo) )
                  <tr>  
                    <td style="font-weight: bold; white-space: nowrap;">{!! trataTraducoes('valor_calculado') !!} </td>
                    <td>{!! conversorMoedas($data['total'], moeda_padrao(), moeda_usuario() ,true) !!}</td>
                  </tr>
                  @endif
                  <tr>
                    <td style="font-weight: bold; white-space: nowrap;">{!! trataTraducoes('codigo') !!}</td>
                    <td>
                      {!! substr($qr, 0,10) . '...' . substr($qr, -10) !!}
                      <span></span>
                      {!! copiatesteConteudo(['conteudo'=>$qr,'texto'=>'codigo_de_recebimento_copiado_com_sucesso','label'=>'&nbsp;','alinhamento'=>'float-right']) !!}
                    </td>
                  </tr>
                  <tr>
                    <td style="font-weight: bold; white-space: nowrap;">{!! trataTraducoes('observacoes') !!}</td>
                    <td>{!! trataTraducoes('instrucoes_recebimento') !!}</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="col-lg-4">
              <img src="/geraqrcode?destino={!! $qr !!}" style="width: 60% !important;">
              @if( $data['tipo'] === 'deposits' )
              <br>
              {!! trataTraducoes('validade_do_codigo') !!}: {!! date('h:m:s', strtotime('+3 hours', strtotime(explode(' ',$data['created_at'])[1]))) !!}
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>