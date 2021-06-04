<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Veiculos;

use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;

class Veiculos_Repositorie_Campos{

    const url = '/veiculos/painel/veiculos/veiculos';

    static function index($id = ''){

        $dados = [
            'rota_geral'=>Veiculos_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Veículos|Veículos',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Veiculos_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar um novo veículo',
            ]),
            'botaoPDF'=>0,
            'botaoExcel'=>0,
            'botaoImprimir'=>0,
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>5,'label'=>'Ativo','nome_no_banco_de_dados'=>'ativo',],
            ['tabela'=>15,'label'=>'Nome','nome_no_banco_de_dados'=>'nome',],
            ['tabela'=>15,'label'=>'Placa','nome_no_banco_de_dados'=>'placa',],
            ['tabela'=>10,'label'=>'Ano','nome_no_banco_de_dados'=>'ano_veiculo',],
            ['tabela'=>10,'label'=>'Fabricação','nome_no_banco_de_dados'=>'ano_fabricacao',],
            ['tabela'=>15,'label'=>'Valor','nome_no_banco_de_dados'=>'valor',],
            ['tabela'=>25,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',],
        ];

        $data = Model('Veiculos','Veiculos')::orderby('ativo','desc')->orderby('nome')->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);

            $formatoMoeda = Model('Gerenciamento','MoedasPlataforma')::where('moeda_sigla',strtoupper($d['moeda']))->first();
            
            $d['valor'] = currencyToSystemDefaultBD($d['valor'],( !empty($formatoMoeda['casas_decimais']) ? $formatoMoeda['casas_decimais'] : 2 ),true);

            $d['ativo'] = quadroCorLegenda(VerdeVermelho(( $d['ativo'] === 1 ? 'g' : 'r' )));

            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Veiculos_Repositorie_Campos::url.'/'.$d['hash_id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
            
            $d['acoes'] .= Veiculos_Repositorie_Campos::iconesTopoVeiculos($d['hash_id']);
        } 

        return compact('data','dados','datatable');
    }




    static function createorEdit($id = ''){

        if( !empty($id) ){
            $data = Model('Veiculos','Veiculos')::where('hash_id', $id)->first();
        }

        $moedasDisponiveis = Model('Gerenciamento','MoedasPlataforma')::where('moeda_sigla', configuracoesPadrao()['moeda_padrao'])->first();

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Ativo',
            'nome_no_banco_de_dados' => 'ativo',
            'required'=>1,
            'tipo' => 'switch',
            'tamanhoCheio' => 1,
            'checked' => ( !empty($data['ativo']) ? 1 : 0 ),
            'valor_inicial' => ( !empty($data['ativo']) ? (int)$data['ativo'] : 1 ),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Tipo',
            'nome_no_banco_de_dados' => 'tipo',
            'required'=>1,
            'tipo' => 'select2',
            'multiple' => 0,
            'tabela_relacional' => ['tabela'=>'Consultas_Veiculos_Variacoes','variacao'=>'tipos'],
            'valor_inicial' => ( !empty($data['tipo']) ? (int)$data['tipo'] : ''),
            // 'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-list'],
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Nome',
            'nome_no_banco_de_dados' => 'nome',
            'required'=>1,
            'valor_inicial' => ( !empty($data['nome']) ? $data['nome'] : '')
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Ano de fabricação ',
            'nome_no_banco_de_dados' => 'ano_fabricacao',
            'required'=>1,
            'tipo'=>'select2',
            'multiple' => 0,
            'tabela_relacional'=>'Consultas_Veiculos_Veiculos_Ano',
            'valor_inicial' => ( !empty($data['ano_fabricacao']) ? (int)$data['ano_fabricacao'] : ''),
            // 'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-calendar'],
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Ano do modelo',
            'nome_no_banco_de_dados' => 'ano_veiculo',
            'required'=>1,
            'tipo'=>'select2',
            'multiple' => 0,
            'tabela_relacional'=>'Consultas_Veiculos_Veiculos_Ano',
            'valor_inicial' => ( !empty($data['ano_veiculo']) ? (int)$data['ano_veiculo'] : ''),
            // 'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-calendar'],
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Câmbio',
            'nome_no_banco_de_dados' => 'cambio',
            'required'=>1,
            'tipo' => 'select2',
            'multiple' => 0,
            'tabela_relacional' => ['tabela'=>'Consultas_Veiculos_Variacoes','variacao'=>'cambio'],
            'valor_inicial' => ( !empty($data['cambio']) ? (int)$data['cambio'] : ''),
            // 'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-list'],
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'KM',
            'nome_no_banco_de_dados' => 'km',
            'required'=>1,
            'valor_inicial' => ( !empty($data['km']) ? $data['km'] : ''),
            // 'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-dashboard'],
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Placa',
            'nome_no_banco_de_dados' => 'placa',
            'required'=>1,
            'mascara'=>'mascaraPlacaVeiculo',
            'valor_inicial' => ( !empty($data['placa']) ? $data['placa'] : '')
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Cor',
            'nome_no_banco_de_dados' => 'cor',
            'required'=>1,
            'tipo' => 'select2',
            'multiple' => 0,
            'tabela_relacional' => ['tabela'=>'Consultas_Veiculos_Variacoes','variacao'=>'cor'],
            'valor_inicial' => ( !empty($data['cor']) ? (int)$data['cor'] : '')
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Carroceria',
            'nome_no_banco_de_dados' => 'carroceria',
            'required'=>1,
            'tipo' => 'select2',
            'multiple' => 0,
            'tabela_relacional' => ['tabela'=>'Consultas_Veiculos_Variacoes','variacao'=>'carroceria'],
            'valor_inicial' => ( !empty($data['carroceria']) ? (int)$data['carroceria'] : '')
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Portas',
            'nome_no_banco_de_dados' => 'portas',
            'required'=>1,
            'tipo' => 'select2',
            'multiple' => 0,
            'tabela_relacional' => ['tabela'=>'Consultas_Veiculos_Variacoes','variacao'=>'portas'],
            'valor_inicial' => ( !empty($data['portas']) ? (int)$data['portas'] : '')
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Motorização',
            'nome_no_banco_de_dados' => 'motorizacao',
            'required'=>1,
            'tipo' => 'select2',
            'multiple' => 0,
            'tabela_relacional' => ['tabela'=>'Consultas_Veiculos_Variacoes','variacao'=>'motorizacao'],
            'valor_inicial' => ( !empty($data['motorizacao']) ? (int)$data['motorizacao'] : '')
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Combustível',
            'nome_no_banco_de_dados' => 'combustivel',
            'required'=>1,
            'tipo' => 'select2',
            'multiple' => 0,
            'tabela_relacional' => ['tabela'=>'Consultas_Veiculos_Variacoes','variacao'=>'combustivel'],
            'valor_inicial' => ( !empty($data['combustivel']) ? (int)$data['combustivel'] : '')
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Chassi',
            'nome_no_banco_de_dados' => 'chassi',
            'required'=>1,
            'valor_inicial' => ( !empty($data['chassi']) ? $data['chassi'] : '')
        ]);

        /*
        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Renavam',
            'nome_no_banco_de_dados' => 'renavam',
            'valor_inicial' => ( !empty($data['renavam']) ? $data['renavam'] : '')
        ]);
        */

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Montadora',
            'nome_no_banco_de_dados' => 'montadora',
            'required'=>1,
            'tipo' => 'select2',
            'multiple' => 0,
            'tabela_relacional' => ['tabela'=>'Consultas_Veiculos_Variacoes','variacao'=>'montadoras'],
            'valor_inicial' => ( !empty($data['montadora']) ? (int)$data['montadora'] : '')
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Versão',
            'nome_no_banco_de_dados' => 'versao',
            'required'=>1,
            'valor_inicial' => ( !empty($data['versao']) ? $data['versao'] : '')
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Valor',
            'nome_no_banco_de_dados' => 'valor',
            'required'=>1,
            'icone' => ['tipo'=>'letra','arquivo'=>mostraMoedaPadrao('g')],
            'mascara'=>'mascaraMoeda',
            'valor_inicial' => ( !empty($data['valor']) ? currencyToSystemDefaultBD($data['valor'],( strtolower($data['moeda']) === 'pyg' ? 3 : 2 )) : 0 )
        ]);

        // $formulario[] = FormularioRepositorie::formulario([
        //     'formulario' => 9,
        //     'label' => 'Moeda',
        //     'nome_no_banco_de_dados' => 'moeda',
        //     'required'=>1,
        //     'readonly'=>1,
        //     'valor_inicial' => strtoupper(mostraMoedaPadrao()),
        // ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Observações',
            'nome_no_banco_de_dados' => 'observacoes',
            'tipo'=>'textarea',
            'editor'=>'summernote',
            'valor_inicial' => ( !empty($data['observacoes']) ? $data['observacoes'] : '')
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

        $formRequest['tipo|Tipo de veículo'] = ['required'=>'Campo obrigatório'];
        $formRequest['nome|Nome'] = ['required'=>'Campo obrigatório'];
        $formRequest['ano_veiculo|Ano do modelo'] = ['required'=>'Campo obrigatório'];
        $formRequest['cambio|Câmbio'] = ['required'=>'Campo obrigatório'];
        $formRequest['km|Kilometragem'] = ['required'=>'Campo obrigatório'];
        $formRequest['cor|Cor'] = ['required'=>'Campo obrigatório'];
        $formRequest['motorizacao|Motorização'] = ['required'=>'Campo obrigatório'];
        $formRequest['combustivel|Combustível'] = ['required'=>'Campo obrigatório'];
        $formRequest['montadora|Montadora'] = ['required'=>'Campo obrigatório'];
        $formRequest['valor|Valor'] = ['required'=>'Campo obrigatório'];

