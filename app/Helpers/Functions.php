<?php
use App\Repositories\EscreveArquivoTraducaoLaravel;
use App\Repositories\WidgetRepositorie;
use App\Repositories\Componentes;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use App\Repositories\ConsultasRepositore;
use App\Repositories\Tratamentos;
use App\Repositories\backend\api\Blockchain\BlockchainAPI;
use Illuminate\Support\Facades\DB;

@session_start();

$_SESSION['idioma'] = ( !empty($_SESSION['idioma']) ? $_SESSION['idioma'] : 'pt-br' );

function urlBaseSite(){
    return 'conectaerp.com.py';
}

function trataTraducoes($palavra){
    $siteId = site_id();
    $idioma = strtolower( !empty($idioma) ? $idioma : idiomaPadrao() );
    $modulo = ( Auth()->check() ? Auth()->user()->modulo : ( !empty($siteId['modulo']) ? $siteId['modulo'] : 'Veiculos' ) );

    $chave = deixaApenasTexto($palavra,250);
    $consultaSeExiste = Model($modulo,'Traducoes')::where('chave', $chave)->where('idioma', $idioma)->first();

    if( empty($consultaSeExiste) ){
        $data = [
            'emp_id' => 0,
            'chave' => $chave,
            'idioma' => $idioma,
            'texto' => $palavra
        ];

        $consultaSeExiste = Model($modulo,'Traducoes')::create($data);
        EscreveArquivoTraducaoLaravel::EscreveArquivoTraducaoLaravel($idioma);
    // } else {
    //     $arquivoSolicitado = base_path() . '\Modules\\'.$siteId['modulo'].'\Resources\lang\\'.$idioma.'.php';
    //     $retorno = require_once($arquivoSolicitado);

    //     return $retorno[$chave];
    }
    return $consultaSeExiste['texto'];
}

function StatusDoSistema(){
// deixar 1 para servidor on-line
// deixar 0 para rodar local e não dar erro no envio de email

    $url = "$_SERVER[HTTP_HOST]";

    
    if( strpos($url, 'localhost') === false ){
        return 1;
    } else {
        return 0;
    }
}

function dadosUsuarioCompleto($id=''){
    $id = ( !empty($id) ? $id : Auth()->user()->id );

    if( Auth()->check() ){
        $consulta = Model('Gerenciamento','Users')::leftjoin('users_dados','users_dados.id','=','users.id')->
// leftjoin('moedas_plataforma','moedas_plataforma.id','=','users_dados.moeda_padrao')->
// with('IdiomaSelecionado')->
        find($id);
        return $consulta;
        
    }
    return [];
}

function destravaBotaoFormulario(){
    echo '<script>this.botaoEnviar.disabled=false</script>';
}


function copyright($data=''){
    $corTexto = ( !empty($data['corTexto']) ? $data['corTexto'] : Null );
    return '<span style="color: '.$corTexto.'">&copy; <a href="https://'.urlBaseSite().'/" style="color: '.$corTexto.'" target="_blank">ConectaCode</a><br>Copyright 2021 / '.date('Y');
}


function suporteDireita(){
    return trataTraducoes('Suporte') . '&nbsp; +55 35 9 9117-4038';
}


function urlCompleta(){
    return str_replace('backend/', '', "$_SERVER[REQUEST_URI]");
}


function trataUrlparaFuncao($url, $form = ''){
    if( !empty($form) ){
        $url = "motorBusca('".url($url)."')";
    } else {
        $url = "montaTela('".url($url)."')";
    } 
    return $url;
}


function montaBotoesDatatable($data, $url='', $id=''){
    if( Auth()->check() ){
        $retorno = '';
        foreach( $data as $botoes ){
            if( !empty($botoes['url']) ){
                $botoes['url'] = str_replace('|url|', $url, $botoes['url']);
            }
            if( !empty($id) ){
                $botoes['url'] = str_replace('|id|', $id, $botoes['url']);
            }
            $retorno .= Componentes::MontaBotao($botoes);
        }
        return $retorno;
    }
    return [];
}


function capturaDadosdeAjuda(){
    $url = "$_SERVER[REQUEST_URI]";

    return Model('Gerenciamento','Ajuda')::where('url',$url)->first();
}


function montaCamposFormulario($data,$tipo='f'){
    if( Auth()->check() ){
        if( strtolower($tipo) === 'f' ){
            return FormularioRepositorie::formulario($data);
        } else {
            return Componentes::MontaBotao($data);
        }
    }
}


function limpaUrl($url){
    $campos01 = array('http://', 'https://', 'www.', '/');
    $campos02 = array('', '', '', '', '');
    $url = str_replace($campos01, $campos02, $url);

    return $url;
}


function direcionaAposConcluir($data){
    $url = ( is_array($data) ? $data['url'] : $data );
    $cor = ( !empty($data['cor']) ? $data['cor'] : 'success' );
    $titulo = trataTraducoes( !empty($data['titulo']) ? $data['titulo'] : 'Tudo certo' );
    $mensagem = trataTraducoes( !empty($data['mensagem']) ? $data['mensagem'] : 'Operação realizada com sucesso' );
    $target = ( !empty($data['target']) ? $data['target'] : Null );

    if( !is_null($target) ){
        echo '<meta http-equiv="refresh" content="1; URL=/"/>';
    }

    echo destravaBotaoFormulario();

    return "
    <script>
    toastr.".$cor."(
    '".$mensagem."',
    '".$titulo."', {
        timeOut: 2000,
        showEasing: 'linear',
        showMethod: 'slideDown',
        closeMethod: 'fadeOut',
        closeDuration: 300,
        closeEasing: 'swing',
        closeButton: false,
        progressBar: true,
    }
    );
    montaTela('".$url."');
    </script>
    ";
}


function verificaTipoRequisicao(){
    return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
}


function verificarotaShow(){
    $url = explode('/',"$_SERVER[REQUEST_URI]");
    return $url[count($url)-1];
}


function versaoSistema(){
    return '20200611';
    return date('Ymdhis') . rand();
}


