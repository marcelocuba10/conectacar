<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Veiculos\Checklist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Veiculos\Veiculos\Checklist\Veiculos_Checklist_Repositorie;

class Veiculos_Checklist_Controller extends Controller{
    public function index($veiculosID){
        return view('temas.inspinia.listagem',['dados'=>Veiculos_Checklist_Repositorie::index($veiculosID)]);
    }

    public function create($veiculosID){
        return view('veiculos::formulario_checklist',['dados'=>Veiculos_Checklist_Repositorie::create($veiculosID)]);
    }

    public function store($veiculosID, Request $request){
        return Veiculos_Checklist_Repositorie::store($veiculosID, $request->all());
    }

    public function show($veiculosID){
        return Veiculos_Checklist_Repositorie::index($veiculosID);
    }

    public function edit($veiculosID, $id){
        return view('temas.inspinia.formulario',['dados'=>Veiculos_Checklist_Repositorie::edit($veiculosID, $id)]);
    }

    public function update($veiculosID, Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($veiculosID, $id){
        $resultado = Veiculos_Checklist_Repositorie::destroy($veiculosID, $id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }

    public function mostraChecklist($veiculosID, $hashChecklist){
        $conteudo = Veiculos_Checklist_Repositorie::mostraChecklist($veiculosID, $hashChecklist);
        $conteudo['total'] = 1;

        $documento = [
            'nome' => trataTraducoes('Placa do veículo').' '.$conteudo['qualVeiculo']['placa'],
            'arquivo' => 'veiculos::checklist_impressao',
            'conteudo' => $conteudo,
        ];

        return geraPDF($documento);

        $conteudo = $documento['conteudo'];
        return view($documento['arquivo'],compact('conteudo'));

    }
}