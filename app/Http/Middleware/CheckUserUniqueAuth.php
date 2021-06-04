<?php
namespace App\Http\Middleware;
use Closure;
class CheckUserUniqueAuth
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->token_access != session()->get('access_token')) {
            \Auth::logout();

            echo '<script>window.location.href="/sair";</script>';
            return redirect(url('/sair'));
                    // ->route('login')
                    // ->with('message', trataTraducoes('A sessão deste usuário está ativa em outro local'));
        }

        return $next($request);
    }
}