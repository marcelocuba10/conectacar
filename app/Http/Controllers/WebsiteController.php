<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\EscreveArquivoTraducaoLaravel;
use App\Repositories\MenuSistema;
use App\Repositories\Componentes;
use App\Repositories\SendRepositorie;
use App\Models\Users;
use App\Models\UsersDados;
use App\Models\PinSolicitados;
use Modules\Faq\Http\Controllers\Faq\Faq_Faq_Repositorie;
use QRCode;

class WebsiteController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function website(){
        return view('Modules.'.site_id()['modulo'].'.'.site_id()['id'].'.default');
    }

    public function index(){
        return view('/clientes/'.site_id()['id'].'/site/home');
    }

    public function home(){
        return view('temas.'.site_id()['template'].'.dashboard.'.site_id()['id'].'.'.Auth()->user()->nivel.'_home');
    }

    public function illegal_action(){
        // dd('illegal_action');
    }

    public function sair(){
        Auth::logout();
        return redirect('/');
    }

    public function forgot_password(){
        Auth::logout();
        return view('temas.'.site_id()['template'].'.forgot_password');
    }

    public function forgot_password_send(Request $request){
        Auth::logout();
        $email = $request->email;
        $consulta = Model('Gerenciamento','UsersSemRelacionamentos')::where('email',$email)->count();
        if( $consulta === 0 ){
            return back()->withErrors(trataTraducoes('Email não existe na base de dados'));
        }

        $ultimo = SendRepositorie::index('esqueciMinhaSenha',['email'=>$request->email]);
        if( is_array($ultimo) ){
            if( !empty($ultimo['email_nao_encontrado']) ){
                return redirect('/forgot_password')->with('email', $request->email)->withErrors('Email não localizado');
            }
        }
        return redirect('login')->withErrors('Verifique seu email');
    }

    public function register($hash=''){
        Auth::logout();
        return view('temas.'.site_id()['template'].'.register',['hash' => $hash]);
    }

    public function terms_and_conditions(){
        Auth::logout();
        return view('temas.'.site_id()['template'].'.terms_and_conditions');
    }

    public function register_grava(Request $request){
        Auth::logout();
        $data = $request->all();

        if( empty($data['termos']) ){
            return redirect('/register')->withErrors(trataTraducoes('Você precisa aceitar os termos de uso para prosseguir'));
        }

//Valida o email
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            return redirect('/register')->withErrors(trataTraducoes('Email inválido'));
        }
        $verificaEmail = Model('Gerenciamento','UsersSemRelacionamentos')::where('email', $data['email'])->first();
        if( !empty($verificaEmail) ){
            return redirect('login')->withErrors(trataTraducoes('Email já está em uso'));
        }

        if(empty($data['password']) || is_null($data['password'])){
            return redirect('/register')->withErrors(trataTraducoes('A senha não pode ficar em branco'));
        }


        $data['root'] = 0;

        $_SESSION['email'] = $data['email'];
        $data['password'] = bcrypt($data['password']);
        $data['nivel'] = 'emp';
        $data['modulo'] = 'Veiculos';
        $data['name'] = $data['nome'];

        $consultaIdioma = Model('Gerenciamento','Idiomas')::where('sigla', strtoupper($data['idioma']))->count();
        $data['idioma'] = ( $consultaIdioma === 1 ? strtolower($data['idioma']) : 'pt-br' );

        $cadastroNovo = Model('Gerenciamento','UsersSemRelacionamentos')::create($data);
        $cadastroNovo->update(['emp_id' => $cadastroNovo['id']]);
        Model('Gerenciamento','UsersDados')::find($cadastroNovo['id'])->update($data);

        if( StatusDoSistema() > 0 ){
            SendRepositorie::index('envio_pin_primeiro_cadastro',['envia'=>StatusDoSistema()]);
        }
        Auth::loginUsingId($cadastroNovo['id']);
        return redirect('/'.strtolower(Auth()->user()->modulo).'/painel');
    }

    public function check_register(){

        if( empty($_SESSION['email']) ){
            return redirect('/register')->withErrors(trataTraducoes('Sessão reiniciada'));
        }

        Auth::logout();
        $senhaFinanceira = Componentes::montaQuadrosSenhaFinanceira([
            'qdade'=>6,
            'campoName'=>'senha_confirmacao',
            'campoNameNull'=>'&nbsp;',
            'tipo'=>'number',
            'tamanho'=>12,
            'tamanhoCheio'=>1,
        ]);
        $senhaFinanceira .= Componentes::MontaBotao([
            'tipo' => 'BotaoModalSalvar',
            'titulo' => 'validar',
            'size'=>12,
            'tamDiv' => 12,
            'tamanhoCheio'=>1,
        ]);
        return view('temas.'.site_id()['template'].'.check_register',['senhaFinanceira' => $senhaFinanceira,'tamanhoCheio'=>0]);
    }

    public function check_register_grava(Request $request){
        $data = $request->except('_token');

        $pin = '';
        foreach ($data as $key => $value) {
            foreach( $value as $senha ){
                $pin .= $senha;
            }
        }

        $qualUsuario = Users::where('email', $_SESSION['email'])->where('email_validado', 0)->first()['id'];
        $retorno = PinSolicitados::where('users_id', $qualUsuario)->where('pin', $pin)->first();

        if( !empty($retorno) ){
            PinSolicitados::destroy($retorno['id']);

            $concluiCadastro = [
                'nivel' => 'cli',
                'modulo' => site_id()['modulo'],
                'tentativas' => 0,
                'matricula' => Componentes::geraNumeroMatricula(),
                'email_validado' => 1,
            ];

            Users::find($qualUsuario)->update($concluiCadastro);

//  função para criar o básico igual para todos os novos usuários
            criacaoBasicaUsuario($qualUsuario);

            SendRepositorie::index('boas_vindas_primeiro_cadastro',['envia'=>StatusDoSistema()]);

            Auth::loginUsingId($qualUsuario);

            return redirect('/register_success')->with(trataTraducoes('Conta validada com sucesso'));
        } else {
            return redirect('/check_register')->withErrors(trataTraducoes('Chave PIN incorreta'));
        }


        Auth::logout();
        return view('temas.'.site_id()['template'].'.check_register');
    }

    public function register_success(){
        return view('temas.'.site_id()['template'].'.register_success');
    }

    public function resend_mail(){
        SendRepositorie::index('envio_pin_primeiro_cadastro',['envia'=>StatusDoSistema()]);
        return redirect('/check_register')->withErrors(trataTraducoes('Email reenviado com sucesso'));
    }

    public function traducao(){
        EscreveArquivoTraducaoLaravel::geraTraducoesGeral();
// dd('Traduação finalizada com sucesso');
        return redirect('/');
    }

    public function publicidade($tipo,$idioma){
        $conexao = 'App\Models\Publicidade';
        $conexao = new $conexao();
// $data = $conexao::select('pagina')->groupby('pagina')->get();
        $resultado = $conexao::
        select('pagina')->
        groupby('pagina')->
        get();

        $data = [];
        foreach( $resultado as $key => $consulta ){
            $data[$consulta['pagina']] = $conexao::
            where('pagina',$consulta['pagina'])->
            where('tipo',$tipo)->
            where('idioma',$idioma)->
            orderby('pagina')->
            orderby('id')->
            get();
        }
// return $data;

// $tamanhoPagina = [0, 0, 679.20, 960.00];
        $larguraTela = 1280;
        $alturaTela = 906;
        $tamanhoPagina = [0, 0, 695.00, 960.00];
        $paginacao = [
            'esquerda' => 995,
            'topo' => 780,
            'largura' => 210,
            'altura' => 17,
        ];

        if( !empty($_GET['exporta']) ){
            return view('clientes.1.publicidade.'.$tipo.'.index', compact('data','tipo','idioma','paginacao','larguraTela','alturaTela'));
        } else {
            return \PDF::loadView('clientes.1.publicidade.'.$tipo.'.index', compact('data','tipo','idioma','paginacao','larguraTela','alturaTela'))
            ->setPaper($tamanhoPagina, 'landscape')
            ->stream();
// ->download('01.pdf');
        }
    }

    public function comprovante($hash){
        return 'Em construção';
    }

    public function forgot_password_hash($hash){
        Auth::logout();
        return view('temas.'.site_id()['template'].'.email.forgot_password_hash', compact('hash'));
    }

    public function forgot_password_hash_grava($hash, Request $request){
        Auth::logout();
        $data = $request->all();

        if( $data['password'] != $data['re-password'] ){
            return redirect('/forgot_password/'.$hash.'')->withErrors('Senha e confirmação de senha não conferem');
        }

        $consulta = Model('Gerenciamento','UsersForgotPassword')::where('hash', $hash)->orderby('id', 'desc')->first();
        if( empty($consulta) ){
            return redirect('/forgot_password')->withErrors('hash_invalida')->with('Hash inválida');
        }

        Model('Gerenciamento','UsersForgotPassword')::destroy($consulta['id']);
        Model('Gerenciamento','UsersSemRelacionamentos')::find($consulta['users_id'])->update(['password' => bcrypt($data['password'])]);

        Auth::loginUsingId($consulta['users_id']);
        return redirect(strtolower(Auth()->user()->modulo).'/painel')->withErrors('Senha alterada com sucesso')->with('Senha alterada com sucesso');
    }
}