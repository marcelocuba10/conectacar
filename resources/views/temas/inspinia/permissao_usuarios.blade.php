<link href="/temas/inspinia/css/plugins/dataTables/datatables.min.css?v={!! versaoSistema() !!}" rel="stylesheet">
<script src="/js/jquery.mask.js?v={!! versaoSistema() !!}"></script>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <h4 style="float: right;">@include('cabecalho')</h4>
                <div class="ibox-title">
                    <h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
                    <div class="ibox-tools" style="padding-right: 20px;">
                        <a onclick="montaTela('/maintenance/modules');" title="{!! trataTraducoes('voltar') !!}"><i class="fa fa-mail-reply"></i> {!! trataTraducoes('cancelar') !!} </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form name="formulario" id="formulario" action="/maintenance/modules/{!! $dados['modulo'] !!}/{!! $dados['nivel'] !!}/users_access" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true, this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.innerHTML='{!! trataTraducoes('enviando') !!}',">
                        @csrf
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 7%">{!! trataTraducoes('ativo') !!}</th>
                                    <th style="width: 10%">{!! trataTraducoes('nivel_1') !!}</th>
                                    <th style="width: 78%">{!! trataTraducoes('nivel_2') !!}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $dados['acesso'] as $key => $acesso )
                                <tr>
                                    <td>{!! $key+1 !!}</td>
                                    <td>{!! montaCamposFormulario(['tipo' => 'switch','label' => '&nbsp;','nome_no_banco_de_dados' => 'acesso','valor_inicial' => $acesso['id'],'checked' => ( in_array($acesso['id'], $dados['menuID']) ? 1 : 0 ),]) !!}</td>
                                    <td colspan="2">{!! trataTraducoes($acesso['menu']) !!}
                                </tr>
                                    @foreach( $acesso['menuFilho'] as $key1 => $nivel1 )
                                    <tr>
                                        <td>{!! $key1+1 !!}</td>
                                        <td>{!! montaCamposFormulario(['tipo' => 'switch','label' => '&nbsp;','nome_no_banco_de_dados' => 'acesso','valor_inicial' => $nivel1['id'],'checked' => ( in_array($nivel1['id'], $dados['menuID']) ? 1 : 0 ),]) !!}</td>
                                        <td>&nbsp;</td>
                                        <td>{!! trataTraducoes($nivel1['menu']) !!}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th>
                                    <td colspan="4">
                                        {!! montaCamposFormulario([
                                            'tipo' => 'BotaoModalSalvar',
                                            'size'=>10,
                                            'icone' => 'fa fa-save',
                                            'titulo' => 'salvar',
                                            'cor' => 'primary',
                                            ],'b')
                                        !!}
                
                                    </td>
                                </th>
                            </tfoot>
                        </table>
                    </form>
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