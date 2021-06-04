<?php
namespace App\Http\Middleware;

use Closure;
use App;

class Language
{
    public function handle($request, Closure $next)
    {
        $idiomaPadrao = ( !empty(idiomaPadrao()) ? idiomaPadrao() : app()->getLocale() );
        App::setLocale($idiomaPadrao);
        return $next($request);
    }
}