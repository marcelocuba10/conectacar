<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\Pagamento;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Configuracoes\Pagamento\FormasPagamento_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class FormasPagamento_Repositorie{

    CONST url = FormasPagamento_Repositorie_Campos::url;

    static function index(){
        return FormasPagamento_Repositorie_Campos::index();
    }

    static function create(){
        return FormasPagamento_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, FormasPagamento_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        $data['ativo'] = ( array_key_exists('ativo', $data) ? 1 : 0 );

        if( !empty($data['id']) ){
            $consulta = Model('Veiculos','FormasPagamento')::where('emp_id', Auth()->user()->emp_id)->find($data['id']);
            if( empty($consulta) ){
                return trataOperacaoIlegal();
            }

            Model('Veiculos','FormasPagamento')::find($data['id'])->update($data);
        } else {
            $data['emp_id'] = Auth()->user()->emp_id;
            $ultimo = Model('Veiculos','FormasPagamento')::create($data);
        }

        return direcionaAposConcluir(FormasPagamento_Repositorie_Campos::url);
    }

    static function show($url){
        $data = FormasPagamento_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return FormasPagamento_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Veiculos','FormasPagamento')::destroy($id);
    }
}