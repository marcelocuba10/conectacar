<?php
namespace Modules\Gerenciamento\Http\Controllers\Cadastros\Empresas;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Empresas_Repositorie_Campos{

    const url = '/gerenciamento/painel/cadastros/empresas';

    static function index($id = ''){
        $dados = [
            'rota_geral'=>Empresas_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Cadastros|Empresas',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Empresas_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar nova empresa',
            ]),
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>20,'label'=>'Nome','nome_no_banco_de_dados'=>'name',],
            ['tabela'=>20,'label'=>'Nome externo','nome_no_banco_de_dados'=>'nome_externo',],
            ['tabela'=>30,'label'=>'Email','nome_no_banco_de_dados'=>'email',],
            ['tabela'=>15,'label'=>'Telefone','nome_no_banco_de_dados'=>'telefone',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Gerenciamento','UsersSemRelacionamentos')::where('nivel','emp')->where('modulo','Veiculos')->orderby('name')->get();

        foreach( $data as $key => $d ){

            $d['contador'] = ($key+1);
            
            $d['nome_externo'] = '<a href="https://'.str_replace('_','',deixaApenasTexto($d['nome_fantasia'])).'.'.urlBaseSite().'" target="_blank">'.$d['nome_fantasia'].'</a>';

            $d['telefone'] = $d['fone_1'];
            $d['telefone'] .= ( !empty($d['fone_2']) ? '<br>' : Null ) . $d['fone_2'];
            $d['telefone'] .= ( !empty($d['fone_3']) ? '<br>' : Null ) . $d['fone_3'];
            $d['telefone'] .= ( !empty($d['fone_4']) ? '<br>' : Null ) . $d['fone_4'];

            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Empresas_Repositorie_Campos::url.'/'.$d['hash_id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>Empresas_Repositorie_Campos::url.'/'.$d['hash_id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'Editar']);
        } 

        return compact('data','dados','datatable');
    }


    static function createorEdit($id = ''){

        if( !empty($id) ){
            $data = Model('Gerenciamento','UsersSemRelacionamentos')::where('modulo','Veiculos')->where('hash_id',$id)->first();
        }

        $formulario[] = FormularioRepositorie::abasSeparadoras([
            [
                'icone' => 'fa fa-user',
                'label' => 'Dados',
                'formulario' => [
                    FormularioRepositorie::formulario([
                        'formulario' => 9,
                        'label' => 'Nome completo',
                        'nome_no_banco_de_dados' => 'name',
                        'required'=>1,
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-user'],
                        'valor_inicial' => ( !empty($data['name']) ? $data['name'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 5,
                        'label' => 'Email',
                        'nome_no_banco_de_dados' => 'email',
                        'required'=>1,
                        'tipo'=>'email',
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-envelope'],
                        'valor_inicial' => ( !empty($data['email']) ? $data['email'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 2,
                        'label' => 'Nome externo',
                        'required' => 1,
                        'nome_no_banco_de_dados' => 'nome_fantasia',
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-address-card-o'],
                        'valor_inicial' => ( !empty($data['nome_fantasia']) ? $data['nome_fantasia'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 3,
                        'label' => 'Fundação',
                        'nome_no_banco_de_dados' => 'nascimento_fundacao',
                        'tipo'=>'date',
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-calendar'],
                        'valor_inicial' => ( !empty($data['nascimento_fundacao']) ? $data['nascimento_fundacao'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 6,
                        'label' => 'Foto',
                        'nome_no_banco_de_dados' => 'foto',
                        'tipo' => 'file',
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-picture-o'],
                        'valor_inicial' => ( !empty($data['foto']) ? $data['foto'] : '')
                    ]),
                ],
            ],[
                'icone' => 'fa fa-id-card',
                'label' => 'Documentos',
                'formulario' => [
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Documento principal',
                        'nome_no_banco_de_dados' => 'cpf_cnpj',
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-id-card'],
                        'valor_inicial' => ( !empty($data['cpf_cnpj']) ? $data['cpf_cnpj'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Documento secundário',
                        'nome_no_banco_de_dados' => 'rg_ie',
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-id-card'],
                        'valor_inicial' => ( !empty($data['rg_ie']) ? $data['rg_ie'] : '')
                    ]),
                ],
            ],[
                'icone' => 'fa fa-map-marker',
                'label' => 'Endereço',
                'formulario' => [
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'CEP',
                        'nome_no_banco_de_dados' => 'cep',
                        'valor_inicial' => ( !empty($data['cep']) ? $data['cep'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Logradouro',
                        'nome_no_banco_de_dados' => 'logradouro',
                        'valor_inicial' => ( !empty($data['logradouro']) ? $data['logradouro'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Número',
                        'nome_no_banco_de_dados' => 'numero',
                        'valor_inicial' => ( !empty($data['numero']) ? $data['numero'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Complemento',
                        'nome_no_banco_de_dados' => 'complemento',
                        'valor_inicial' => ( !empty($data['complemento']) ? $data['complemento'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Bairro',
                        'nome_no_banco_de_dados' => 'bairro',
                        'valor_inicial' => ( !empty($data['bairro']) ? $data['bairro'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Cidade',
                        'nome_no_banco_de_dados' => 'cidade',
                        'valor_inicial' => ( !empty($data['cidade']) ? $data['cidade'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Estado',
                        'nome_no_banco_de_dados' => 'estado',
                        'valor_inicial' => ( !empty($data['estado']) ? $data['estado'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'País',
                        'nome_no_banco_de_dados' => 'pais',
                        'tipo'=>'select',
                        'tabela_relacional' =>'Consulta_Paises',
                        'valor_inicial' => ( !empty($data['pais']) ? (int)$data['pais'] : '')
                    ]),
                ],
            ],[
                'icone' => 'fa fa-phone',
                'label' => 'Felefone',
                'formulario' => [
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Telefone - 1',
                        'nome_no_banco_de_dados' => 'fone_1',
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-phone'],
                        'valor_inicial' => ( !empty($data['fone_1']) ? $data['fone_1'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Telefone - 2',
                        'nome_no_banco_de_dados' => 'fone_2',
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-phone'],
                        'valor_inicial' => ( !empty($data['fone_2']) ? $data['fone_2'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Telefone - 3',
                        'nome_no_banco_de_dados' => 'fone_3',
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-phone'],
                        'valor_inicial' => ( !empty($data['fone_3']) ? $data['fone_3'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Telefone - 4',
                        'nome_no_banco_de_dados' => 'fone_4',
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-phone'],
                        'valor_inicial' => ( !empty($data['fone_4']) ? $data['fone_4'] : '')
                    ]),
                ],
            ],[
                'icone' => 'fa fa-lock',
                'label' => 'Segurança',
                'formulario' => [
                    FormularioRepositorie::formulario([
                        'formulario' => 3,
                        'label' => 'Senha',
                        'required' => 1,
                        'nome_no_banco_de_dados' => 'password',
                        'tipo'=>'password',
                    ]),
                ],
            ],[
                'icone' => 'fa fa-pencil',
                'label' => 'Observações',
                'formulario' => [
                    FormularioRepositorie::formulario([
                        'formulario' => 12,
                        'label' => 'Observações',
                        'nome_no_banco_de_dados' => 'dados',
                        'tipo' => 'textarea',
                        'editor' => 'ckeditor',
                        'valor_inicial' => ( !empty($data['dados']) ? $data['dados'] : '')
                    ]),
                ],
            ],[
                'icone' => 'fa fa-picture-o',
                'label' => 'Tema',
                'formulario' => [
                    FormularioRepositorie::formulario([
                        'formulario' => 12,
                        'label' => 'Tema',
                        'nome_no_banco_de_dados' => 'tema',
                        'valor_inicial' => ( !empty($data['tema']) ? $data['tema'] : '')
                    ]),
                ],
            ],
        ]);

$formulario[] = Componentes::MontaBotao([
    'tipo' => 'BotaoModalSalvar',
    'size'=>10,
    'icone' => 'fa fa-save',
    'titulo' => ( empty($id) ? 'Salvar' : 'Atualizar' ),
    'cor' => ( empty($id) ? 'primary' : 'warning' )
]);

if( !empty($id) ){
    $formulario[] = FormularioRepositorie::formulario([
        'formulario' => 12,
        'nome_no_banco_de_dados' => 'id',
        'valor_inicial' => $id,
        'tipo' => 'hidden'
    ]);
}

$formRequest = [
    'name|Nome'=>['required'=>'Campo obrigatório','min:1'=>'Campo de deve ter no mínimo |min| caracteres',],
    'email|Email'=>['required'=>'Campo obrigatório','min:1'=>'Campo de deve ter no mínimo |min| caracteres',],
];

$dados = Empresas_Repositorie_Campos::index()['dados'];

return [
    'dados'=>$dados,
    'formulario'=>$formulario,
    'formRequest'=>$formRequest,
];
}
};