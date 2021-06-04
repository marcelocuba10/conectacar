<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <h4 style="float: right;">@include('cabecalho')</h4>
                <div class="ibox-title">
                    <h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
                    <div class="ibox-tools" style="padding-right: 20px;">
                        {!! ( !empty($dados['dados']['botoes_da_datatable']) ? $dados['dados']['botoes_da_datatable'] : Null ) !!}
                    </div>
                </div>
                @if( !empty($dados['formulario']) )
                <div class="ibox-content">
                    @include('temas.inspinia.apenas_formulario')
                </div>
                @endif
                <div class="ibox-content">
                    conteudo
                </div>
            </div>
        </div>
    </div>
</div>