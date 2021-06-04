<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\Geral;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Geral_Repositorie_Campos{

    const url = '/veiculos/painel/configuracoes/geral';

    static function index($id = ''){
        $dados = [
            'rota_geral'=>Geral_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Configurações|Dados gerais da empresa',
            'botao_listagem' => 'd',
        ];

        return compact('dados');
    }




    static function createorEdit($id = ''){

        $data = Model('Gerenciamento','UsersSemRelacionamentos')::with('quaisDados')->find(Auth()->user()->emp_id);

        $dados_da_empresa = [
            'icone' => 'fa fa-building',
            'label' => 'Dados da empresa',
            'formulario' => [
                FormularioRepositorie::formulario(['formulario' => 9,'label' => 'Razão social','nome_no_banco_de_dados' => 'name','required'=>1,'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-user'],'valor_inicial' => ( !empty($data['name']) ? $data['name'] : '')]),
                FormularioRepositorie::formulario(['formulario' => 9,'label' => 'Nome para seu site','nome_no_banco_de_dados' => 'nome_fantasia','required'=>1,'readonly'=>( !empty($data['nome_fantasia']) ? 1 : 0),'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-globe'],'valor_inicial' => ( !empty($data['nome_fantasia']) ? $data['nome_fantasia'] : '')]),
                FormularioRepositorie::formulario(['formulario' => 5,'label' => 'Email','nome_no_banco_de_dados' => 'email','required'=>1,'tipo'=>'email','icone' => ['tipo'=>'icone','arquivo'=>'fa fa-envelope'],'valor_inicial' => ( !empty($data['email']) ? $data['email'] : '')]),
                FormularioRepositorie::formulario(['formulario' => 3,'label' => 'Fundação','nome_no_banco_de_dados' => 'fundacao','tipo'=>'date','icone' => ['tipo'=>'icone','arquivo'=>'fa fa-calendar'],'valor_inicial' => ( !empty($data['quaisDados']['fundacao']) ? $data['quaisDados']['fundacao'] : '')]),
                FormularioRepositorie::formulario(['formulario' => 6,'label' => 'Logotipo','nome_no_banco_de_dados' => 'logotipo','tipo' => 'file','icone' => ['tipo'=>'icone','arquivo'=>'fa fa-picture-o'],'valor_inicial' => ( !empty($data['logotipo']) ? $data['logotipo'] : '')]),
                FormularioRepositorie::formulario(['formulario' => 6,'label' => 'Ícone','nome_no_banco_de_dados' => 'icone','tipo' => 'file','icone' => ['tipo'=>'icone','arquivo'=>'fa fa-picture-o'],'valor_inicial' => ( !empty($data['icone']) ? $data['icone'] : '')]),
            ],
        ];

        $documentos = [
            'icone' => 'fa fa-id-card',
            'label' => 'Documentos',
            'formulario' => [
                FormularioRepositorie::formulario(['formulario' => 7,'label' => 'Documento principal','nome_no_banco_de_dados' => 'documento_principal','icone' => ['tipo'=>'icone','arquivo'=>'fa fa-id-card'],'valor_inicial' => ( !empty($data['quaisDados']['documento_principal']) ? $data['quaisDados']['documento_principal'] : '')]),
                FormularioRepositorie::formulario(['formulario' => 7,'label' => 'Documento secundário','nome_no_banco_de_dados' => 'documento_secundario','icone' => ['tipo'=>'icone','arquivo'=>'fa fa-id-card'],'valor_inicial' => ( !empty($data['quaisDados']['documento_secundario']) ? $data['quaisDados']['documento_secundario'] : '')]),
            ],
        ];

        $endereco = [
            'icone' => 'fa fa-map-marker',
            'label' => 'Endereço',
            'formulario' => [
                FormularioRepositorie::formulario([
                    'formulario' => 7,
                    'label' => 'CEP',
                    'nome_no_banco_de_dados' => 'cep',
                    'valor_inicial' => ( !empty($data['quaisDados']['cep']) ? $data['quaisDados']['cep'] : '')
                ]),
                FormularioRepositorie::formulario([
                    'formulario' => 7,
                    'label' => 'Endereço',
                    'nome_no_banco_de_dados' => 'endereco',
                    'valor_inicial' => ( !empty($data['quaisDados']['endereco']) ? $data['quaisDados']['endereco'] : '')
                ]),
                FormularioRepositorie::formulario([
                    'formulario' => 7,
                    'label' => 'Número',
                    'nome_no_banco_de_dados' => 'numero',
                    'valor_inicial' => ( !empty($data['quaisDados']['numero']) ? $data['quaisDados']['numero'] : '')
                ]),
                FormularioRepositorie::formulario([
                    'formulario' => 7,
                    'label' => 'Complemento',
                    'nome_no_banco_de_dados' => 'complemento',
                    'valor_inicial' => ( !empty($data['quaisDados']['complemento']) ? $data['quaisDados']['complemento'] : '')
                ]),
                FormularioRepositorie::formulario([
                    'formulario' => 7,
                    'label' => 'Bairro',
                    'nome_no_banco_de_dados' => 'bairro',
                    'valor_inicial' => ( !empty($data['quaisDados']['bairro']) ? $data['quaisDados']['bairro'] : '')
                ]),
                FormularioRepositorie::formulario([
                    'formulario' => 7,
                    'label' => 'Cidade',
                    'nome_no_banco_de_dados' => 'cidade',
                    'valor_inicial' => ( !empty($data['quaisDados']['cidade']) ? $data['quaisDados']['cidade'] : '')
                ]),
                FormularioRepositorie::formulario([
                    'formulario' => 7,
                    'label' => 'Estado',
                    'nome_no_banco_de_dados' => 'estado',
                    'valor_inicial' => ( !empty($data['quaisDados']['estado']) ? $data['quaisDados']['estado'] : '')
                ]),
                FormularioRepositorie::formulario([
                    'formulario' => 7,
                    'label' => 'País',
                    'nome_no_banco_de_dados' => 'pais',
                    'valor_inicial' => ( !empty($data['quaisDados']['pais']) ? $data['quaisDados']['pais'] : '')
                ]),
            ],
        ];

        $telefone = [
            'icone' => 'fa fa-phone',
            'label' => 'Telefone',
            'formulario' => [
                FormularioRepositorie::formulario([
                    'formulario' => 7,
                    'label' => 'Telefone',
                    'nome_no_banco_de_dados' => 'fone_1',
                    'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-phone'],
                    'valor_inicial' => ( !empty($data['quaisDados']['fone_1']) ? $data['quaisDados']['fone_1'] : '')
                ]),
                FormularioRepositorie::formulario([
                    'formulario' => 7,
                    'label' => 'Telefone',
                    'nome_no_banco_de_dados' => 'fone_2',
                    'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-phone'],
                    'valor_inicial' => ( !empty($data['quaisDados']['fone_2']) ? $data['quaisDados']['fone_2'] : '')
                ]),
                FormularioRepositorie::formulario([
                    'formulario' => 7,
                    'label' => 'Telefone',
                    'nome_no_banco_de_dados' => 'fone_3',
                    'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-phone'],
                    'valor_inicial' => ( !empty($data['quaisDados']['fone_3']) ? $data['quaisDados']['fone_3'] : '')
                ]),
                FormularioRepositorie::formulario([
                    'formulario' => 7,
                    'label' => 'Telefone',
                    'nome_no_banco_de_dados' => 'fone_4',
                    'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-phone'],
                    'valor_inicial' => ( !empty($data['quaisDados']['fone_4']) ? $data['quaisDados']['fone_4'] : '')
                ]),
            ],
        ];

        $senha = [
            'icone' => 'fa fa-key',
            'label' => 'Senha',
            'formulario' => [
                FormularioRepositorie::formulario([
                    'formulario' => 3,
                    'label' => 'Senha',
                    'nome_no_banco_de_dados' => 'password',
                    'required'=> ( !empty($data['id']) ? 0 : 1 ),
                    'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-key'],
                    'tipo'=>'password',
                ]),
            ],
        ];

        $tema = [
            'icone' => 'fa fa-picture-o',
            'label' => 'Temas',
            'formulario' => [
                FormularioRepositorie::formulario([
                    'formulario' => 3,
                    'label' => 'Temas',
                    'tipo'=>'quadro_imagem_radio',
                    'nome_no_banco_de_dados' => 'tema',
                    'tabela_relacional' =>'Consulta_Temas',
                    'required'=> ( !empty($data['id']) ? 0 : 1 ),
                    'valor_inicial' => site_id()['tema'],
                ]),
            ],
        ];

        $formulario[] = FormularioRepositorie::abasSeparadoras([
            $dados_da_empresa,
            $documentos,
            $endereco,
            $telefone,
            $senha,
            $tema,
        ]);

        $formulario[] = Componentes::MontaBotao([
            'tipo' => 'BotaoModalSalvar',
            'size'=>10,
            'icone' => 'fa fa-save',
            'titulo' => ( empty($id) ? 'Salvar' : 'Atualizar' ),
            'cor' => ( empty($id) ? 'primary' : 'warning' )
        ]);

        $formRequest = [
            'conteudo|Cabeçalho'=>['required'=>'campo_obrigatorio','min:1'=>'Campo deve ter no mínimo |min| caracteres',],
        ];

        $dados = Geral_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};