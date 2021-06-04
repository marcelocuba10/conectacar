<?php

namespace App\Http\Middleware;

use Closure;

class LogGeralSistema
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
        // if( verificarotaShow() === 'show' && verificaTipoRequisicao() === false ){
        //     return redirect('/sair');
        // }
        return $next($request);
    }
}
