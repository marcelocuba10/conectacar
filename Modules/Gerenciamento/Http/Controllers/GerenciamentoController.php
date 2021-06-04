<?php

namespace Modules\Gerenciamento\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Veiculos\Http\Controllers\VeiculosRespositorie;

class GerenciamentoController extends Controller
{
    public function index(){
    	$data = VeiculosRespositorie::index();
        return view('temas.inspinia.dashboard.dashboard',compact('data'));
    }
}