<?php
namespace App\Http\Middleware;

use App\Repositories\MenuSistema;
use App\Models\User;
use App\Models\UsersAcesso;
use App\Models\Financeiro;
use Closure;
use DB;
use App\Repositories\CamposdoSistema\backend\financial\Deposits_CamposdoSistema;
use App\Http\Controllers\backend\financial\DepositsController;

class VerificaPendentes
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
        $pendentes = Financeiro::verificaDepPendentes();
        
		if($pendentes == 0){
             return redirect()->action('backend\financial\DepositsController@pendentes');
        }
        
        return $next($request);
    }
}
