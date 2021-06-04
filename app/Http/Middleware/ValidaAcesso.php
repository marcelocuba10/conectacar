<?php
namespace App\Http\Middleware;

use App\Repositories\MenuSistema;
use App\Models\User;
use App\Models\UsersAcesso;
use App\Models\EmpresasClientes;
use Closure;
use DB;
use Auth;
use Session;

class ValidaAcesso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cadastroNivel = Auth()->user();

        if( $cadastroNivel['tentativas'] > 3 ){
            Session::flush();
            Auth::logout();
            return redirect('/painel/sair');
        }

        if( Auth()->check() ){
            return $next($request);

            // switch ($cadastroNivel['nivel']) {
            //     case 'adm':
            //     case 'emp':
            //     case 'usu':
            //         break;
                
            //     default:
            //         $consultaACesso = EmpresasClientes::
            //                             // where('emp_id', site_id()['id'])->
            //                             where('users_id', Auth()->user()->id)->
            //                             where('modulo', site_id()['modulo'])->
            //                             count();

            //         if( Auth()->user()->nivel === 'adm' ){
            //             $consultaACesso = 1;
            //         }

            //         if( (int)$consultaACesso === 0 ){
            //             return redirect('/sair');
            //         }
            //         break;
            // }
        }

        $url_teste = str_replace('backend/', '', "$_SERVER[REQUEST_URI]");
        $url_teste = str_replace('/show', '', $url_teste);

        if( !Auth()->check() ){

            if( $url_teste != '/home' ){

                $permitido = UsersAcesso::
                where('menu.link', $url_teste)->
                where('users_acesso.emp_id', $_SESSION['EmpresasClientes'])->
                where('users_acesso.modulo', $modulo)->
                where('users_acesso.users_id', $users_id)->
                where('menu.deleted_at', Null)->
                groupby('menu_id')->
                select(['users_acesso.menu_id','menu.id','menu.root','menu.menu','menu.icone','menu.ordem','menu.link','menu.target',])->
                leftjoin('menu', 'menu.id', '=', 'users_acesso.menu_id')->
                orderby('menu.ordem')->
                orderby('menu.menu')->
                count();

                dd('teste');

                if ( (int)$valida === 0 ){
                    // trataOperacaoIlegal();
                }
            }
        }

        if( $cadastroNivel['nivel'] === 'cli' && $cadastroNivel['email_validado'] === 0 ){
            Auth::logout();
            session_destroy();
            return redirect(url('/validate_your_email'));
        }

        return $next($request);
    }
}
