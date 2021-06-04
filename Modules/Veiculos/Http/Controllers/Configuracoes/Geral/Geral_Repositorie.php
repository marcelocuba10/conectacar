<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\Geral;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Configuracoes\Geral\Geral_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class Geral_Repositorie{

    CONST url = Geral_Repositorie_Campos::url;

    static function index(){
        return Geral_Repositorie_Campos::index();
    }

    static function create(){
        return Geral_Repositorie_Campos::createorEdit();
    }

    static function store($data){

        $data['id'] = Auth()->user()->hash_id;

        validaSeEmailJaExiste($data);
        verificaSenhaIgual($data);
        
        $data['nome_fantasia'] = deixaApenasTexto($data['nome_fantasia']);
        $data['nome_fantasia'] = str_replace('_','',$data['nome_fantasia']);

        validaNomeFantasia($data['nome_fantasia'],Auth()->user()->emp_id);

        unset($data['re-password']);
        if( !empty($data['password']) ){
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        if( !empty($data['logotipo']) ){
            $data['logotipo'] = Tratamentos::trataUpload(['pasta' => '/clientes/'.Auth()->user()->emp_id,'arquivo' => $data['logotipo'],]);
        } else {
            unset($data['logotipo']);
        }

        if( !empty($data['icone']) ){
            $data['icone'] = Tratamentos::trataUpload(['pasta' => '/clientes/'.Auth()->user()->emp_id,'arquivo' => $data['icone'],]);
        } else {
            unset($data['icone']);
        }

        $data['tipo'] = 'emp';
        $data['nivel'] = 'emp';
        $data['modulo'] = 'Veiculos';
        $data['emp_id'] = Auth()->user()->emp_id;
        $data['users_id'] = Auth()->user()->emp_id;

        if( !is_null(site_id()['nome_fantasia']) ){
            unset($data['nome_fantasia']);
        } else {
            $data['url'] = $data['nome_fantasia'] . '.'.urlBaseSite();
        }

        if( site_id()['tema'] > 0 ){
            if( (int)site_id()['tema'] != (int)$data['tema'] ){
                echo exibeToastrAlerta([
                    'cor' => 'warning',
                    'titulo' => 'Atenção',
                    'mensagem' => 'Não é possível trocar o tema após selecionado uma vez.',
                ]);
                dd();
            }

            unset($data['tema']);
        } else {
            $ultimo = Model('Veiculos','TemaWebsite')::create([
                'template_id' => $data['tema'],
                'emp_id' => Auth()->user()->emp_id,
                'idioma' => site_id()['quaisDados']['idioma'],
                'root' => 0,
                'grupo' => 0,
                'ordem' => 0,
                'chave' => 'settings',
                'tipo_campo_form' => Null,
                'conteudo' => Null,
            ]);

            Model('Veiculos','TemaWebsite')::create([
                'template_id' => $data['tema'],
                'emp_id' => Auth()->user()->emp_id,
                'idioma' => site_id()['quaisDados']['idioma'],
                'root' => $ultimo['id'],
                'grupo' => 0,
                'ordem' => 0,
                'chave' => 'location',
                'tipo_campo_form' => 'localizacao',
                'conteudo' => '{"url":"https:\/\/www.google.com\/maps\/embed?pb=!1m18!1m12!1m3!1d28811.819141822467!2d-54.63142616597834!3d-25.489120510703128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f68536b5395967%3A0xee204a1298868b2d!2sParan%C3%A1%20Country%20Club!5e0!3m2!1spt-BR!2spy!4v1611661595537!5m2!1spt-BR!2spy","width":"100%","height":"500px"}',
            ]);
        }

        Model('Gerenciamento','UsersSemRelacionamentos')::find(Auth()->user()->emp_id)->update($data);
        Model('Gerenciamento','UsersDados')::find(Auth()->user()->emp_id)->update($data);

        return direcionaAposConcluir(Geral_Repositorie_Campos::url);
    }

    static function show($url){
        $data = Geral_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Geral_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Veiculos','Documentos')::destroy($id);
    }
}