function pegaIPUsuario(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


function currencyToSystemDefaultBD($curr, $casas=2,$formata=false){
    $casas = ( mostraMoedaPadrao('p') === 'pyg' ? 3 : 2 );
    if( !empty($curr) ){
        $curr = ( is_numeric($curr) ? number_format($curr,8) : $curr );
        $curr = str_replace(',','.',$curr);
        $curr = explode('.',$curr);
        $nova = '';
        
        foreach( $curr as $key => $data ) {
            if( count($curr)-1 > $key ){
                $nova .= $data;
            }
        }

        $nova .= ','.$curr[$key];
        
        $curr = $nova;
        
        $curr = str_replace(' ', '', $curr);
        $curr = str_replace('R$', '', $curr);
        $curr = str_replace(',','.',$curr);
        $curr = @number_format($curr,$casas);
        $curr = str_replace(',', '', $curr);

        if( $formata ){
            return number_format($curr,$casas);
        }

        return $curr;
    }
    return 0;
}


function formataMoeda($curr, $casas=8){
    $curr = str_replace(' ', '', $curr);
    $curr = str_replace('.','',$curr);
    $curr = str_replace(',','.',$curr);
    return $curr;
}


function configuracoesPlataforma(){
    $saida = [];
    $retorno = Model('Gerenciamento','Configuracoes')::get();
    $retorno->makeVisible(['chave','valor','tipo','campo_form','mascara'])->toArray();
    foreach( $retorno as $data){
        $saida[$data['chave']] = $data['valor'];
    }

    return $saida;
}


function calculaCamposFormulario($data=''){
// operações disponíveis
// sinal de + = soma
// sinal de - = subtração
// sinal de * = multiplicação
// sinal de / = divisão
// texto de igual = não executa nenhuma operação, apenas iguala ao campo de entrada

    if( !empty($data['filhos']) ){

        $formulaMontada = '<script>function calculaCamposFormulario(){';

        foreach( $data['filhos'] as $key => $filhos ){
            $campo_1 = $filhos['campo_1'];
            $campo_2 = $filhos['campo_2'];
            $operacao = $filhos['operacao'];
            $campo_destino = $filhos['campo_destino'];
            $casas_decimais = ( !empty($filhos['casas_decimais']) ? $filhos['casas_decimais'] : 2 );

            $valorFator = 1;
            $i=0;
            while ($i < $casas_decimais) {
                $valorFator .= 0;
                $i++;
            }

            $formulaMontada .= 'var campo_1'.$key.' = formulario.'.$campo_1.'.value;';
            $formulaMontada .= 'if( !campo_1'.$key.' ){';
            $formulaMontada .= 'campo_1'.$key.' = 0.00;';
            $formulaMontada .= '}';
            $formulaMontada .= 'campo_1'.$key.' = campo_1.replace(/[^\d]+/g,"");';
            $formulaMontada .= 'var campo_02'.$key.' = formulario.'.$campo_2.'.value;';
            $formulaMontada .= 'var campo_2'.$key.' = ( campo_02'.$key.'.indexOf("%") > 0 ? campo_02'.$key.'.replace("%","") : campo_02 )';
            $formulaMontada .= ( $operacao === 'igual' ? 'var total'.$key.''.$key.' = parseInt(campo_1'.$key.');' : 'var total'.$key.''.$key.' = parseInt(campo_1'.$key.') '.$operacao.' parseInt(campo_2'.$key.');' );
            $formulaMontada .= 'total'.$key.' = parseInt(total'.$key.' / '.$valorFator.');';
            $formulaMontada .= ' if( campo_2'.$key.'.indexOf("%") > 0 ){ total'.$key.' = total'.$key.'/100 } ';
            $formulaMontada .= 'var formatado'.$key.' = total'.$key.'.toLocaleString("pt-br", { minimumFractionDigits: '.$casas_decimais.' });';
            $formulaMontada .= 'formulario.'.$campo_destino.'.value = formatado'.$key.';';
        }
        $formulaMontada .= '}</script>';
    } else {
$campo_1 = ( !empty($data['campo_1']) ? $data['campo_1'] : Null );                        //  campo de origem do calculo
$campo_2 = ( !empty($data['campo_2']) ? $data['campo_2'] : Null );                        //  campo de origem do calculo
$campo_destino = ( !empty($data['campo_destino']) ? $data['campo_destino'] : Null );      //  campo de destino do calculo
$operacao = ( !empty($data['operacao']) ? $data['operacao'] : '+' );                      //  tipo de operação que vai ser realizada, + * - / (passar o símbolo mesmo)
$casas_decimais = ( !empty($data['casas_decimais']) ? $data['casas_decimais'] : 2 );      //  casas decimais da saida
$valorFator = 1;
$i=0;
while ($i < $casas_decimais) {
    $valorFator .= 0;
    $i++;
}

$formulaMontada = '<script>';
$formulaMontada .= 'function calculaCamposFormulario()';
$formulaMontada .= '{';
$formulaMontada .= 'var campo_1 = formulario.'.$campo_1.'.value;';
$formulaMontada .= 'if( !campo_1 ){';
$formulaMontada .= 'campo_1 = 0.00;';
$formulaMontada .= '}';
$formulaMontada .= 'campo_1 = campo_1.replace(/[^\d]+/g,"");';
$formulaMontada .= 'var campo_02 = formulario.'.$campo_2.'.value;';
$formulaMontada .= ' if( campo_02.indexOf("%") > 0 ){ var campo_2 = campo_02.replace("%","") } else { var campo_2 = campo_02 }';
$formulaMontada .= ' if( campo_02.indexOf("%") > 0 ){ var porcentagem = 100 } else { var porcentagem = 1 }';
$formulaMontada .= ( $operacao === 'igual' ? 'var total = parseInt(campo_1);' : 'var total = parseInt(campo_1) '.$operacao.' parseInt(campo_2);' );
$formulaMontada .= 'total = parseInt(total / '.$valorFator.');';
$formulaMontada .= 'total = parseInt(total / porcentagem);';
$formulaMontada .= 'var formatado = total.toLocaleString("pt-br", { minimumFractionDigits: '.$casas_decimais.' });';
$formulaMontada .= 'formulario.'.$campo_destino.'.value = formatado;';
$formulaMontada .= '}';
$formulaMontada .= '</script>';
}

return $formulaMontada;

// esse modelo formata com moeda padrão, podemos estudar
// var formatado = total.toLocaleString("pt-br", { minimumFractionDigits: '.$casas_decimais.'});
// var formatado = total.toLocaleString("pt-br", { style: "currency", currency: "USD" });
}


function valorMoedaSolicitada($siglaMoeda='USD'){
    $retorno = Model('Gerenciamento','MoedasPlataforma')::where('moeda_sigla', $siglaMoeda)->orderby('id', 'desc')->first()['valor_inicial'];
    if( empty($retorno) ){
        $retorno = Model('Gerenciamento','CriptoMoedasConversoes')::where('moeda_origem', $siglaMoeda)->orderby('id', 'desc')->first()['ultimo'];
    }
    return ( !empty($retorno) ? $retorno : 1 );
}


function moeda_oficial(){ return site_id()['configuracoes']['moeda_padrao']; }
function moeda_info(){ return site_id()['configuracoes']['moeda_padrao']; }


function formataDataCompleta($string,$campo=''){

    if( !is_null($string) ){
        if( empty(explode(' ',$string)) ){
            $array = explode(' ',$string);
            $hora = $array[1];
            $data = $array[0];
        } else {
            $hora = '00:00:00';
            $data = $string;
        }

        $data_separada = explode('-',$data);

        switch ($campo) {
            case 'data_hora':
            $data_completa = $data_separada[2].'/'.$data_separada[1].'/'.$data_separada[0].' '.$hora;
            break;

            case 'horaSemSegundos':
            $data_completa = explode(':',$hora)[0] . ':' . explode(':',$hora)[1];
            break;

            case 'hora':
            $data_completa = $hora;
            break;

            case 'dia':
            $data_completa = $data_separada[2];
            break;

            case 'mes':
            $data_completa = $data_separada[1];
            break;

            case 'ano':
            $data_completa = $data_separada[0];
            break;

            default:
            $data_completa = $data_separada[2].'/'.$data_separada[1].'/'.$data_separada[0];
            break;
        }
    } else {
        $data_completa = '';
    }

    return $data_completa;
}


function statusDeposito($statusID=0){
    switch ($statusID) {
        case 0:
        return trataTraducoes('Pendente');
        break;

        default:
        return trataTraducoes('Aprovado');
        break;
    }
}


function idiomaPadrao($tipo='idioma'){
    $_SESSION['idioma'] = ( !empty($_SESSION['idioma']) ? $_SESSION['idioma'] : 'pt-br' );
    $siteId = site_id();
    $idioma = $_SESSION['idioma'];

    if( Auth()->check() ){
        $consulta = Model(Auth()->user()['modulo'],'Configuracoes')::
        where('emp_id', $siteId['emp_id'])->
        where('chave', 'idioma_padrao')->
        first();
        if( !empty($consulta) ){
            $idioma = strtolower($consulta['conteudo']);
        }
    }

    if( Auth()->check() )  {
        $idiomaPadrao = dadosUsuarioCompleto()['idioma'];
        $idioma = ( isset($idiomaPadrao) ? $idiomaPadrao : $idioma );
    }

    switch ($tipo) {
        case 'data':
        $consulta = Model('Gerenciamento','Idiomas')::where('sigla', strtolower($idioma))->count();
        $retorno = ( !empty($consulta['formato_data']) ? $consulta['formato_data'] : 'd/m/Y' );
        break;

        default: 
        $retorno = $idioma;
        break;
    }

    return $retorno;
}


function pegaIdiomasDisponiveis(){
    $retorno = Model('Gerenciamento','Idiomas')::get();
    $retorno = ( !empty($retorno) ? $retorno : 1 );

    $saida = [];
    foreach( $retorno as $data){
        $saida[] = [
            'titulo' => trataTraducoes($data['nome']),
            'sigla' => $data['sigla'],
            'imagem' => $data['bandeira'],
            'url' => $data['sigla'],
        ];
    }
    return $saida;
}


function trataLetraMaiuscula($texto){
    $texto = explode(' ', $texto);
    $novoTexto = '';
    foreach( $texto as $key => $textos ){
        $novoTexto .= ucfirst(strtolower($textos));

        if( $key < (count($texto)-1) ){
            $novoTexto = $novoTexto . ' ';
        }
    }
    return $novoTexto;
}


function dateBdToApp($date,$ano=4){
    $old = new Datetime($date);
    switch ($ano) {
        case 4:
        return $old->format(idiomaPadrao('data'));
        break;

        default:
        return $old->format(idiomaPadrao('data'));
        break;
    }
}


function break_text($text, $limit='') {
    $limit = ( !empty($limit) ? $limit : strlen($text) );
    $pos = strpos($text, ' ', $limit);
    return substr($text, 0, $limit) . '...';
}


function limitaCaracteres($texto,$limite,$quebra=false){
    $tamanho = strlen($texto);
    if($tamanho <= $limite){
        $novo_texto = $texto;
    }else{
        if($quebra == true){
            $novo_texto = trim(substr($texto, 0, $limite))."...";
        }else{
            $ultimo_espaco = strrpos(substr($texto, 0, $limite), " ");
            $novo_texto = trim(substr($texto, 0, $ultimo_espaco))."...";
        }
    }
    return $novo_texto;
}


function fotoPerfil($fotoUsers=''){
    $fotoUsers = ( !empty($fotoUsers) ? $fotoUsers : Auth()->user()->foto );
    return ( file_exists($fotoUsers) ? $fotoUsers : '/sem_foto.png' );
}


function verificaImagemSistem($qualImagem,$naoEncontrada='/sem_foto.png'){
    if( empty($qualImagem) ){
        return $naoEncontrada . '?v='.versaoSistema();
    }
    return ( file_exists(public_path() . $qualImagem) ? $qualImagem . '?v='.versaoSistema() : $naoEncontrada . '?v='.versaoSistema() );
}


function ultimosIndicados(){
    if( Auth()->check() ){
        $retorno = Model('Gerenciamento','UserArvoreIndicados')::where('root',Auth()->user()->id)->get();

        $saida = [];
        foreach($retorno as $data){
            $saida[] = [
                'data_hora' => $data['created_at'],
                'nome' => $data['name'],
                'email' => $data['email'],
            ];
        }
        return $saida;
    }
}

function dateTimeBdToApp($date){
    $old = new Datetime($date);
    return $old->format(idiomaPadrao('data').' H:i:s');
}

function dateCalculate($date, $days=0, $intervall='y', $saida='Y-m-d'){
    if( $date ){
        $old = \Carbon\Carbon::createFromFormat('Y-m-d', $date);
        switch ($intervall) {
            case 'd':
            $old->addDays($days);
            break;

            case 'm':
            $old->addMonths($days);
            break;

            default:
            $old->addYears($days);
            break;
        }
        return $old->format($saida);
    }else{
        return null;
    }
}

function formataData($data,$formato='d/m/Y'){
    $consulta = strpos($data, ' ');
    if( $consulta === false ){
        $data = $data;
    } else {
        $data = explode(' ',$data)[0];
    }

    return date($formato, strtotime($data));
}

function buscaMovimentacoesFinanceiras($tipo='transfer',$intervaloDatas='',$saida='somado'){
    if( Auth()->check() ){

        $intervaloDatas = ( !empty($intervaloDatas) ? $intervaloDatas : [date('Y-m-01 00:00:00'),date('Y-m-'.ultimoDiaMes().' 23:59:59')] );

        if( $saida === 'somado' ){
            $retorno = Model('Gerenciamento','Financeiro')::where('tipo',$tipo)->whereBetween('created_at', $intervaloDatas)->sum('total');
        } else {
            $retorno = Model('Gerenciamento','Financeiro')::where('tipo',$tipo)->orderby('id','desc')->get();
        }

        return $retorno;
    }
}


function consultaExtratoUsuario($dataInicial='',$dataFinal=''){
    if( Auth()->check() ){
        $dataInicial = ( !empty($dataInicial) ? $dataInicial : date('Y-m-01 h:m:s') );
        $dataFinal = ( !empty($dataFinal) ? $dataFinal : date('Y-m-'.ultimoDiaMes().' h:m:s') );
        $data = Model('Gerenciamento','FinanceiroSemRelacionamento')::where('users_id_origem', Auth()->user()->id)->orWhere('users_id_destino', Auth()->user()->id)->whereBetween('created_at',[$dataInicial,$dataFinal])->orderby('created_at','desc')->get();

        $consulta = Model('Gerenciamento','FinanceiroSemRelacionamento')::select('tipo')->groupby('tipo')->where('users_id_origem', Auth()->user()->id)->orWhere('users_id_destino', Auth()->user()->id)->whereBetween('created_at',[$dataInicial,$dataFinal])->get();
        $tiposDados['geral'] = ['url'=>'all', 'cor'=>'link', 'label'=>'resumo', 'icone'=>'fa fa-list-alt' ];
        foreach( $consulta as $tipo ){
            $tiposDados[$tipo['tipo']] = ['url'=>$tipo['tipo'],'label'=>$tipo['tipo']];
        }

        return compact('data','tiposDados');
    }
    return [];
}


function verificaSePossuiSenhaFinanceira(){
    if( Auth()->check() ){
        return Model('Gerenciamento','UsersPin')::where('users_id', Auth()->user()->id)->count();
    }
}


function extraiSenhaFinanceira($data,$gravaNova='n'){
    foreach( $data as $key => $datas ){
        if( strpos($key, 'senha_financeira') === false ){
        } else {
            $chave = $key;
        }
    }
    return verificaSenhaFinanceira($data[$chave], $key, $gravaNova);
}


function verificaSenhaFinanceira($senha,$nomeCampo, $gravaNova){
    if( Auth()->check() ){

        if( is_array($senha) ){
            $retorno = '';
            foreach( $senha as $dados ){
                $retorno .= $dados;
            }
            $senha = $retorno;
        }

        $checaSenhaFinanceira = Model('Gerenciamento','UsersPin')::where('users_id', Auth()->user()->id)->count();
        if( $checaSenhaFinanceira === 0 & $gravaNova === 'n' ){

            echo destravaBotaoFormulario();

            $retorno = '"';
            $retorno .= '<a onclick="';
            $retorno .= "montaTela('/settings/pins')";
            $retorno .= '" style="cursor: pointer;">';
            $retorno .= trataTraducoes('Clique aqui para cadastrar uma senha financeira');
            $retorno .= '</a>';
            $retorno .= '"';
            return Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => trataTraducoes('Atenção'),'texto' => trataTraducoes('Cadastre uma senha financeira para concluir essa ação')]);
        }

        $pin = hash_hmac('sha256', md5($senha), Auth()->user()->id);
        if( $gravaNova === 's' ){
            return $pin;
        }
        $pin = ( !empty($pin) ? $pin : date('Y-m-d h:m:s') );

        $retorno = Model('Gerenciamento','UsersPin')::where('pin', $pin)->where('users_id', Auth()->user()->id)->count();
        if( $retorno === 0 ){
            echo destravaBotaoFormulario();

            echo "<script>
            var elements = document.getElementsByClassName('".$nomeCampo."_salta');
            for(var x=0; x<elements.length; x++){
                elements[x].value= '';
            }
            </script>";

            return Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => trataTraducoes('Atenção'),'texto' => trataTraducoes('Senha financeira incorreta')]);
        }
        return [
            'status' => $retorno,
            'senhaFinanceira' => $pin,
        ];
    }
}

