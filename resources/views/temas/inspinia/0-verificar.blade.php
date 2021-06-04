<style>
    h1,h2,h3,h4 { clear: both; }
    .column {
        height: 150px;
        width: 10%;
        float: left;
        background-color: #ccc;
        margin: 5px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -o-border-radius: 10px;
        -ms-border-radius: 10px;
        border-radius: 10px;
        text-align: center;
        cursor: move;
        margin-bottom: 30px;
        overflow: hidden;
    }
</style>

<link href="/temas/inspinia/css/plugins/chosen/bootstrap-chosen.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/css/style.css?v={!! versaoSistema() !!}" rel="stylesheet">
<script src="/temas/inspinia/js/jquery-3.1.1.min.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/chosen/chosen.jquery.js?v={!! versaoSistema() !!}"></script>
<script src="/js/jquery.mask.js?v={!! versaoSistema() !!}"></script>

{!! !empty($dados['dados']['javascript']) ? $dados['dados']['javascript'] : Null !!}
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
                <div class="ibox-content">
                    <div class="row">
                        <div id="columns-full">
                            <form name="formulario" id="formulario" action="{!! url($dados['dados']['rota_geral']) !!}/reordenar" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true">
                            @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach( $dados['data'] as $key => $datas )
                                        <div class="column">
                                            <input type="hidden" name="ordem[]" value="{!! $key !!}">
                                            <img src="{!! $datas['imagem'] !!}" style="width: 100% !important">
                                        </div>
                                        @endforeach
                                    </div>
                                    <script src="/temas/inspinia/js/popper.min.js?v={!! versaoSistema() !!}"></script>
                                    <script src="/temas/inspinia/js/bootstrap.js?v={!! versaoSistema() !!}"></script>

                                    <div class="col-md-12">
                                        {!! montaCamposFormulario(['tipo' => 'BotaoModalSalvar','size'=>10,'icone' => 'fa fa-refresh','titulo' => 'Reordenar fotos','cor' => 'primary' ],'b') !!}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/drag_and_drop.js"></script>

    <script>
        $(document).ready(function(){
            $('.mascaraData').mask('11/11/1111');
            $('.mascaraTempo').mask('00:00:00');
            $('.mascaraDataTempo').mask('00/00/0000 00:00:00');
            $('.mascaraCep').mask('00000-000');
            $('.mascaraTelefone4').mask('0000-0000');
            $('.mascaraTelefone4DDD').mask('(00) 0000-0000');
            $('.mascaraTelefoneUS').mask('(000) 000-0000');
            $('.mascaraMixed').mask('AAA 000-S0S');
            $('.mascaraCPF').mask('000.000.000-00', {reverse: true});
            $('.mascaraMoeda').mask('000.000.000.000.000.00', {reverse: true});
        });
    </script>

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