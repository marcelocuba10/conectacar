<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use App\Http\Requests\backend\login\LoginRequest;

use App\Models\User;
use App\Models\EmpresasClientes;
use App\Models\frontend\UsersDadosFrontEnd;

use App\Repositories\Tratamentos;
use App\Repositories\FormularioRepositorie;
use App\Repositories\LoginRepositories;
use App\Repositories\Componentes;


class LoginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        return view('temas.inspinia.login');
    }






    public function login(Request $request){
        $credentials = array(
            'email' => $request->email,
            'password' => $request->password,
        );

        if(Auth()->attempt($credentials)){

            if( !is_null(Auth()->user()->deleted_at) ){

                $consultaEmpresa = Model('Gerenciamento','UsersLivre')::find(Auth()->user()->emp_id);
                if( !is_null($consultaEmpresa['deleted_at']) ){
                    return redirect('/login')->withErrors(trataTraducoes('Empresa bloqueada'));
                }

                return redirect('/login')->withErrors(trataTraducoes('Conta cancelada'));
            }
            
            if( Auth()->user()->tentativas >= 3 ){
                Auth::logout();
                return redirect('/login')->withErrors('conta_bloqueada_por_excesso_de_operacoes_ilegais');
            }
            return redirect('/'.strtolower(Auth()->user()['modulo']).'/painel');
        } else {
            Auth::logout();
            return redirect('/login')->withErrors('email_ou_senha_incorretos')->with('email', $request->email);
        }
    }






    protected function sendFailedLoginResponse(Request $request){
        if ( !User::where('email', $request->email)->where('password', bcrypt($request->password))->first() ) {
            echo 'Senha incorreta!';
            exit;
        }
    }


    public function privacidade(){
        return view('backend.1.login.privacy', ['dados' => LoginRepositories::DadosLogin('privacidade')]);
    }


    public function termos_de_uso(){
        return view('backend.1.login.terms_of_use', ['dados' => LoginRepositories::DadosLogin('termos_de_uso')]);
    }


    public function contato(){
        return view('backend.1.login.contact');
    }


    public function forgot_password(){
        switch (site_id()['id']) {
            case 392:
                return view('backend.392.forgot_password');
                break;
            
            default:
                return view('backend.1.login.forgot_password');
                break;
        }
    }


    public function forgot_password_email(Request $request){
        return LoginRepositories::forgot_password_email($request->all());
    }


    public function reset_password(){
        return view('backend.1.login.reset_password', ['formulario' => LoginRepositories::reset_password()]);
    }


    public function reset_password_grava(Request $request){
        return LoginRepositories::reset_password_grava($request->all());
    }


    protected function permission($hash){
        if( empty(Auth()->user()->id) ){
            Auth::logout();
            return redirect(url('/'));
        }
        $consulta = LoginRepositories::permission($hash);
        if( !empty($consulta['layout']) ){
            return view($consulta['layout'], ['data' => $consulta]);
        }
    }

    protected function permission_accept($hash, $hashUsuario){
        dd($hashUsuario);

        $qualSite = site_id();
        $siteOrigem = User::where('hash', $hash)->first();

        $verifica = EmpresasClientes::
                                    where('emp_id', $siteOrigem['id'])->
                                    where('users_id', Auth()->user()->id)->
                                    where('modulo', $siteOrigem['modulo'])->
                                    where('nivel', 'cli')->
                                    count();

        if( (int)$verifica === 0 ){
            $ultimo = EmpresasClientes::create(['emp_id' => $siteOrigem['id'],'users_id' => Auth()->user()->id,'modulo' => $siteOrigem['modulo'],'nivel' => 'cli']);
            echo Componentes::geraCarteiraPadrao($siteOrigem['id'],Auth()->user()->id);
            echo Componentes::MontaBotao(['tipo' => 'botaoToaster','cor'=>'success','titulo'=>trataTraducoes('sucesso'),'texto'=>trataTraducoes('login_efetuado_com_sucesso')]);
        } else {
            echo Componentes::MontaBotao(['tipo' => 'botaoToaster','cor'=>'warning','titulo'=>trataTraducoes('erro'),'texto'=>trataTraducoes('acesso_liberado_a_plataforma')]);
        }
        echo '<script>window.location.href = "https://'.$siteOrigem['url'].'/backend/home";</script>';
    }
}