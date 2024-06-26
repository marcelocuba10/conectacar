<?php
/*
@extends('temas.inspinia.layout')
@section('content')
*/
?>

<link href="/temas/inspinia/css/plugins/dataTables/datatables.min.css?v={!! versaoSistema() !!}" rel="stylesheet">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <h4 style="float: right;">@include('cabecalho')</h4>
                <div class="ibox-title">
                    <h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
                    <div class="ibox-tools" style="padding-right: 5px;">
                       {!! ( !empty($dados['dados']['botoes_da_datatable']) ? $dados['dados']['botoes_da_datatable'] : Null ) !!}
                   </div>
               </div>
               <div class="ibox-content">

                    <form name="formulario" id="formulario" action="{!! url($dados['dados']['rota_geral']) !!}" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true, this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.innerHTML='{!! trataTraducoes('enviando') !!}'">
                        @csrf
                        @foreach( $dados['formulario'] as $formulario )
                        {!! $formulario !!}
                        @endforeach
                    </form>

                <div class="table-responsive">
                    <table class="table table-hover conteudoDatatable" cellpadding="0" cellspacing="0" border="0">
                        <thead>
                            <tr>
                                @foreach( $dados['datatable'] as $key => $datatable )
                                <th style="width:{!! $datatable['tabela'] !!}%">{!! trataTraducoes($datatable['label']) !!}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                @foreach( $dados['datatable'] as $key => $datatable )
                                <th>{!! trataTraducoes($datatable['label']) !!}</th>
                                @endforeach
                            </tr>
                        </tfoot>
                    </table>
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

<script>
    var tabela;
    $(document).ready(function(){
        tabela = $('.conteudoDatatable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Portuguese-Brasil.json"
            },
            "ajax": {
                "url": "{!! url($dados['dados']['rota_geral']).'/show' !!}",
                "type": "GET"
            },
            "columns": [
            @foreach( $dados['datatable'] as $campos )
            {"data": "{!! $campos['nome_no_banco_de_dados'] !!}" },
            @endforeach
            ],
            'paging': {!! ( isset($dados['dados']['paging']) ? 'false' : 'true' ) !!},
            'pageLength': {!! ( isset($dados['dados']['pageLength']) ? $dados['dados']['pageLength'] : 10 ) !!},
            'lengthChange': {!! ( isset($dados['dados']['lengthChange']) ? 'false' : 'true' ) !!},
            'searching': {!! ( isset($dados['dados']['searching']) ? 'false' : 'true' ) !!},
            'ordering': {!! ( isset($dados['dados']['ordering']) ? 'false' : 'true' ) !!},
            'info': {!! ( isset($dados['dados']['info']) ? 'true' : 'false' ) !!},
            'autoWidth': false,
            'responsive': {!! ( isset($dados['dados']['responsive']) ? 'false' : 'true' ) !!},
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                @if( !isset($dados['dados']['botaoPDF']) )
                {extend: 'pdf', title: 'ExampleFile'},
                @endif
                @if( !isset($dados['dados']['botaoImprimir']) )
                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');
                        $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                    }
                }
                @endif
            ]
    });
    });
</script>

<script src="/temas/inspinia/js/plugins/dataTables/datatables.min.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js?v={!! versaoSistema() !!}"></script>

<?php
/*
@endsection
*/
?>