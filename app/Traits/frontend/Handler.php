<?php
namespace App\Traits\frontend;
use Auth;
use View;

trait Handler {
  public function __construct() {
    $this->middleware(function($request, $next) {
      View::share([
        // 'listaMarcas' => Model('Veiculos','Marcas')::orderby('marca')->get(),
        // 'listaVeiculos' => Model('Veiculos','Veiculos')::orderby('id','desc')->get(),
        // 'listaLojas' => Model('Gerenciamento','Users')::where('modulo','Veiculos')->inRandomOrder()->get(),
      ]);
      return $next($request);
    });
  }
}