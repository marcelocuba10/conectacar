<?php
namespace Modules\Veiculos\Http\Controllers\Cadastros\Clientes;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Clientes_Repositorie_Campos{

    const url = '/veiculos/painel/cadastros/clientes';

    static function index($id = ''){
        $dados = [
            'rota_geral'=>Clientes_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Cadastros|Clientes',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Clientes_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar novo cliente',
            ]),
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>10,'label'=>'Foto','nome_no_banco_de_dados'=>'foto',],
            ['tabela'=>25,'label'=>'Nome','nome_no_banco_de_dados'=>'nome',],
            ['tabela'=>30,'label'=>'Email','nome_no_banco_de_dados'=>'email',],
            ['tabela'=>20,'label'=>'Telefone','nome_no_banco_de_dados'=>'telefone',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Veiculos','Cadastros')::where('tipo','cli')->orderby('nome')->get();

        foreach( $data as $key => $d ){
            $d['contador'] = ($key+1);
            $d['foto'] = verificaImagemouIcone($d['foto'],'50px','h');
            $d['telefone'] = $d['fone_1'];
            $d['telefone'] .= ( !empty($d['fone_2']) ? '<br>' : Null ) . $d['fone_2'];
            $d['telefone'] .= ( !empty($d['fone_3']) ? '<br>' : Null ) . $d['fone_3'];
            $d['telefone'] .= ( !empty($d['fone_4']) ? '<br>' : Null ) . $d['fone_4'];

            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Clientes_Repositorie_Campos::url.'/'.$d['hash_id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>Clientes_Repositorie_Campos::url.'/'.$d['hash_id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'Editar']);
        } 

        return compact('data','dados','datatable');
    }


    static function createorEdit($id = ''){

        if( !empty($id) ){
            $data = Model('Veiculos','Cadastros')::where('hash_id',$id)->first();
        }

        $formulario[] = FormularioRepositorie::abasSeparadoras([
            [
                'icone' => 'fa fa-user',
                'label' => 'Dados pessoais',
                'formulario' => [
                    FormularioRepositorie::formulario([
                        'formulario' => 9,
                        'label' => 'Nome completo',
                        'nome_no_banco_de_dados' => 'nome',
                        'required'=>1,
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-user'],
                        'valor_inicial' => ( !empty($data['nome']) ? $data['nome'] : '')
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
                        'label' => 'Sexo',
                        'nome_no_banco_de_dados' => 'sexo',
                        'tipo'=>'select',
                        'tabela_relacional'=>'Consulta_Sexo',
                        'valor_inicial' => ( !empty($data['sexo']) ? $data['sexo'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 3,
                        'label' => 'Nascimento',
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
                'icone' => 'fa fa-users',
                'label' => 'Filiação',
                'formulario' => [
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Nome da mãe',
                        'nome_no_banco_de_dados' => 'mae',
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-female'],
                        'valor_inicial' => ( !empty($data['mae']) ? $data['mae'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 5,
                        'label' => 'Nome do pai',
                        'nome_no_banco_de_dados' => 'pai',
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-male'],
                        'valor_inicial' => ( !empty($data['pai']) ? $data['pai'] : '')
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
                        'valor_inicial' => ( !empty($data['pais']) ? $data['pais'] : '')
                    ]),
                ],
            ],[
                'icone' => 'fa fa-phone',
                'label' => 'Telefone',
                'formulario' => [
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Telefone',
                        'nome_no_banco_de_dados' => 'fone_1',
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-phone'],
                        'valor_inicial' => ( !empty($data['fone_1']) ? $data['fone_1'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Telefone',
                        'nome_no_banco_de_dados' => 'fone_2',
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-phone'],
                        'valor_inicial' => ( !empty($data['fone_2']) ? $data['fone_2'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Telefone',
                        'nome_no_banco_de_dados' => 'fone_3',
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-phone'],
                        'valor_inicial' => ( !empty($data['fone_3']) ? $data['fone_3'] : '')
                    ]),
                    FormularioRepositorie::formulario([
                        'formulario' => 7,
                        'label' => 'Telefone',
                        'nome_no_banco_de_dados' => 'fone_4',
                        'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-phone'],
                        'valor_inicial' => ( !empty($data['fone_4']) ? $data['fone_4'] : '')
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
                        'valor_inicial' => ( !empty($data['dados']) ? $data['dados'] : '')
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

$formRequest['nome|Nome'] = ['required'=>'Campo obrigatório'];
$formRequest['email|Email'] = ['required'=>'Campo obrigatório'];

$dados = Clientes_Repositorie_Campos::index()['dados'];

return [
    'dados'=>$dados,
    'formulario'=>$formulario,
    'formRequest'=>$formRequest,
];
}
};