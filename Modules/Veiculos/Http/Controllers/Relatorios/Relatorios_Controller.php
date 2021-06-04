<?php
namespace Modules\Veiculos\Http\Controllers\Relatorios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Relatorios\Relatorios_Repositorie;

class Relatorios_Controller extends Controller{
    public function qualBusca($qualBusca){
    	if( !empty($_GET['dados']) ){
    		$data = Relatorios_Repositorie::qualBusca($qualBusca)['data'];
    		return compact('data');
    	}
        return view('temas.inspinia.relatorios',['dados'=>Relatorios_Repositorie::qualBusca($qualBusca)]);
    }
}