function abreModal($data=''){

    $chaveModal = rand(1,100000);
    $alinhamento = ( !empty($data['alinhamento']) ? $data['alinhamento'] : 'float-right' );
    $icone = ( !empty($data['icone']) ? $data['icone'] : 'fa fa-edit' );
    $url = ( !empty($data['url']) ? $data['url'] : '/settings/my_profile' );
    $botaoEnviarLabel = ( !empty($data['botaoEnviarLabel']) ? $data['botaoEnviarLabel'] : 'atualizar' );
    $botaoCancelar = ( !empty($data['botaoCancelar']) ? $data['botaoCancelar'] : 'cancelar' );

    $retorno = '<small class="'.$alinhamento.'"><a data-toggle="modal" data-target="#myModal'.$chaveModal.'"><i class="'.$icone.'"></i></a></small>
    <div class="modal inmodal" id="myModal'.$chaveModal.'" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
    <form name="formulario" id="formulario" action="'.$url.'" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true, this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.innerHTML='.trataTraducoes(''.$botaoEnviarLabel.'').'">
    @csrf
    <div class="modal-content animated fadeIn">
    <div class="modal-body">
    <p>conteudo</p>
    </div>
    <div class="modal-footer">
    <div class="col-sm-4"><button type="button" class="btn btn-white btn-block" data-dismiss="modal">'.trataTraducoes(''.$botaoCancelar.'').'</button></div>
    <div class="col-sm-8">teste
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    ';

    return $retorno;
}

function ultimoDiaMes($qualMes='',$qualAno=''){
    $qualMes = ( !empty($qualMes) ? $qualMes : date('m') );
    $qualAno = ( !empty($qualAno) ? $qualAno : date('Y') );

    return cal_days_in_month(CAL_GREGORIAN, date($qualMes) , $qualAno);
}

function usarJsonSite($arquivo){
// verifica se é modular ou fixo;
// passar sempre considerando a pasta views em diante
    $posicao = strpos($arquivo,'::');

    if( !$posicao === false ){
        $arquivo = explode('::',$arquivo);
        $url = base_path('Modules\\'.$arquivo[0].'\Resources\views\\'.$arquivo[1]);
    } else {
        $url = resource_path() . '/views/' . $arquivo;
        $url = str_replace('//', '/', $url);
        $url = str_replace('\/', '/', $url);
    }

    $url = str_replace('\\','/',$url);
    if( !file_exists($url) ){
        $url = base_path('resources\views\json.php');
    }

    return require_once($url);
}

function verificaTipoArquivo($arquivo,$layout=1){
    $extensao = explode('.',$arquivo);
    $extensao = $extensao[count($extensao)-1];

    switch ($extensao) {
        case 'zip':
        case 'rar':
        $iconeExtensao = 'fa fa-file-archive-o';
        break;

        case 'doc':
        case 'docx':
        $iconeExtensao = 'fa fa-word-o';
        break;

        case 'xls':
        case 'xlsx':
        $iconeExtensao = 'fa fa-excel-o';
        break;

        case 'jpg':
        case 'jpeg':
        case 'gif':
        case 'png':
        case 'bmp':
        $iconeExtensao = 'fa fa-image-o';
        break;

        default:
        $iconeExtensao = 'fa fa-file';
        break;
    }

    switch ($layout) {
        case 1:
        $retorno = '
        <div class="file-box">
        <div class="file">
        <a href="#">
        <span class="corner"></span>
        <div class="icon">
        <i class="'.$iconeExtensao.'"></i>
        </div>
        </a>
        </div>
        </div>
        ';
        break;

        default:
        $retorno = $arquivo;
        break;
    }

    return $retorno;
}

function senhaFinanceira($data=''){
    $data['tamanhoCheio'] = ( !empty($data['tamanhoCheio']) ? $data['tamanhoCheio'] : 0 );
    $data['tamanho'] = ( !empty($data['tamanho']) ? $data['tamanho'] : 12 );
    return Componentes::montaQuadrosSenhaFinanceira($data);
}

function exibeTaxasContrato($contrato=''){
    $contrato = ( !empty($contrato) ? $contrato : site_id()['id'] );
    $contrato = Model('Gerenciamento','ContratosTaxas')::where('contratos_id', $contrato)->get();

    $resultado = [];
    foreach( $contrato as $key => $contratos ){
        $resultado[$contratos['taxa']] = $contratos['valor'];
    }

    return $resultado;
}

function pegaTaxasContratoEmpresa($empID='',$taxa=''){
    $empID = ( !empty($empID) ? $empID : site_id()['id'] );
    if( !empty($taxa) ){
        $consulta = Model('Gerenciamento','Contratos')::where('emp_id', $empID)->leftjoin('contratos_taxas','contratos_taxas.contratos_id','=','contratos.id')->where('taxa',$taxa)->first();
        return ( !empty($consulta) ? $consulta['valor'] : 0 );
    } else {
        return Model('Gerenciamento','Contratos')::where('emp_id', $empID)->first();
    }
}

function pegaUsuariosdeUmMesmoNivel($nivel){
    return Model('Gerenciamento','Users')::where('nivel', $nivel)->get();
}

function consultaTiposAlertas(){
    $tipos = Model('Gerenciamento','AlertasTipo')::select(['id','titulo'])->get();

    $novo = [];
    foreach( $tipos as $tipo ){
        $novo[] = [ 
            'id' => $tipo['id'],
            'titulo' => trataTraducoes($tipo['titulo']),
        ];
    }

    return $novo;
}


function consultaAlertasExistentes($tipo='',$soma=false){

    if( $soma ){
        if( !empty($tipo) ){
            $consulta = Model('Gerenciamento','Alertas')::where('users_id_to', Auth()->user()->id)->count();
        } else {
            $consulta = Model('Gerenciamento','Alertas')::where('users_id_to', Auth()->user()->id)->where('alertas_tipo_id', $tipo)->count();
        }
    } else {
        if( !empty($tipo) ){
            $consulta = Model('Gerenciamento','Alertas')::where('users_id_to', Auth()->user()->id)->get();
        } else {
            $consulta = Model('Gerenciamento','Alertas')::where('users_id_to', Auth()->user()->id)->where('alertas_tipo_id', $tipo)->get();
        }
    }

    return $consulta;
}

function iconePorFormatodeArquivo($arquivo){

    $qualFormato = explode('.',$arquivo);
    $qualFormato = $qualFormato[count($qualFormato)-1];

    switch ($qualFormato) {
        case 'mp3':
        $icone = 'fa fa-music';
        break;

        case 'mpg4':
        $icone = 'fa fa-film';
        break;

        case 'xls':
        case 'xlsx':
        $icone = 'fa fa-bar-chart-o';
        break;

        case 'jpg':
        case 'jpeg':
        case 'gif':
        case 'bmp':
        case 'png':
        $icone = 'fa fa-picture-o';
        break;

        default:
        $icone = 'fa fa-file';
        break;
    }

    return $icone;
}

