<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\Configuracoes;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Configuracoes\Configuracoes\Configuracoes_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class Configuracoes_Repositorie{

    CONST url = Configuracoes_Repositorie_Campos::url;

    static function index(){
        return Configuracoes_Repositorie_Campos::index();
    }

    static function create(){
        return Configuracoes_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $configuracoesGlobais = Model('Veiculos','Configuracoes')::where('emp_id', 'padrao')->get();
        $configuracoesCliente = Model('Veiculos','Configuracoes')::where('emp_id', Auth()->user()->emp_id)->get();
        $consultaUsuario = Model('Gerenciamento','UsersDados')::find(Auth()->user()->id);

        foreach( $configuracoesGlobais as $key => $d ){
            $atual = $configuracoesGlobais->where('chave',$d['chave'])->first();
            $atualiza = [
                'emp_id' => Auth()->user()->emp_id,
                'root' => $atual['root'],
                'label' => $atual['label'],
                'chave' => $atual['chave'],
                'conteudo' => ( !empty($data[$atual['chave']]) ? $data[$atual['chave']] : Null ),
                'campo_form' => $atual['campo_form'],
                'tabela_relacional' => $atual['tabela_relacional'],
                'mascara' => $atual['mascara'],
            ];

            $configuracoes = $configuracoesCliente->where('chave',$d['chave'])->first();
            if( empty($configuracoes) ){
                Model('Veiculos','Configuracoes')::create($atualiza);
            } else {
                if( $d['chave'] === 'moeda_padrao' && $consultaUsuario['moeda_atualizada'] > 0 ){
                    $atualiza['conteudo'] = $configuracoes['conteudo'];
                }
                $configuracoes->update($atualiza);
            }

        }


        if( $consultaUsuario['moeda_atualizada'] === 1 ){
            unset($data['moeda_padrao']);
        }

        $consultaUsuario->update([
            'moeda_padrao' => ( $consultaUsuario['moeda_atualizada'] === 1 ? strtolower($consultaUsuario['moeda_padrao']) : strtolower($data['moeda_padrao']) ),
            'idioma' => strtolower($data['idioma_padrao']),
            'moeda_atualizada' => 1,
        ]);

        return direcionaAposConcluir(Configuracoes_Repositorie_Campos::url);
    }

    static function show($url){
        $data = Configuracoes_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Configuracoes_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return [];
    }
}