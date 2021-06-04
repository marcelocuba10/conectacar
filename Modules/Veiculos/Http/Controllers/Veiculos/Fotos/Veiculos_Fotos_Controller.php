<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Fotos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Veiculos\Fotos\Veiculos_Fotos_Repositorie;

class Veiculos_Fotos_Controller extends Controller{

    public function index($veiculosID){
        return view('temas.inspinia.listagem_fotos',['dados'=>Veiculos_Fotos_Repositorie::index($veiculosID)]);
    }

    public function create($veiculosID){
        return view('temas.inspinia.formulario',['dados'=>Veiculos_Fotos_Repositorie::create($veiculosID)]);
    }

    public function store($veiculosID, Request $request){
        return Veiculos_Fotos_Repositorie::store($veiculosID, $request->all());
    }

    public function show($veiculosID){
        return 'Veiculos_Fotos_Repositorie::show($veiculosID)';
    }

    public function edit($veiculosID, $fotoID){
        return view('temas.inspinia.formulario',['dados'=>Veiculos_Fotos_Repositorie::edit($veiculosID, $fotoID)]);
    }

    public function update($veiculosID, Request $request, $id){
        return;
    }

    public function destroy($veiculosID, $id){
        $retorno = Veiculos_Fotos_Repositorie::destroy($veiculosID, $id);
        if( $retorno ){
            return response()->json(['status' => 1]);
        }
    }

    public function reordenar($veiculosID, Request $request){
        return Veiculos_Fotos_Repositorie::reordenar($veiculosID, $request->all());
    }
}