<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <h4 style="float: right;">@include('cabecalho')</h4>
                <div class="ibox-title">
                    <h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
                    <div class="ibox-tools" style="padding-right: 5px;">
                        {!! montaCamposFormulario(['cor'=>'warning','url'=>( !empty($dados['dados']['rota_geral_voltar']) ? $dados['dados']['rota_geral_voltar'] : $dados['dados']['rota_geral'] ),'tipo'=>'LinkGeralIcone','titulo'=>'Voltar para a listagem','icone'=>'fa fa-list'],'b') !!}
                        {!! ( !empty($dados['dados']['botoes_da_datatable']) ? $dados['dados']['botoes_da_datatable'] : Null ) !!}
                    </div>
                </div>
                <div class="ibox-content">
                    @include('temas.inspinia.apenas_formulario')
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            @include('temas.inspinia.listagem_fotos_organizacao')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="padding-right: 2px; width: 100%; float: left; display: none;">
    <div class="progress">
        <div class="bar"></div>
        <div class="percent"></div >
    </div>
</div>
<div id="status"></div>

<script src="/js/jquery.form.js?v={!! versaoSistema() !!}"></script>
<script>
    (function() {
        var status = $('#status');
        $('form#formulario').on('submit', function(){for ( instance in CKEDITOR.instances ) {CKEDITOR.instances[instance].updateElement();}})
        $('form').ajaxForm({
            beforeSend: function() {
                status.empty();
            },
            success: function() {
            },
            complete: function(xhr) {
                status.html(xhr.responseText);
            }
        }); 
    })();
</script>