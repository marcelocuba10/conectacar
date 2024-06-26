@extends('temas.inspinia.layout')
@section('content')

<link href="/temas/inspinia/css/plugins/summernote/summernote-bs4.css?v={!! versaoSistema() !!}" rel="stylesheet">

<link href="/temas/inspinia/css/plugins/chosen/bootstrap-chosen.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/css/style.css?v={!! versaoSistema() !!}" rel="stylesheet">
<script src="/temas/inspinia/js/jquery-3.1.1.min.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/chosen/chosen.jquery.js?v={!! versaoSistema() !!}"></script>

<div class="wrapper wrapper-content  animated fadeInRight article">
    <div class="row justify-content-md-center">
        <div class="col-lg-10">
            <div class="ibox">
                @include('cabecalho')
                <div class="ibox-content">
                    @if( !is_null(dadosUsuarioCompleto()['termos_e_condicoes']) )
                    <div class="float-right">
                        {!! trataTraducoes('aceito_em') !!}: {!! dadosUsuarioCompleto()['termos_e_condicoes'] !!}
                    </div>
                    @endif
                    <div class="text-center article-title">
                        <h1>
                            {!! trataTraducoes('termos_e_condicoes') !!}
                        </h1>
                    </div>
                    <p>
                        {!! trataTraducoes('termos_e_condicoes_conteudo') !!}
                    </p>
                    <div class="row">
                        <div class="col-lg-12">
                            <form name="formulario" id="formulario" action="/faq/terms_and_conditions" method="POST" enctype="multipart/form-data" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.innerHTML='{!! trataTraducoes( !empty($dados['labelFormularioEnviar']) ? $dados['labelFormularioEnviar'] : 'processando' ) !!}',">
                                @csrf
                                @foreach( $dados['formulario'] as $formulario )
                                {!! $formulario !!}
                                @endforeach

                                <script src="/temas/inspinia/js/popper.min.js?v={!! versaoSistema() !!}"></script>
                                <script src="/temas/inspinia/js/bootstrap.js?v={!! versaoSistema() !!}"></script>
                                <script src="/temas/inspinia/js/plugins/summernote/summernote-bs4.js?v={!! versaoSistema() !!}"></script>
                            </form>
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

@endsection