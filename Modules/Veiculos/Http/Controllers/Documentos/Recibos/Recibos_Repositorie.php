<?php
namespace Modules\Veiculos\Http\Controllers\Documentos\Recibos;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Documentos\Recibos\Recibos_Repositorie_Campos;

class Recibos_Repositorie{

    CONST url = Recibos_Repositorie_Campos::url;

    static function index(){
        return Recibos_Repositorie_Campos::index();
    }

    static function create(){
        return Recibos_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Recibos_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        $dados['emp_id'] = Auth()->user()->emp_id;
        $dados['documento_id'] = 0;
        $dados['veiculo_id'] = 0;
        $dados['tipo'] = 'recibo';
        $dados['dados_origem'] = json_encode($data, true);
        $dados['documento'] = 'recibo_gerado_em_'.Auth()->user()->emp_id.'_'.date('Y_m_d_h_m_s');

        $ultimo = Model('Veiculos','DocumentosGerados')::create($dados);
        $_SESSION['ultimo_recibo'] = $ultimo;
        return direcionaAposConcluir(Recibos_Repositorie_Campos::url);
    }

    static function show(){
        $data = Recibos_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Recibos_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Veiculos','DocumentosGerados')::destroy($id);
    }
}