function forcaDownload($arquivo){
    $arquivo = public_path() . $arquivo;
    if(stripos($arquivo, './') !== false || stripos($arquivo, '../') !== false || !file_exists($arquivo)){
        return direcionaAposConcluir([
            'url'=>'/filesdownloads',
            'cor'=>'warning',
            'mensagem'=>'download_indisponivel_no_momento',
            'titulo'=>'atencao',
        ]);
    }else{
        header('Cache-control: private');
        header('Content-Type: application/octet-stream');
        header('Content-Length: '.filesize($arquivo));
        header('Content-Disposition: filename='.$arquivo);
        header("Content-Disposition: attachment; filename=".basename($arquivo));
        readfile($arquivo);
    }
}

function consultaStausTicket($id){
    return Model('Gerenciamento','TicketsAndamento')::where('ticket_id',$id)->orderby('id', 'desc')->first();
}

function qualWidgetExibe(){
    $modulo = site_id()['modulo'];
    switch ($modulo) {
        case 'gerenciamento':
        return[
            'mostraIconeDashboard' => 0,
            'quadros' => [],
        ];
        break;

        default:
        return[
            'mostraIconeDashboard' => 1,
            'quadros' => [],
        ];
        break;
    }
    return ;
}


function trocaCoresWidget($cor = ''){
    switch ($cor) {
        case 'primary':
        return '#63A0D3';
        break;

        case 'success':
        return '#86CA86';
        break;

        case 'info':
        return '#9FDBEC';
        break;

        case 'warning':
        return '#F8D3A3';
        break;

        default:
        return '#E07572';
        break;
    }
}

function formataSaidaPadronizada($mascara,$valor){
    if( empty($valor) ){
        dd('Campo de entrada ausente - Functions.php');
    }

    $mascara = Model('Gerenciamento','Mascaras')::where('chave',$mascara)->first()['mascara'];

    if( !empty($mascara) ){
        dd('máscara não encontrada');
    }

    $tamanho = count(explode('#',$mascara))-1;
    $valor = str_replace(" ","",$valor);

    if( strlen($valor) > $tamanho ){
        dd('campo diferente da mascara');
    } else {

        for($i=0;$i<strlen($valor);$i++){
            $mascara[strpos($mascara,"#")] = $valor[$i];
        }
    }

    return $mascara;
}

function calculaDiferencaDias($dataIni,$dataFim=''){
    $consulta = strpos($dataIni, ' ');
    $dataIni = ( $consulta ? explode(' ',$dataIni)[0] : $dataIni );

    $dataFim = ( !empty($dataFim) ? $dataFim : date('Y-m-d') );
    $diferenca = strtotime($dataFim) - strtotime($dataIni);
    $dias = floor($diferenca / (60 * 60 * 24));
    return $dias;
}

function pegaDadosdaEmpresa($empId=''){

    $empId = ( !empty($empId) ? $empId : site_id()['id'] );

    return Model('Gerenciamento','Empresas')::find($empId);
}

function consultaRobosCliente(){
    return Model('Gerenciamento','ProdutosContratados')::orderby('id')->get();
}

function copiatesteConteudo($data=''){

    $codigo = rand();

    $conteudo = ( !empty($data['conteudo']) ? $data['conteudo'] : 'conteudo de teste' );
    $label = ( !empty($data['label']) ? $data['label'] : 'copiar' );
    $idCampoCopiar = ( !empty($data['idCampoCopiar']) ? $data['idCampoCopiar'] : 'idCopiarTexto' ).$codigo;
    $corbotao = ( !empty($data['corbotao']) ? $data['corbotao'] : 'success' );
    $cor = ( !empty($data['cor']) ? $data['cor'] : 'success' );
    $texto = ( !empty($data['texto']) ? $data['texto'] : 'Conteúdo copiado com sucesso' );
    $titulo = ( !empty($data['titulo']) ? $data['titulo'] : 'Sucesso' );
    $icone = ( !empty($data['icone']) ? $data['icone'] : 'fa fa-copy' );
    $alinhamento = ( !empty($data['alinhamento']) ? $data['alinhamento'] : 'float-left' );

    $botaoSeletor = ( !empty($data['botaoSeletor']) ? $data['botaoSeletor'] : 'botaoCopiarTexto' ).$codigo;



    echo destravaBotaoFormulario();

    $conteudoMontado = '';
    $conteudoMontado .= '<a class="btn btn-'.$corbotao.' btn-xs '.$alinhamento.'" style="cursor: pointer; color: '.( $corbotao === 'default' ? '#000' : '#fff' ).' !important; width:99% !important; text-align: left !important" id="'.$botaoSeletor.'">';
    $conteudoMontado .= ' <i class="'.$icone.'" style="float: right !important; padding: 5px !important"></i> ';
    $conteudoMontado .= trataTraducoes($label);
    $conteudoMontado .= '<div style="overflow:hidden !important; width:0.1px !important; height:0.1px !important"><textarea id="'.$idCampoCopiar.'">'.trataTraducoes($conteudo).'</textarea></div>';
    $conteudoMontado .= ' </a>';
    $conteudoMontado .= '<script type="text/javascript">';
    $conteudoMontado .= "var copyTextareaBtn = document.querySelector('#".$botaoSeletor."');";
    $conteudoMontado .= "copyTextareaBtn.addEventListener('click', function(event){";
    $conteudoMontado .= "var copyTextarea = document.querySelector('#".$idCampoCopiar."');";
    $conteudoMontado .= 'copyTextarea.select();';
    $conteudoMontado .= "document.execCommand('copy');";
    $conteudoMontado .= 'Command: toastr["'.$cor.'"]("'.trataTraducoes($texto).'", "'.trataTraducoes($titulo).'");';
    $conteudoMontado .= 'toastr.options = {';
    $conteudoMontado .= '"closeButton": true,';
    $conteudoMontado .= '"debug": false,';
    $conteudoMontado .= '"progressBar": true,';
    $conteudoMontado .= '"preventDuplicates": false,';
    $conteudoMontado .= '"positionClass": "toast-top-right",';
    $conteudoMontado .= '"onclick": null,';
    $conteudoMontado .= '"showDuration": "400",';
    $conteudoMontado .= '"hideDuration": "1000",';
    $conteudoMontado .= '"timeOut": "7000",';
    $conteudoMontado .= '"extendedTimeOut": "1000",';
    $conteudoMontado .= '"showEasing": "swing",';
    $conteudoMontado .= '"hideEasing": "linear",';
    $conteudoMontado .= '"showMethod": "fadeIn",';
    $conteudoMontado .= '"hideMethod": "fadeOut"';
    $conteudoMontado .= '}';
    $conteudoMontado .= '});';
    $conteudoMontado .= '</script>';

    return $conteudoMontado;
}

function adicionaEspacos($textoEntrada,$tamanho=50,$posicao='r'){
    $tamanhoEntrada = strlen($textoEntrada);

    $concatenacao = '';
    for ($i=$tamanhoEntrada; $i <= $tamanho; $i++) { 
        $concatenacao .= '&nbsp;';
    }

    if( $posicao === 'l' ){
        return $concatenacao . $textoEntrada;
    }
    return $textoEntrada . $concatenacao;
}

function pegaContatosChat(){
    return Model('Gerenciamento','ListadeContatos')::with('dadosDoCliente')->where('users_id', Auth()->user()->id)->where('cli_id', '<>', Auth()->user()->id)->get();
}

function pegaCamposDatatable($datatable){
    foreach( $datatable as $listaCampos ){
        $campos[] = $listaCampos['nome_no_banco_de_dados'];
    }
    return $campos;

}

function adicionaTemponaData($data,$tempo,$operacao,$formatoSaida='Y-m-d H:I:s'){
// $data = data de entrada para formatar, sempre data completa
// $tempo = tempo que será adicionado com o tipo de tempo, ex, 1h, 10 minute, 50s
// $operacao = adição ou subtração, com os sinais de + ou -
// $formatoSaida='Y-m-d H:I:s' = formato que a data será devolvida

    $dataFormatada = date($formatoSaida, strtotime($operacao.$tempo, strtotime($data)));
    return strtotime($dataFormatada) - strtotime($data);
    return calculaDiferencaDias($data, $dataFormatada);
}

function calculaTempo($hora_inicial, $hora_final=''){
    $i = 1;
    $tempo_total;

    $hora_inicial = date('h:m:s', strtotime('+1 minute', strtotime($hora_inicial)));
    $hora_final = date('h:m:s', strtotime('+3 hours', strtotime($hora_inicial)));

    return $hora_final;
}


function formataMoedaPadraoFormulario($valor,$numberFormat=''){
    $valor = str_replace(',','.',$valor);
    $valor = explode('.', $valor);
    $totalMontado = '';
    foreach( $valor as $key => $remonta ){
        if( $key < count($valor)-1 ){
            $totalMontado = $totalMontado . $remonta;
        } else {
            $totalMontado = $totalMontado .'.'. $remonta;
        }
    }

    if( !empty($numberFormat) ){
        return $totalMontado;
        return number_format($totalMontado,$numberFormat);
    }
    return $totalMontado;
}

function moedasDaPlataforma(){
    $data = Model('Gerenciamento','MoedasPlataforma')::orderby('moeda_nome')->get();
    $cotacaoAgora = buscaMedas();

    foreach( $data as $d ){
        $moedaAtual = 'USD'.$d['moeda_sigla'];
        if( $moedaAtual != 'USDUSD' ){
            $d->update(['ultima_cotacao' => $cotacaoAgora['USD'.$d['moeda_sigla']],'data_ultima_cotacao' => date('Y-m-d h:m:s')]);
        }
    }

    return $data;
}

