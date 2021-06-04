<link href="/temas/inspinia/css/plugins/dataTables/datatables.min.css?v={!! versaoSistema() !!}" rel="stylesheet">
<div class="table-responsive">
    <table class="table table-hover table-striped conteudoDatatable" cellpadding="0" cellspacing="0" border="0">
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
            {extend: 'pdf', title: '{!! urlCompleta() !!}'},
            @endif

            @if( !isset($dados['dados']['botaoExcel']) )
            {extend: 'excel', title: '{!! urlCompleta() !!}'},
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