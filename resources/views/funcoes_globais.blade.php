<script language=javascript>    
// ============================================================================================================================================================
//  bloqueia tecla F5, CTRL + R, CTRL +F5
// ============================================================================================================================================================
@if( StatusDoSistema() === 1 )
document.onkeydown = function(){
    switch (event.keyCode){
        case 116 :
        event.returnValue = false;
        event.keyCode = 0;
        return false;
        case 82:
        if (event.ctrlKey) {
            event.returnValue = false;
            event.keyCode = 0;
            return false;
        }
    }
}
@endif
// ============================================================================================================================================================
//  bloqueia tecla F5, CTRL + R, CTRL +F5
// ============================================================================================================================================================







// ============================================================================================================================================================
//  intervalo de chamada - padrão de 60 segundos
// ============================================================================================================================================================
setInterval(function(){ajaxGlobal();}, 5000);
// ============================================================================================================================================================
//  intervalo de chamada - padrão de 60 segundos
// ============================================================================================================================================================







// ============================================================================================================================================================
// ============================================================================================================================================================
function ajaxGlobal(){
    $.get("{!! url('/global') !!}", function( data ) {

        document.getElementById("mostraCotacao").innerHTML = data.cotacaoMoedas;

        // document.getElementById("mostraQdadeTicket").innerHTML = data.mostraQdadeTicket;
        // document.getElementById("mostraQdadeTicket").style.display = ( data.mostraQdadeTicket === 0 ? 'none' : 'block' );

        // document.getElementById("mostraQdadeChat").innerHTML = data.mostraQdadeChat;
        // document.getElementById("mostraQdadeChat").style.display = ( data.mostraQdadeChat === 0 ? 'none' : 'block' );

        // document.getElementById("mostraQdadeCorreInterno").innerHTML = data.mostraQdadeCorreInterno;
        // document.getElementById("mostraQdadeCorreInterno").style.display = ( data.mostraQdadeCorreInterno === 0 ? 'none' : 'block' );
    });
}
// ============================================================================================================================================================
// ============================================================================================================================================================







// ============================================================================================================================================================
//  busca lista de alertas que foram gerados
// ============================================================================================================================================================
function alternaPernaMMN(){
    $.get("{!! url('/change_leg_mmn') !!}", function( data ) {
        document.getElementById("pernaMMNSelecionadaDashboard").innerHTML = data;
    });
}
// ============================================================================================================================================================
//  busca lista de alertas que foram gerados
// ============================================================================================================================================================







// ============================================================================================================================================================
//  responável por montar a tela inicial
// ============================================================================================================================================================
var validaTela = 1;
function montaTela(n) {
    $(window).scrollTop(0);
    document.body.style="overflow: hidden;";
    document.getElementById('carregandoPagina').style.display = 'block';
    var ajaxRequest = $.get(n, {
    }).fail(function (v) {
        alert('{!! trataTraducoes('Página temporariamente indisponível') !!}');
    }).done(function (v) {
        $('#destinoHtml').html(v);
        window.history.pushState('', '', n);
    }).always(function (v) {
        window.history.pushState('', '', n); // remover
        document.getElementById('carregandoPagina').style.display = 'none';
        document.body.style="overflow: auto;";
    });

    var caminho = n.split("/");
    var verifica = caminho[(caminho.length-1)];
    if( verifica != 'create' || verifica != 'edit' ){
    }
}

function fechaMenu(){
    $("body").removeClass("mini-navbar")
}

var windowWidth = screen.width;
// ============================================================================================================================================================
//  responável por montar a tela inicial
// ============================================================================================================================================================








// ============================================================================================================================================================
//  pega a localização completa do usuário
// ============================================================================================================================================================
function pegaLocalizacaoCompleta(){
    $.get("http://ip-api.com/json?fields=status,message,continent,continentCode,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,currency,isp,org,as,asname,reverse,mobile,proxy,hosting,query", function( data ) {
        alert(data.status);
        document.getElementById("pegaLocalizacaoCompleta").innerHTML = data.status;
    });
}
// ============================================================================================================================================================
//  pega a localização completa do usuário
// ============================================================================================================================================================
</script>