function exibeToastrAlerta($data){

    echo destravaBotaoFormulario();

    $cor = ( !empty($data['cor']) ? $data['cor'] : 'success' );
    $titulo = ( !empty($data['titulo']) ? $data['titulo'] : trataTraducoes('Sucesso') );
    $mensagem = ( !empty($data['mensagem']) ? $data['mensagem'] : trataTraducoes('Tudo certo') );
    return "
    <script>
    toastr.".$cor."(
    '".trataTraducoes($mensagem)."',
    '".trataTraducoes($titulo)."', {
        timeOut: 2000,
        showEasing: 'linear',
        showMethod: 'slideDown',
        closeMethod: 'fadeOut',
        closeDuration: 300,
        closeEasing: 'swing',
        closeButton: false,
        progressBar: true,
    }
    );
    </script>
    ";
}

function VerdeVermelho($qualCor='g'){
    switch ($qualCor) {
        case 'g':
        return '#2B6D2D';
        break;

        case 'c':
        return '#cecece';
        break;

        case 't':
        return 'transparent';
        break;

        default:
        return '#D50D0F';
        break;
    }
}

function mostraIconeAnimado($qualIcone=''){
    switch ($qualIcone) {
        case 'circle':
        $conteudo = '<div class="ibox-content"><div class="spiner-example"><div class="sk-spinner sk-spinner-circle"><div class="sk-circle1 sk-circle"></div><div class="sk-circle2 sk-circle"></div><div class="sk-circle3 sk-circle"></div><div class="sk-circle4 sk-circle"></div><div class="sk-circle5 sk-circle"></div><div class="sk-circle6 sk-circle"></div><div class="sk-circle7 sk-circle"></div><div class="sk-circle8 sk-circle"></div><div class="sk-circle9 sk-circle"></div><div class="sk-circle10 sk-circle"></div><div class="sk-circle11 sk-circle"></div><div class="sk-circle12 sk-circle"></div></div></div></div>';
        break;

        default:
        $conteudo = '<div class="ibox-content"><div class="spiner-example"><div class="sk-spinner sk-spinner-circle"><div class="sk-circle1 sk-circle"></div><div class="sk-circle2 sk-circle"></div><div class="sk-circle3 sk-circle"></div><div class="sk-circle4 sk-circle"></div><div class="sk-circle5 sk-circle"></div><div class="sk-circle6 sk-circle"></div><div class="sk-circle7 sk-circle"></div><div class="sk-circle8 sk-circle"></div><div class="sk-circle9 sk-circle"></div><div class="sk-circle10 sk-circle"></div><div class="sk-circle11 sk-circle"></div><div class="sk-circle12 sk-circle"></div></div></div></div>';
        break;
    }

    return $conteudo;
}

function layoutExtrato($data){
    $original = $data['original'];
    $tipoTransacao = ( !empty($data['tipoTransacao']) ? $data['tipoTransacao'] : ' - ' );
    $dataTransacao = ( !empty($data['dataTransacao']) ? $data['dataTransacao'] : ' - ' );
    $campoDe = ( !empty($data['campoDe']) ? $data['campoDe'] : ' - ' );
    $campoPara = ( !empty($data['campoPara']) ? $data['campoPara'] : ' - ' );
    $valorCampo = ( !empty($data['valorCampo']) ? $data['valorCampo'] : ' - ' );
    $valorMoedaFiat = ( !empty($data['valorMoedaFiat']) ? $data['valorMoedaFiat'] : ' - ' );
    $taxaValor = ( !empty($data['taxaValor']) ? $data['taxaValor'] : ' - ' );
    $taxaValorFiat = ( !empty($data['taxaValorFiat']) ? $data['taxaValorFiat'] : ' - ' );
    $totalValor = ( !empty($data['totalValor']) ? $data['totalValor'] : ' - ' );
    $totalValorFiat = ( !empty($data['totalValorFiat']) ? $data['totalValorFiat'] : ' - ' );
    $hash = ( !empty($data['hash']) ? $data['hash'] : ' - ' );   
    $beneficiado = ( !empty($data['beneficiado']) ? $data['beneficiado'] : null );


    switch ($tipoTransacao) {
        case 'receive':
        case 'deposits':
        case 'conversion':
        case 'deposits_posts':
        case 'transferwallet':
        $corTexto = '#509940';
        break;
        case 'transfer':
        $corTexto = (($beneficiado!=null) && $beneficiado == Auth()->user()->id ) ? '#509940' : '#D03F33';
        break;

        case 'payments':
        $corTexto = (($beneficiado!=null) && $beneficiado == Auth()->user()->id ) ? '#509940' : '#D03F33';
        $totalValor = (($beneficiado!=null) && $beneficiado == Auth()->user()->id ) ? mostraMoedaLayoutPadrao($original['valor'] - $original['valor_plataforma']): mostraMoedaLayoutPadrao($original['valor']);
        $taxaValor = (($beneficiado!=null) && $beneficiado == Auth()->user()->id ) ? mostraMoedaLayoutPadrao($original['valor_plataforma']) :  mostraMoedaLayoutPadrao('0.00');


        break;

        default:
        $corTexto = '#D03F33';
        break;
    }

    $montagem  = '<tr class="filter '.$tipoTransacao.'">';
    $montagem .= '<td class="text-left"><span style="color:'.$corTexto.'; font-weight: bold">'.trataTraducoes($tipoTransacao).'</span><br><small>'.$dataTransacao.'</small></td>';
    $montagem .= '<td class="text-left"><strong><i class="fa fa-long-arrow-right" style="color: #D03F33;"></i></strong> '.$campoDe.'<br><strong><i class="fa fa-long-arrow-left" style="color: #509940;"></i></strong> '.$campoPara.'</td>';
    $montagem .= '<td class="text-right">'.$valorCampo.'<br><small>'.$valorMoedaFiat.'</small></td>';
    $montagem .= '<td class="text-right">'.$taxaValor.'<br><small>'.$taxaValorFiat.'</small></td>';
    $montagem .= '<td class="text-right">'.$totalValor.'<br><small>'.$totalValorFiat.'</small></strong></td>';
    $montagem .= '<td class="text-left">'.montaCamposFormulario(['cor'=>'info','url'=>'/receipt/'.$hash,'tipo'=>'LinkGeralIcone','icone'=>'fa fa-eye','target'=>'_blank',],'b').'</td>';
    $montagem .= '</tr>';

    return $montagem;
}

function confereValorMinimoTransacao($tipoTransacao,$valor){
    switch ($tipoTransacao) {
        case 'withdrawalslist':
        $valorMinimo = configuracoesPlataforma()['plataforma_valor_minimo_saque'];
        break;

        default:
        $valorMinimo = configuracoesPlataforma()['plataforma_valor_minimo_deposito'];
        break;
    }

    if( formataMoedaPadraoFormulario($valorMinimo) > formataMoedaPadraoFormulario($valor) ){
        return exibeToastrAlerta([
            'cor' => 'warning',
            'mensagem' => 'valor_minimo_para_saque_deposito' .':'.formataMoedaPadraoFormulario($valor),
            'titulo' => 'atencao',
        ]);
    }

}

function classificacaoRedesLojasEstrelas($redeLojaid=1){

    $qdade0 = '<i class="fa fa-star-o"></i>';
    $qdade1 = '<i class="fa fa-star-half-o"></i>';
    $qdade2 = '<i class="fa fa-star"></i>';

    $montado = '<span style="color: #FBD141">' . $qdade2 . $qdade2 . $qdade2 . $qdade1 . $qdade0 . '</span>';

    return $montado;
}

function verificaImagemouIcone($arquivo,$tamanho='50%',$qualTamanho='w',$cor='#fff'){
    $cor = ( $cor === 'btn-default' ? '#000' : '#fff' );

    $verifica = explode('.',$arquivo);

    $verifica1 = explode('texto|',$arquivo);

    if( count($verifica) > 1 ){
        return '<img src="'.$arquivo.'" style="'.( strtolower($qualTamanho) === 'w' ? 'width' : 'height' ).': '.$tamanho.' !important;">';
    } else if( count($verifica1) > 1 ){
        return str_replace('texto|','',$arquivo);
    } else {
        return '<i class="'.$arquivo.'" style="color: '.$cor.' !important"></i>';
    }
}

function Model($modulo='Gerenciamento',$model){
// Modulo::Model
// $conexao = 'App\Models\\'..'\\'.$model[1].'';
// $conexao = 'Modules\\'.$model[0].'\app\Models\\'.$model[1];

    $conexao = 'Modules\\'.$modulo.'\app\Models\\'.$model;
    return new $conexao();
}

function verificaTipodeRegistro($registro){
    if( count(explode('.',$registro)) > 1 ){
        return 'file';
    }

    if( strlen(str_replace('#','',$registro)) === 6 ){
        return 'color';
    }

    return 'textarea';
}

function trataOperacaoIlegal($mensagem=''){
    Model('Gerenciamento','Users')->find(Auth()->user()->id)->increment('tentativas',1);
    return direcionaAposConcluir([
        'url'=>'/ilegal_action',
        'cor'=>'error',
        'mensagem'=>'Você executou uma operação ilegal',
        'titulo'=>'Atenção',
    ]);
    dd();
    echo '<script>window.location.href = "/ilegal_action";</script>';
}

function verificaAlteracaoManualURL($data){
    if( empty($data) ){
        return trataOperacaoIlegal();
        dd();
    }
}

function mostraMoedaLayoutPadrao($valor,$mostraDIV='s',$mostraMoeda='s'){
    $retorno = ( $mostraDIV === 's' ? '<div class="row">' : Null );
    $retorno .= ( $mostraDIV === 's' ? '<div class="col-lg-8 text-right">' : Null );
    $retorno .= '<span style="white-space:nowrap !important;">';
    $retorno .= number_format(currencyToSystemDefaultBD($valor),2) . '<small>'.( $mostraMoeda === 's' ? ' ( BRL )' : Null ).'</small><br>';
    $retorno .= '<small>' . number_format(currencyToSystemDefaultBD($valor)*configuracoesPlataforma()['valor_moeda_padrao_referente_dolar'],2) . ' '.( $mostraMoeda === 's' ? ' ( USD )' : Null ).' </small>';
    $retorno .= '</span>';
    $retorno .= ( $mostraDIV === 's' ? '</div>' : Null );
    $retorno .= ( $mostraDIV === 's' ? '</div>' : Null );
    return $retorno;
}

