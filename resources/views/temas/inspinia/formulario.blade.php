<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <h4 style="float: right;">@include('cabecalho')</h4>
                <div class="ibox-title">
                    <h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
                    <div class="ibox-tools" style="padding-right: 5px;">
                        @if( empty($dados['dados']['botao_listagem']) )
                        {!! montaCamposFormulario(['cor'=>'warning','url'=>( !empty($dados['dados']['rota_geral_voltar']) ? $dados['dados']['rota_geral_voltar'] : $dados['dados']['rota_geral'] ),'tipo'=>'LinkGeralIcone','titulo'=>'Voltar para a listagem','icone'=>'fa fa-list'],'b') !!}
                        @endif
                        {!! ( !empty($dados['dados']['botoes_da_datatable']) ? $dados['dados']['botoes_da_datatable'] : Null ) !!}
                    </div>
                </div>
                <div class="ibox-content">
                    @include('temas.inspinia.apenas_formulario')
                </div>
            </div>
        </div>
    </div>
</div>