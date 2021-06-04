<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Contrato;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Veiculos\Contrato\Veiculos_Contrato_Repositorie;
use Modules\Veiculos\Http\Controllers\Veiculos\Contrato\Veiculos_Contrato_Repositorie_Campos;

class Veiculos_Contrato_Controller  extends Controller{
    public function index($veiculosID){
        if( !empty($_SESSION['ultimo_contrato']) ){
            $qualVeiculo = json_decode($_SESSION['ultimo_contrato']['dados_origem'],true)['id'];
            echo "<script>window.open('/veiculos/painel/veiculos/veiculos/".$qualVeiculo."/contrato/".$_SESSION['ultimo_contrato']['hash']."/print', '_blank');</script>";
        }
        return view('temas.inspinia.listagem',['dados'=>Veiculos_Contrato_Repositorie::index($veiculosID)]);
    }

    public function create($veiculosID){
        return view('temas.inspinia.formulario_contrato',['dados'=>Veiculos_Contrato_Repositorie::create($veiculosID)]);
    }

    public function store($veiculosID, Request $request){
        $data = $request->except(['_token','botaoEnviar']);
        if( empty($data['verificado']) ){


            $data = FormularioValidacoes::FormularioValidacoes($data, Veiculos_Contrato_Repositorie_Campos::createorEdit($veiculosID)['formRequest']);
            if( is_string($data) ){
                return $data;
            }


            $data['valor_veiculo'] = str_replace(',','',$data['valor_veiculo']);
            return view('temas.inspinia.apenas_formulario',['dados'=>Veiculos_Contrato_Repositorie::verificado($veiculosID, $data)]);
        }
        return Veiculos_Contrato_Repositorie::store($veiculosID, $data);
    }

    public function show($veiculosID){
        return Veiculos_Contrato_Repositorie::index($veiculosID);
    }

    public function edit($veiculosID, $id){
        return view('temas.inspinia.formulario',['dados'=>Veiculos_Contrato_Repositorie::edit($veiculosID, $id)]);
    }

    public function update($veiculosID, Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($veiculosID, $id){
        return Veiculos_Contrato_Repositorie::destroy($veiculosID, $id);
    }

    public function mostraChecklist($veiculosID, $hashChecklist){
        $conteudo = Veiculos_Contrato_Repositorie::mostraChecklist($veiculosID, $hashChecklist);
        $conteudo['total'] = 1;

        $documento = [
            'nome' => $conteudo['qualVeiculo']['placa'],
            'arquivo' => 'veiculos::checklist_impressao',
            'conteudo' => $conteudo,
        ];
        return geraPDF($documento);
        return view('veiculos::checklist_impressao',compact('conteudo'));
    }

    public function verifica_contrato($veiculosID,$hash_contrato){
        $_SESSION['ultimo_contrato']['ultimoContrato'] = Model('Veiculos','DocumentosGerados')::where('hash', $hash_contrato)->first();
        $_SESSION['ultimo_contrato']['qualContrato'] = $_SESSION['ultimo_contrato']['ultimoContrato']['documento'];

        $documento = [
            'nome' => $_SESSION['ultimo_contrato']['ultimoContrato']['hash'],
            'arquivo' => 'veiculos::documentos.contrato',
            'conteudo' => $_SESSION['ultimo_contrato']['qualContrato'],
        ];
        return geraPDF($documento);

        $conteudo = $documento['conteudo'];
        return view($documento['arquivo'],compact('conteudo'));
    }

    public function verifica_contrato_confirma($veiculosID,$hash_contrato, Request $request){
        // return Veiculos_Contrato_Repositorie::verifica_contrato_confirma($veiculosID,$hash_contrato,$request->all());
    }
}