function converteMoedasGlobal($valor,$moedaEntrada,$moedaSaida){
    return 'em criacao';
}

function validaPerfil(){
    $dadosRetornados = dadosUsuarioCompleto();

    $campo = 0;
    $campo += ( $dadosRetornados['name'] != explode('@',$dadosRetornados['email'])[0] ? 1 : 0 );
    $campo += ( is_null($dadosRetornados['email']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['foto']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['idioma']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['sexo']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['tipo_documento']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['cpf_cnpj']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['rg_ie']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['nascimento_fundacao']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['cep']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['logradouro']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['numero']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['complemento']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['bairro']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['cidade']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['estado']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['nacionalidade']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['naturalidade']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['pais']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['fone_1']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['dados']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['filiacao_pai']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['filiacao_mae']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['moeda_padrao']) ? 0 : 1 );
    $campo += ( is_null($dadosRetornados['perna_mmn']) ? 0 : 1 );

    $porcentagemConcluida = round(($campo / 25) * 100);
    return $porcentagemConcluida;
}

function pegaMensagensUsuario(){
    return Model('Gerenciamento','Correio')->
    join('correio_leitura','correio_leitura.correio_id','=','correio.id')->
    where('correio.users_id_to', Auth()->user()->id)->
    where('correio_leitura.correio_id','<>',Null)->
    get();
}


