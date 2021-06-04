<link href="/css/style_1.css" rel="stylesheet">
<div class="row">
    <div class="col-md-2">
        {!! trataTraducoes('Clique e arraste as imagens para alterar a ordem de exibição') !!}
        <br><br>
        {!! trataTraducoes('Marque a caixa ao lado das imagens para remover uma ou mais imagens.') !!}
    </div>
    <div class="col-md-10">
        <div class="gallery">
            <form name="formulario" id="formulario" action="{!! url($dados['dados']['rota_geral']) !!}/reordenar" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true">
                @csrf
                <ul class="reorder_ul reorder-photos-list">
                    @foreach( $dados['data'] as $fotos )
                    <li id="image_li_{!! $fotos['id'] !!}" class="ui-sortable-handle" style="height: 200px !important; overflow: hidden !important; width: 18% !important; background-image: url('{!! $fotos['imagem'] !!}'); background-repeat: no-repeat !important; background-position: center top !important; background-size: 100% auto !important; background-color: #ffffff !important;">
                        <input type="checkbox" name="remover_foto[]" value="{!! $fotos['id'] !!}">
                        <input type="hidden" name="reordena_foto[]" value="{!! $fotos['id'] !!}">
                    </li>
                    @endforeach
                </ul>
                <button style="" type="submit" class="btn-block btn btn-sm btn-primary" name="botaoEnviar" id="botaoEnviar"><i class="fa fa-refresh" style="color: #fff"></i> &nbsp; {!! trataTraducoes('Atualizar') !!}</button>
            </form>
        </div>
    </div>
</div>

<script src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
        $('.reorder_link').html('save reordering');
        $('.reorder_link').attr("id","save_reorder");
        $('#reorder-helper').slideDown('slow');
        $('.image_link').attr("href","javascript:void(0);");
        $('.image_link').css("cursor","move");
        $("#save_reorder").click(function( e ){
            if( !$("#save_reorder i").length ){
                $(this).html('').prepend('<img src="/apagar/refresh-animated.gif"/>');
                $("ul.reorder-photos-list").sortable('destroy');
                $("#reorder-helper").html( "Reordering Photos - This could take a moment. Please don't navigate away from this page." ).removeClass('light_box').addClass('notice notice_error');

                var h = [];
                $("ul.reorder-photos-list li").each(function() {  h.push($(this).attr('id').substr(9));  });

                $.ajax({
                    type: "POST",
                    url: "orderUpdate.php",
                    data: {ids: " " + h + ""},
                    success: function(){
                        window.location.reload();
                    }
                }); 
                return false;
            }   
            e.preventDefault();     
        });
    });
</script>