/*
        $formRequest['name|nome_completo'] = ['required'=>'Campo obrigatório'];
        $formRequest['email|email'] = ['required'=>'Campo obrigatório'];

        if (empty($data['id'])){
        $formRequest['senha|senha'] = ['required'=>'Campo obrigatório','min:6'=>'Campo deve ter no mínimo |min| caracteres',];
        $formRequest['logo|logotipo'] = ['required'=>'Campo obrigatório',];
        $formRequest['fundo|fundo_login'] = ['required'=>'Campo obrigatório',];
        }
*/

        $dados = Veiculos_Repositorie_Campos::index()['dados'];
        $dados['titulo_pagina'] .= '|' . ( !empty($id) ? 'Editar veículo' : 'Adicionar veículo' );
        $dados['botoes_da_datatable'] = Veiculos_Repositorie_Campos::iconesTopoVeiculos($id);

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }




    static function iconesTopoVeiculos($qualID){
        $icone = '';
        if( !empty($qualID) ){
            $urlAtual = "$_SERVER[REQUEST_URI]";

            if( $urlAtual != Veiculos_Repositorie_Campos::url.'create' ){
                $formatacaoPadrao = 'opacity: 50% !important; ';
                $formatacaoPadrao .= 'margin-top: -5px !important;';

                $icone .= Componentes::MontaBotao([
                    'styleHref'=>( $urlAtual === Veiculos_Repositorie_Campos::url.'/'.$qualID.'/edit' ? $formatacaoPadrao : Null ),
                    'cor'=>'warning',
                    'url'=>Veiculos_Repositorie_Campos::url.'/'.$qualID.'/edit',
                    'tipo'=>'LinkGeralIcone',
                    'icone'=>'fa fa-pencil',
                    'titulo'=>'Editar'
                ]);

                $icone .= Componentes::MontaBotao([
                    'styleHref'=>( $urlAtual === Veiculos_Repositorie_Campos::url.'/'.$qualID.'/fotos' ? $formatacaoPadrao : Null ),
                    'cor'=>'success',
                    'url'=>Veiculos_Repositorie_Campos::url.'/'.$qualID.'/fotos',
                    'tipo'=>'LinkGeralIcone',
                    'icone'=>'fa fa-picture-o',
                    'titulo'=>'Fotos'
                ]);

                $icone .= Componentes::MontaBotao([
                    'styleHref'=>( $urlAtual === Veiculos_Repositorie_Campos::url.'/'.$qualID.'/checklist' || $urlAtual === Veiculos_Repositorie_Campos::url.'/'.$qualID.'/checklist/create' ? $formatacaoPadrao : Null ),
                    'cor'=>'info',
                    'url'=>Veiculos_Repositorie_Campos::url.'/'.$qualID.'/checklist',
                    'tipo'=>'LinkGeralIcone',
                    'icone'=>'fa fa-check',
                    'titulo'=>'Checklist'
                ]);

                $icone .= Componentes::MontaBotao([
                    'styleHref'=>( $urlAtual === Veiculos_Repositorie_Campos::url.'/'.$qualID.'/contrato' || $urlAtual === Veiculos_Repositorie_Campos::url.'/'.$qualID.'/contrato/create' ? $formatacaoPadrao : Null ),
                    'cor'=>'primary',
                    'url'=>Veiculos_Repositorie_Campos::url.'/'.$qualID.'/contrato',
                    'tipo'=>'LinkGeralIcone',
                    'icone'=>'fa fa-paperclip',
                    'titulo'=>'Contrato'
                ]);

                $icone .= Componentes::MontaBotao([
                    'styleHref'=>( $urlAtual === Veiculos_Repositorie_Campos::url.'/'.$qualID.'/lucro' ? $formatacaoPadrao : Null ),
                    'cor'=>'success',
                    'url'=>Veiculos_Repositorie_Campos::url.'/'.$qualID.'/lucro',
                    'tipo'=>'LinkGeralIcone',
                    'icone'=>'fa fa-usd',
                    'titulo'=>'Centro de custo'
                ]);

                $icone .= Componentes::MontaBotao([
                    'cor'=>'default',
                    'url'=>'https://'.str_replace('_','',deixaApenasTexto(Auth()->user()->nome_fantasia)).'.'.urlBaseSite().'/cars/details/'.$qualID,
                    'tipo'=>'LinkGeralIcone',
                    'target'=>'_blank',
                    'icone'=>'fa fa-eye',
                    'titulo'=>'Visualizar'
                ]);
            }

            return $icone;
        }
    }
};