function validaData($date, $format='Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

function geraPDF($data){
    $nome = ( !empty($data['nome']) ? $data['nome'] : 'PDF_'.rand().'_'.date('Ymdhms').'.pdf' );
    $arquivo = ( !empty($data['arquivo']) ? $data['arquivo'] : ['arquivo' => 'vazio', 'conteudo' => trataTraducoes('Conteúdo informado para geração do PDF não foi localizado!<br><br>Tente novamente utilizando um registro que seja de sua propriedade!<br><br>Com essa ação, foi detectada uma operação ilegal.<br><br>Sua ação foi registrada e seu acesso está sendo monitorado!')] );
    $conteudo = ( !empty($data['conteudo']) ? $data['conteudo'] : [] );

    if( !empty($arquivo['arquivo']) ){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($arquivo['conteudo']);
        return $pdf->download($nome.'.pdf');
    }

    $pagina = (!empty($data['pagina']) ? $data['pagina'] : 'portrait');

    $pdf = PDF::setOptions(['dpi' => 96, 'defaultFont' => 'verdana'])->setPaper('A4',$pagina)->loadView($arquivo, compact('conteudo'));
    return $pdf->download($nome.'.pdf');
}

function adicionaCamposTexto($data){
// entrada -  valor que sera utilizado como início da operação
// campo - valor utilizado para concatenar em caso de preenchimento
// tamanhoSaida - qual o tamanho em caracteres da saída da operação

    $entrada = ( !empty($data['entrada']) ? $data['entrada'] : NUll );

    if( $entrada != Null ){
        $campo = ( !empty($data['campo']) ? $data['campo'] : 0 );
        $tamanhoSaida = ( !empty($data['tamanhoSaida']) ? $data['tamanhoSaida'] : 10 );

        $totalAtual = strlen($entrada);
        if( $totalAtual >= $tamanhoSaida ){
            return $entrada;
        }

        $inicio = 1;
        $termino = $tamanhoSaida-$totalAtual;

        $complemento = '';
        while ( $inicio <= $termino ) {
            $complemento .= $campo;
            $inicio++;
        }
        return $complemento.$entrada;
    }
    return Null;
}

function mesesAno($qualMes=0){
    $qualMes = ( !empty($qualMes) ? (int)$qualMes : 0 );

    $meses = [
        trataTraducoes('Janeiro'),
        trataTraducoes('Fevereiro'),
        trataTraducoes('Março'),
        trataTraducoes('Abril'),
        trataTraducoes('Maio'),
        trataTraducoes('Junho'),
        trataTraducoes('Julho'),
        trataTraducoes('Agosto'),
        trataTraducoes('Setembro'),
        trataTraducoes('Outubro'),
        trataTraducoes('Novembro'),
        trataTraducoes('Dezembro'),
    ];

    if( $qualMes === 0 ){
        return $meses;
    }
    return $meses[($qualMes-1)];
}

function mostraTentativasFraudes($usersID){
    $data = Model('Gerenciamento','Users')::find($usersID);

    switch ($data['tentativas']) {
        case 0:
        $retorno = '<div style="background-color: transparent !important; font-weight: bold !important; width: 100% !important; text-align: center !important">'.$data['tentativas'].'</div>';
        break;

        case 1:
        $retorno = '<div style="background-color: yellow !important; font-weight: bold !important; width: 100% !important; text-align: center !important">'.$data['tentativas'].'</div>';
        break;

        case 2:
        $retorno = '<div style="background-color: orange !important; font-weight: bold !important; width: 100% !important; text-align: center !important; color: #fff !important">'.$data['tentativas'].'</div>';
        break;

        default:
        $retorno = '<div style="background-color: red !important; font-weight: bold !important; width: 100% !important; text-align: center !important; color: #fff !important">'.$data['tentativas'].'</div>';
        break;
    }

    return $retorno;
}

function searchThemeByUrl(){
    $url = strtolower(limpaUrl("$_SERVER[HTTP_HOST]"));
    $qualTema = Model('Gerenciamento','Users')::where('users.url', $url)->join('users_dados','users_dados.id','=','users.id')->first('users_dados.qual_tema');
    $resultado = ( !empty($qualTema) ? 'temas.'.$qualTema['qual_tema'] : '/clientes/1/site' );
    return $resultado;
}

function websiteFAQ(){
    if( Auth()->user()->nivel === 'adm' || Auth()->user()->nivel === 'ger' ){
        $data = Model('Gerenciamento','Faq')::withTrashed()->get();
    } else {
        $data = Model('Gerenciamento','Faq')::where('aberto', 1)->get();
    }

    $retorno = [];
    foreach( $data as $datas ){
        $retorno[] = [
            'pergunta' => trataTraducoes($datas['Pergunta']),
            'resposta' => trataTraducoes($datas['Resposta']),
            'created_at' => $datas['created_at'],
            'util' => rand(),
            'inutil' => rand(),
        ];
    }
    return $retorno;
}

function metaTags(){
    $data = Model('Gerenciamento','MetaTags')::get();

    $retorno = '';
    foreach( $data as $datas ){
        $retorno .= trataTraducoes($datas['palavra']).',';
    }
    return $retorno;
}

function pegaProdutos(){
    return Model('Gerenciamento','Produtos')::orderby('valor')->get();
}

function importaJsonInicial($data,$root=0,$template=0){
    if( !is_string($data) ){
        foreach( $data as $key0 => $data0 ){
            $ultimo0 = Model('Gerenciamento','Website')::create([
                'template_id' => $template,
                'emp_id' => site_id()['emp_id'],
                'grupo' => 0,
                'root' => $root,
                'label' => $key0,
                'conteudo' => ( is_string($data0) ? ( explode('|',$data0)[0] ) : Null ),
                'tipo_campo_formulario' => ( is_string($data0) ? ( !empty(explode('|',$data0)[1]) ? explode('|',$data0)[1] : 'text' ) : Null ),
            ]);
            $root = $ultimo0['id'];
            importaJsonInicial($data0, $root, $template);
        }
    }
}

function MenuSistema(){
    if( Auth()->check() ){
        $permitido = Model('Gerenciamento','UsersAcesso')::
        where('users_acesso.users_id', Auth()->user()->nivel)->
// orwhere('users_acesso.users_id', Auth()->user()->id)->
// orwhere('users_acesso.users_id', 0)->
        where('users_acesso.modulo', Auth()->user()->modulo)->
        get();

        $menuMontado['menu'] = [];

        foreach ($permitido as $key => $menu1) {
            if( (int)$menu1['qualMenu']['root'] === 0 && !is_null($menu1['qualMenu']['menu']) ){
                $menuMontado['menu'][$menu1['qualMenu']['ordem']]['id'] = $menu1['qualMenu']['id'];
                $menuMontado['menu'][$menu1['qualMenu']['ordem']]['root'] = $menu1['qualMenu']['root'];
                $menuMontado['menu'][$menu1['qualMenu']['ordem']]['menu'] = $menu1['qualMenu']['menu'];
                $menuMontado['menu'][$menu1['qualMenu']['ordem']]['icone'] = $menu1['qualMenu']['icone'];
                $menuMontado['menu'][$menu1['qualMenu']['ordem']]['ordem'] = $menu1['qualMenu']['ordem'];
                $menuMontado['menu'][$menu1['qualMenu']['ordem']]['link'] = $menu1['qualMenu']['link'];
                $menuMontado['menu'][$menu1['qualMenu']['ordem']]['target'] = $menu1['qualMenu']['target'];
                $menuMontado['menu'][$menu1['qualMenu']['ordem']]['menuFilho'] = [];

                foreach ($permitido as $key2 => $menu2) {
                    if( (int)$menu1['qualMenu']['id'] === (int)$menu2['qualMenu']['root'] ){
                        $menuMontado['menu'][$menu1['qualMenu']['ordem']]['menuFilho'][$menu2['qualMenu']['ordem']]['id'] = $menu2['qualMenu']['id'];
                        $menuMontado['menu'][$menu1['qualMenu']['ordem']]['menuFilho'][$menu2['qualMenu']['ordem']]['root'] = $menu2['qualMenu']['root'];
                        $menuMontado['menu'][$menu1['qualMenu']['ordem']]['menuFilho'][$menu2['qualMenu']['ordem']]['menu'] = $menu2['qualMenu']['menu'];
                        $menuMontado['menu'][$menu1['qualMenu']['ordem']]['menuFilho'][$menu2['qualMenu']['ordem']]['icone'] = $menu2['qualMenu']['icone'];
                        $menuMontado['menu'][$menu1['qualMenu']['ordem']]['menuFilho'][$menu2['qualMenu']['ordem']]['ordem'] = $menu2['qualMenu']['ordem'];
                        $menuMontado['menu'][$menu1['qualMenu']['ordem']]['menuFilho'][$menu2['qualMenu']['ordem']]['link'] = $menu2['qualMenu']['link'];
                        $menuMontado['menu'][$menu1['qualMenu']['ordem']]['menuFilho'][$menu2['qualMenu']['ordem']]['target'] = $menu2['qualMenu']['target'];
                    }
                }
            }
        }

        return $menuMontado['menu'];
    }
}

function alturaNivelUsuario($nivel){

    switch ($nivel) {
        case 'emp':
        return ['ger','usu','cli','for'];
        break;

        case 'ger':
        return ['usu','cli','for'];
        break;

        case 'usu':
        return ['cli','for'];
        break;

        case 'cli':
        return [];
        break;

        default:
        return ['emp','ger','usu','cli','for'];
        break;
    }
}


function site_id(){
    if( Auth()->check() ){
        $qualTema = Model('Gerenciamento','UsersSemRelacionamentos')::
        where('id',Auth()->user()->emp_id)->
        with(['quaisDados'])->
        first();
    } else {
        $qualTema = Model('Gerenciamento','UsersSemRelacionamentos')::
        where('url',strtolower(limpaUrl("$_SERVER[HTTP_HOST]")))->
        with(['quaisDados'])->
        first();
    }

    $qualTema = ( !empty($qualTema) ? $qualTema : Model('Gerenciamento','UsersSemRelacionamentos')::with(['quaisDados'])->find(1) );

    $qualTema['template'] = ( !empty($qualTema['template']) ? $qualTema['template'] : 'inspinia' );

    return $qualTema;
}

function escreveValoresPorExtenso($data){


    $value = ( !empty($data['valor']) ? $data['valor'] : 0 );
    $value = ( !is_array($data) ? $data : $value );
    $value = str_replace(',','.',$value);
    $value = str_replace('.00.00','.00',$value);


    $uppercase = ( !empty($data['uppercase']) ? $data['uppercase'] : 0 );

    if (strpos($value, ",") > 0) {
        $value = str_replace(".", "", $value);
        $value = str_replace(",", ".", $value);
    }

    $singular = [
        trataTraducoes("centavo"),
        trataTraducoes(""),
        trataTraducoes("mil"),
        trataTraducoes("milhão"),
        trataTraducoes("bilhão"),
        trataTraducoes("trilhão"),
        trataTraducoes("quatrilhão"),
    ];
    $plural = [
        trataTraducoes("centavos"),
        trataTraducoes(""),
        trataTraducoes("mil"),
        trataTraducoes("milhões"),
        trataTraducoes("bilhões"),
        trataTraducoes("trilhões"),
        trataTraducoes("quatrilhões")
    ];

    $u = [
        trataTraducoes(""),
        trataTraducoes("um"),
        trataTraducoes("dois"),
        trataTraducoes("três"),
        trataTraducoes("quatro"),
        trataTraducoes("cinco"),
        trataTraducoes("seis"),
        trataTraducoes("sete"),
        trataTraducoes("oito"),
        trataTraducoes("nove")
    ];
    $d = [
        trataTraducoes(""),
        trataTraducoes("dez"),
        trataTraducoes("vinte"),
        trataTraducoes("trinta"),
        trataTraducoes("quarenta"),
        trataTraducoes("cinquenta"),
        trataTraducoes("sessenta"),
        trataTraducoes("setenta"),
        trataTraducoes("oitenta"),
        trataTraducoes("noventa")
    ];
    $d10 = [
        trataTraducoes("dez"),
        trataTraducoes("onze"),
        trataTraducoes("doze"),
        trataTraducoes("treze"),
        trataTraducoes("quatorze"),
        trataTraducoes("quinze"),
        trataTraducoes("dezesseis"),
        trataTraducoes("dezesete"),
        trataTraducoes("dezoito"),
        trataTraducoes("dezenove")
    ];
    $c = [
        trataTraducoes(""),
        trataTraducoes("cem"),
        trataTraducoes("duzentos"),
        trataTraducoes("trezentos"),
        trataTraducoes("quatrocentos"),
        trataTraducoes("quinhentos"),
        trataTraducoes("seiscentos"),
        trataTraducoes("setecentos"),
        trataTraducoes("oitocentos"),
        trataTraducoes("novecentos")
    ];

    $z = 0;

    $moedaPadrao = strtoupper(configuracoesPadrao(Auth()->user()->id)['moeda_padrao']);
    

    switch ($moedaPadrao) {
        case 'PYG':
            $fator = Model('Gerenciamento','MoedasPlataforma')::where('moeda_sigla',$moedaPadrao)->first()['fator'];
            break;
        
        default:
            $fator = 1;
    }

    $value = str_replace('.','',$value);

    $value = number_format($value * $fator, 2, ".", ".");
   
    $integer = explode(".", $value);
    $cont = count($integer);
    for ($i = 0; $i < $cont; $i++)
        for ($ii = strlen($integer[$i]); $ii < 3; $ii++)
            $integer[$i] = "0" . $integer[$i];

        $fim = $cont - ($integer[$cont - 1] > 0 ? 1 : 2);
        $rt = '';
        for ($i = 0; $i < $cont; $i++) {
            $value = $integer[$i];
            $rc = (($value > 100) && ($value < 200)) ? "cento" : $c[$value[0]];
            $rd = ($value[1] < 2) ? "" : $d[$value[1]];
            $ru = ($value > 0) ? (($value[1] == 1) ? $d10[$value[2]] : $u[$value[2]]) : "";

            $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd &&
                $ru) ? " e " : "") . $ru;
            $t = $cont - 1 - $i;
            $r .= $r ? " " . ($value > 1 ? $plural[$t] : $singular[$t]) : "";
            if ($value == "000"
        )
                $z++;
            elseif ($z > 0)
                $z--;
            if (($t == 1) && ($z > 0) && ($integer[0] > 0))
                $r .= ( ($z > 1) ? " " : "") . $plural[$t];
            if ($r)
                $rt = $rt . ((($i > 0) && ($i <= $fim) &&
                    ($integer[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
        }

        if (!$uppercase) {
            return trim($rt ? $rt : "zero");
        } elseif ($uppercase == "2") {
            return trim(strtoupper($rt) ? strtoupper(strtoupper($rt)) : "Zero");
        } else {
            return trim(ucwords($rt) ? ucwords($rt) : "Zero");
        }
    }

    function deixaApenasTexto($texto,$limite=Null) {

        $original = ['à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú',' ','/','(',')','<','>'];

        $troca = ['a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','_','','_','_','',''];

        $texto = str_replace($original, $troca, $texto);

        $texto = strtolower($texto);

        if( $limite > 0 ){
            return substr($texto,0,$limite);
        }
        return $texto;
    }

    function converteMoedaPlataforma($valor,$completo='n'){
        $moedaSaida = ( !empty($moedaSaida) ? $moedaSaida : 'USD' );

        $valor = formataMoedaPadraoFormulario(formataMoedaPadraoFormulario($valor,8));

        if( $moedaSaida === 'USD' ){
            $valorReferencia = [
                'id' => 0,
                'valor' => 1,
            ];
            $referencia = $valorReferencia['valor'];
        } else {
            $valorReferencia = Model('Gerenciamento','MoedasConversoes')::where('moeda_destino', 'USD'.$moedaSaida)->orderby('id','desc')->first(['id','valor']);
            $referencia = formataMoedaPadraoFormulario($valorReferencia['valor']);
        }

        $valorCalculado = formataMoedaPadraoFormulario(($valor * $referencia),8);

        if( $completo === 'n' ){
            return $valorCalculado;
        }
        return [
            'MoedasConversoesid' => $valorReferencia['id'],
            'valorEntrada' => $valor,
            'valorReferencia' => $referencia,
            'valorCalculado' => $valorCalculado,
            'moedaSaida' => $moedaSaida,
        ];
    }

    function configuracaoWebsite($qualTema=0){
        if( $qualTema > 0 ){
            $qualtema = Model('Gerenciamento','Temas')::find($qualTema);
            $retorno['qualTema'] = $qualTema;

            if( !empty($qualtema['pegaConfiguracoes']) ){
                foreach( $qualtema['pegaConfiguracoes'] as $pegaConfiguracoes ){
                    $retorno[$pegaConfiguracoes['label']] = $pegaConfiguracoes['valor'];

                    foreach( $pegaConfiguracoes['pegaFilhos'] as $key => $pegaFilhos ){
                        $registroInicial = ( is_null($pegaFilhos['label']) ? $registroInicial : $pegaFilhos['label'] );
                        $retorno[$pegaConfiguracoes['label']][$pegaFilhos['grupo']][$pegaFilhos['label']] = $pegaFilhos['valor'];
                    }
                }
            }
        } else {
            $retorno = [];
        }

        return $retorno;
    }

    function geraTelefoneWhatsapp($telefone){
        $telefone = str_replace('-','',$telefone);
        $telefone = str_replace(' ','',$telefone);
        $telefone = str_replace('+','',$telefone);
        $telefone = str_replace('(','',$telefone);
        $telefone = str_replace(')','',$telefone);

        return $telefone;
    }

    function montaBreadcrumb($data,$botao='s'){
        $data = str_replace('/', '|', $data);

        $data = explode('|',$data);
        $final = count($data)-1;
        $resultado = '';

        foreach ($data as $key => $titulo_pagina){
            if( $key === 0 ){
                $resultado .= '<a href="/'.strtolower(Auth()->user()->modulo).'/painel" style="font-size: 16pt !important;">' . trataTraducoes(''.$titulo_pagina) . '</a>';
            } else {
                $resultado .= '<span style="font-size: 16pt !important;">'.trataTraducoes(''.$titulo_pagina).'</span>';
            }

            $resultado .= ( $key != $final ? '<span style="font-size: 16pt !important;"> / </span>' : '' );
        }

        if( $botao === 's' ){
            $resultado = '<button class="btn btn-default btn-circle" data-toggle="modal" data-target="#modalAjudaGeral"><i class="fa fa-question" style="font-size: 22px; line-height:0.8;"></i></button> &nbsp; &nbsp; ' . $resultado;
        }

        return $resultado;
    }

    function mostraToolTip($texto=''){
        if( !empty($texto) ){
            return ' onmouseover="toolTip(\''.trataTraducoes($texto).'\')" onmouseout="toolTip()"';
        }
        return;
    }

    function assets($file){
// Modulo::local/do/arquivo.css

        $conteudo = explode('::',$file);
        $diretoriobase = str_replace('\\','/',base_path());

        return $diretoriobase.'/Modules/'.$conteudo[0].'/Resources/assets/'.$conteudo[1];
    }

    function listaCamposDaTabela($tabela){
        $tabela = DB::select('show columns from traducoes');
        $campos = '';
        foreach( $tabela as $key => $percorre ){
            $campos .= "'". $percorre->Field . "'";
            if( $key < (count($tabela)-1) ){
                $campos .= ',';
            }
        }
        $campos = str_replace("'id',",'',$campos);

        return $campos;
    }

    function extraiIconParaRedesSociais($url){
        if( !empty($url) ){
            return explode('//',explode('.',$url)[0])[1];
        }
        return ;
    }

    function buscaPosicaoEmArray( $haystack, $needle, $index = NULL ) {
        if( is_null( $haystack ) ) {
            return -1;
        }
        $arrayIterator = new \RecursiveArrayIterator( $haystack );
        $iterator = new \RecursiveIteratorIterator( $arrayIterator );
        while( $iterator -> valid() ) {
            if( ( ( isset( $index ) and ( $iterator -> key() == $index ) ) or
                ( ! isset( $index ) ) ) and ( $iterator -> current() == $needle ) ) {
                return $arrayIterator -> key();
        }
        $iterator -> next();
    }
    return -1;
}

function quadroCorLegenda($cor='#f00'){
    return '<span style="color: '.$cor.'; font-size: 18pt; padding:0px !important; margin:0px !important">&#8718;</span>';
}

function buscaVeiculosPorMarca(){
    return [];

    $data = Model('Veiculos','VeiculosVariacoes')::
    where('veiculos_variacoes.tipo','montadoras')->
    join('veiculos','veiculos.montadora','=','veiculos_variacoes.id')->
    select(['veiculos_variacoes.id','veiculos_variacoes.nome','veiculos.montadora'])->
    distinct('veiculos_variacoes.nome')->
    orderby('veiculos_variacoes.nome')->
    get();

    foreach( $data as $d ){
        $d['total_por_montadora'] = Model('Veiculos','Veiculos')::where('montadora',$d['id'])->count();
    }

    return $data;
}

function configuracoesPadrao($usersId=''){
    if( empty($usersId) ){
        $consulta = Model('Veiculos','Configuracoes')::where('emp_id', 'padrao')->get();
    } else {
        $consulta = Model('Veiculos','Configuracoes')::where('emp_id', $usersId)->get();
    }

    $retorno = [];

    foreach( $consulta as $c ){
        $retorno[$c['chave']] = $c['conteudo'];
    }

    return $retorno;
}

function conversorMoedas($data){
    $moedaEntrada = $data['entrada'];
    $moedaSaida = $data['saida'];
    $valor = $data['valor'];
    $cotacao = buscaMedas();

    return $cotacao['USD'.$data['saida']];
}

function buscaMedas($tipo='coins'){

    $data = Model('Gerenciamento','MoedasPlataforma')::get();
    $consultaCotacao = json_decode(file_get_contents('https://api.infinityweb.com.br/api/'.$tipo.'/584993416879'),true);

    if( $tipo === 'coins' ){
        if( !empty($consultaCotacao) ){
            foreach( $data as $d ){
                if( $d['moeda_sigla'] === 'USD' ){
                    $d->update(['ultima_cotacao' => currencyToSystemDefaultBD(1,2),'data_ultima_cotacao'=>now()]);
                } else {
                    if( !empty($consultaCotacao['USD'.$d['moeda_sigla']]) ){
                        $d->update(['ultima_cotacao' => currencyToSystemDefaultBD($consultaCotacao['USD'.$d['moeda_sigla']],2),'data_ultima_cotacao'=>now()]);
                    }
                }
            }
        }
    }

/*
coins
cripto
*/
return $consultaCotacao;
}

function pegaDadosContrato($local='loja_veiculos_usados',$exporta='s'){
    $data = Model('Gerenciamento','CamposParaDocumentos')::where('local_uso',$local)->get();
    if( $exporta === 'n' ){
        return $data;
    }
    $saida = [];
    foreach( $data as $key => $datas ){
        $saida[$datas['grupo']][$key] = [
            'label'=>$datas['label'],
            'conteudo' => $datas['chave'],
            'correspondente' => $datas['correspondente'],
        ];
    }
    return $saida;
}



function geraEstatisticasSite($parametro=''){
    $url = urlCompleta();

    $qualCarro = substr($url, 0, 14);
    if( $qualCarro === '/cars/details/' ){
        $qualCarro = str_replace($qualCarro,'',$url);
        Model('Veiculos','Veiculos')::where('hash_id',$qualCarro)->first()->increment('visualizacoes',1);
    }

    Model('Veiculos','WebsiteEstatisticas')::create(['users_id' => site_id()['id'],'tipo' => ( !empty($parametro) ? $parametro : $url )]);
}






function consultaPais(){
    return [];
    // return Model('Gerenciamento','Users1Enderecos')::where('nivel','emp')->groupby('pais')->get('pais');
}

function consultaLocalizacao($data=''){
    $pais = ( !empty($data['pais']) ? $data['pais'] : 'vazio' );
    $estado = ( !empty($data['estado']) ? $data['estado'] : 'vazio' );
    $cidade = ( !empty($data['cidade']) ? $data['cidade'] : 'vazio' );
    $bairro = ( !empty($data['bairro']) ? $data['bairro'] : 'vazio' );

    return [];

    // return Model('Gerenciamento','Users1Enderecos')::
    // where('nivel','emp')->
    // GetPais($pais)->
    // GetEstado($estado)->
    // GetCidade($cidade)->
    // GetBairro($bairro)->
    // with('qualLoja')->
    // get();

// estado, cidade, bairro
}

function validaNomeFantasia($nome,$empresaID){
    $consulta = Model('Gerenciamento','UsersLivre')::
    where('nome_fantasia',strtolower($nome))->
    where('id','<>',$empresaID)->
    count();

    if( $consulta > 0 ){
        echo exibeToastrAlerta([
            'cor' => 'warning',
            'titulo' => 'Atenção',
            'mensagem' => 'Esse nome de site já está em uso no momento.<br>Por favor, tente um nome diferente!'
        ]);
        dd();
    }

    return 'ok';
}

function verificaMoedaParaEscrita($siglaMoeda='PYG'){
    switch ($siglaMoeda) {
        case 'PYG':
        return 100;
        break;
        
        default:
        return 1;
        break;
    }
}

function criaDadosEssenciais($data){
    Model('Gerenciamento','UsersDados')::create([
        'id'=>$data['id'],
        'nivel' => $data['nivel'],
    ]);

    $configuracoes = Model('Veiculos','Configuracoes')::where('emp_id','padrao')->get();

    foreach( $configuracoes as $dados ){
        Model('Veiculos','Configuracoes')::create([
            'emp_id' => $data['id'],
            'root' => 0,
            'label' => $dados['label'],
            'chave' => $dados['chave'],
            'conteudo' => $dados['conteudo'],
            'campo_form' => $dados['campo_form'],
            'tabela_relacional' => $dados['tabela_relacional'],
            'mascara' => $dados['mascara'],
        ]);
    }
}

function camposPadraoEmail($data){
    $campo = ( !empty($data['campo']) ? $data['campo'] : 'vazio' );
    $email = ( !empty($data['email']) ? $data['email'] : 'vazio' );

    $retorno = Model(site_id()['modulo'],'Configuracoes')::where('emp_id','email')->where('chave',$campo)->first();
    if( !empty($retorno) ){
        $retorno = trataTraducoes($retorno['conteudo']);

        switch ($campo) {
            case 'corpo_esqueci_minha_senha':
            $qualUsuario = Model('Gerenciamento','UsersSemRelacionamentos')::where('email',$email)->first();

            $chave = Model('Gerenciamento','UsersForgotPassword')::create(['emp_id' => $qualUsuario['emp_id'],'users_id' => $qualUsuario['id']]);

            $retorno = str_replace('||site_url||',url('/'),$retorno);
            $retorno = str_replace('||link_recuperar_senha||',url('/forgot_password/'.$chave['hash']),$retorno);
            break;
            
            default:
            $retorno = $retorno;
            break;
        }

        return $retorno;

    }
    return ;
}

function validaSeEmailJaExiste($data,$banco='Gerenciamento|UsersSemRelacionamentos'){

    $banco = explode('|',$banco);

    if( !empty($data['id']) ){
        $consultaEmail = Model($banco[0],$banco[1])->where('email',$data['email'])->where('hash_id','<>',$data['id'])->count();
    } else {
        $consultaEmail = Model($banco[0],$banco[1])->where('email',$data['email'])->count();
    }

    if( $consultaEmail > 0 ){
        echo exibeToastrAlerta([
            'cor' => 'warning',
            'titulo' => 'Atenção',
            'mensagem' => 'Email já está cadastrado.',
        ]);
        dd();
    }
}

function verificaSenhaIgual($data){
    if( $data['password'] != $data['re-password'] ){
        echo exibeToastrAlerta([
            'cor' => 'warning',
            'titulo' => 'Atenção',
            'mensagem' => 'Senha e confirmação de senha são diferentes.',
        ]);
        dd();
    }
}

function mostraMoedaPadrao($tamanho='p'){
    $qualMoeda = site_id()['quaisDados']['moeda_padrao'];

    if( strtolower($tamanho) === 'p' ){
        return strtolower( !empty($qualMoeda) ? strtoupper($qualMoeda) : 'USD' );
    }
    return strtoupper( !empty($qualMoeda) ? strtoupper($qualMoeda) : 'USD' );
}