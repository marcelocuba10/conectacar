<!DOCTYPE html>
<html>
<head>

    <script language="JavaScript">
        <!--
            function silentErrorHandler() {return true;}
            window.onerror=silentErrorHandler();
    //-->
</script>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Gerenciamento</title>
<link href="/temas/inspinia/css/bootstrap.min.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/font-awesome/css/font-awesome.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/css/plugins/toastr/toastr.min.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/css/plugins/switchery/switchery.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/css/plugins/codemirror/codemirror.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/css/plugins/codemirror/ambiance.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/js/plugins/gritter/jquery.gritter.css?v={!! versaoSistema() !!}" rel="stylesheet">
<script src="/temas/inspinia/js/jquery-3.1.1.min.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/flot/jquery.flot.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/flot/jquery.flot.tooltip.min.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/flot/jquery.flot.spline.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/flot/jquery.flot.resize.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/flot/jquery.flot.pie.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/peity/jquery.peity.min.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/jquery-ui/jquery-ui.min.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/gritter/jquery.gritter.min.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/sparkline/jquery.sparkline.min.js?v={!! versaoSistema() !!}"></script>
<script src="/js/functions.js?v={!! versaoSistema() !!}"></script>
<script src="/temas/inspinia/js/plugins/sweetalert/sweetalert.min.js?v={!! versaoSistema() !!}"></script>
<link href="/temas/inspinia/css/plugins/sweetalert/sweetalert.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/css/animate.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/css/style.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/css/person.css?v={!! versaoSistema() !!}" rel="stylesheet">
<link href="/temas/inspinia/css/plugins/ladda/ladda-themeless.min.css?v={!! versaoSistema() !!}" rel="stylesheet">
<script src="/js/tooltip.js"></script>
</head>
<body onload="ajaxGlobal();" style="background-color: #001040">

    @include('funcoes_globais')
    <div id="carregandoPagina" style="z-index: 99999px !important; position: relative !important; width: 100%; height: 100vh; background-color: #fff; left: 0; top: 0; text-align: center; padding-top: 45vh !important; display: none;">{!! trataTraducoes('Carregando conteúdo') !!}...<br>
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>

    @include('temas.inspinia.dashboard.'.strtolower(Auth()->user()->modulo))

    <script src="/qrcode/js/jsQR.js"></script>
    <script src="/qrcode/js/app.js"></script>

    <script src="/temas/inspinia/js/popper.min.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/bootstrap.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/demo/peity-demo.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/demo/sparkline-demo.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/plugins/chartJs/Chart.min.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/plugins/toastr/toastr.min.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/plugins/switchery/switchery.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/plugins/metisMenu/jquery.metisMenu.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/inspinia.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/plugins/clipboard/clipboard.min.js?v={!! versaoSistema() !!}"></script>

    <script src="/temas/inspinia/js/plugins/ladda/spin.min.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/plugins/ladda/ladda.min.js?v={!! versaoSistema() !!}"></script>
    <script src="/temas/inspinia/js/plugins/ladda/ladda.jquery.min.js?v={!! versaoSistema() !!}"></script>

    <?php
    /*
    <script>
        $(document).ready(function (){
            new Clipboard('.btn');
        });
    </script>
    <script src="/temas/inspinia/js/plugins/pace/pace.min.js?v={!! versaoSistema() !!}"></script>       faz o efeito da barra mostrando loading no topo do sistema
    */
    ?>

    <script>
        function finalizaSummernote(){}
        function tooltip(){}
    </script>

</body>
</html>