<?php
namespace App\Traits;
use Auth;
use View;
use App\Repositories\MenuSistema;
use App\Repositories\WidgetRepositorie;
use App\Repositories\WebsiteRepositorie;

trait Handler {
  public function __construct() {

    // para o menu do sistema
    $this->middleware(function($request, $next) {
      // View::share(['menu' => MenuSistema::MenuSistema()]);
      return $next($request);
    });



    // para o widget da dashboard Cliente
    $this->middleware(function($request, $next) {
      // View::share(['widgetCliente' => qualWidgetExibe()['quadros']]);
      return $next($request);
    });



    // para os widgets na página inicial
    $this->middleware(function($request, $next) {
      // View::share(['dadosWebsite' => WebsiteRepositorie::dadosWebsite()]);
      return $next($request);
    });
  }
}