@extends('temas.inspinia.layout')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">&nbsp;</div>
        <div class="col-lg-12">
            <div class="ibox">
                @if( verificaSePossuiSenhaFinanceira() === 0 )
                <div class="row">
                    <div class="col-lg-12">
                        @include('temas.inspinia.widgets.dashboard_v2_8')
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        @include('temas.inspinia.widgets.dashboard_v2_9',['data' => ['titulo' => trataTraducoes('pagar'),'valor' => montaCamposFormulario(['cor'=>'primary btn-block','url'=>'/financial/payments/create/qrcode','tipo'=>'LinkGeralIcone','icone'=>'fa fa-usd','label'=>'pagar'],'b'),'subtexto' => '&nbsp;']])
                    </div>
                    <div class="col-lg-6">
                        @include('temas.inspinia.widgets.dashboard_v2_1',['data' => ['titulo' => trataTraducoes('receber'),'valor' => montaCamposFormulario(['cor'=>'primary btn-block','url'=>'/financial/receive/create','tipo'=>'LinkGeralIcone','icone'=>'fa fa-usd','label'=>'receber'],'b'),'subtexto' => '&nbsp;']])

                        @include('temas.inspinia.widgets.dashboard_v2_1',['data' => ['titulo' => trataTraducoes('saldo_disponivel'),'valor' => '<small style="font-size: 8pt;">'.dadosUsuarioCompleto()['moeda_padrao'].'</small> ' . conversorMoedas(consultaSaldoporUsuario('saldo_disp'), moeda_padrao(), moeda_usuario(), true),'subtexto' => '&nbsp;','porcentagem' => '','icone' => '',]])

                        @include('temas.inspinia.widgets.dashboard_v2_1',['data' => ['titulo' => trataTraducoes('saldo_bloqueado'),'valor' => '<small style="font-size: 8pt;">'.dadosUsuarioCompleto()['moeda_padrao'].'</small> ' . conversorMoedas(consultaSaldoporUsuario('saldo_bloq'), moeda_padrao(), moeda_usuario(), true),'subtexto' => '&nbsp;','porcentagem' => '','icone' => '',]])
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @include('temas.inspinia.widgets.dashboard_v2_5',['data' => ['titulo' => trataTraducoes('carteiras'),'dados'=>consultaCarteirasdoUsuario()]])
                    </div>
                </div>
                <?php
                /*
                <div class="row">
                    <div class="col-lg-6">
                        @include('temas.inspinia.widgets.dashboard_v2_0',['data' => ['qual'=>'qrcode','titulo' => trataTraducoes('receber'),'url'=>'/financial/receive','altura'=>350,'icone'=>'fa fa-list']])
                    </div>
                    <div class="col-lg-6">
                        @include('temas.inspinia.widgets.dashboard_v2_0',['data' => ['qual'=>'lerqrcode','titulo' => trataTraducoes('pagar'),'url'=>'/financial/payments','altura'=>350,'icone'=>'fa fa-list']])
                    </div>
                </div>
                */
                ?>
                <div class="row">
                    <div class="col-lg-9">
                        @include('temas.inspinia.widgets.dashboard_v2_7',['data' => ['titulo' => trataTraducoes('link_de_recomendacoes'),]])
                    </div>
                    <div class="col-lg-3">
                        <?php
                        $totalContado = ultimosIndicados();
                        $totalContado = ( empty($totalContado) ? "0 " : count($totalContado) );
                        ?>
                        @include('temas.inspinia.widgets.dashboard_v2_1',['data' => ['titulo' => trataTraducoes('seus_indicados'),'cor' => 'success','valor' => '<h3>'.$totalContado.'</h3>','subtexto' => '','porcentagem' => '','icone' => '',]])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection