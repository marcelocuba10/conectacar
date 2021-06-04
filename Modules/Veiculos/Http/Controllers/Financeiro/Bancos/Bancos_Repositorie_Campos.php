<?php

namespace Modules\Veiculos\Http\Controllers\Financeiro\Bancos;



use App\Repositories\CamposSistema;

use App\Repositories\FormularioRepositorie;

use App\Repositories\Componentes;

use App\Repositories\ConsultasRepositore;



class Bancos_Repositorie_Campos{



    const url = '/veiculos/painel/financeiro/bancos';



    static function index($id = ''){



        $dados = [

            'rota_geral'=>Bancos_Repositorie_Campos::url,

            'titulo_pagina'=>'Início|Veículos|Financeiro|Bancos',

            'botaoPDF'=>0,

            'botaoExcel'=>0,

            'botaoImprimir'=>0,

        ];

        $dados['javascript'] = calculaCamposFormulario(['campo_1' => 'total','campo_2' => 'parcela','campo_destino' => 'valor','operacao' => '/']);



        $datatable = [

            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],

            ['tabela'=>30,'label'=>'Nome','nome_no_banco_de_dados'=>'credorNome',],

            ['tabela'=>15,'label'=>'Parcela','nome_no_banco_de_dados'=>'parcela',],

            ['tabela'=>20,'label'=>'Valor','nome_no_banco_de_dados'=>'valor',],

            ['tabela'=>20,'label'=>'Vencimento','nome_no_banco_de_dados'=>'vencimento',],

            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]

        ];



        $data = Model('Veiculos','Bancos')::get();



        foreach( $data as $key=>$d ){

            $d['contador'] = ($key+1);



            $d['credorNome'] = $d['credor']['nome'] . ' - ' . $d['credor']['email'];

            $d['vencimento'] = formataData($d['vencimento']);

            $d['valor'] = currencyToSystemDefaultBD($d['valor'],2,true);



            if( is_null($d['data_pagamento']) ){

                $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Bancos_Repositorie_Campos::url.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'remover','classHref'=>'botaoRemover']);



                $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>Bancos_Repositorie_Campos::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'editar']);



                $d['acoes'] .= Componentes::MontaBotao(['cor'=>'info','url'=>Bancos_Repositorie_Campos::url.'/'.$d['id'].'/pagar','tipo'=>'LinkGeralIcone','icone'=>'fa fa-download','titulo'=>'editar']);

            } else {

                $d['acoes'] .= Componentes::MontaBotao(['cor'=>'info','url'=>Bancos_Repositorie_Campos::url.'/'.$d['hash_pagamento'].'/recibo','tipo'=>'LinkGeralIcone','icone'=>'fa fa-file-pdf-o','titulo'=>'recibo','target' => '_blank']);

            }

        } 



        return compact('data','dados','datatable');

    }









    static function createorEdit($id = ''){



        if( !empty($id) ){

            $data = Model('Veiculos','VeiculosFinanceiro')::find($id);

        }



        $formulario[] = FormularioRepositorie::formulario([

            'formulario' => 9,

            'label' => 'Fornecedor',

            'nome_no_banco_de_dados' => 'cli_id',

            'required'=>1,

            'tipo'=>'select',

            'tabela_relacional' => 'Consulta_Fornecedores',

            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-user'],

            'iconeD' => ['tipo'=>'icone','arquivo'=>'fa fa-plus','url'=>'/veiculos/cadastros/fornecedores/create'],

            'valor_inicial' => ( !empty($data['cli_id']) ? $data['cli_id'] : '')

        ]);



        $formulario[] = FormularioRepositorie::formulario([

            'formulario' => 9,

            'label' => 'Valor total',

            'nome_no_banco_de_dados' => 'total',

            'required'=>1,

            'readonly'=>( !empty($data['id']) ? 1 : 0 ),

            'mascara'=>'mascaraMoeda',

            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-usd'],

            'valor_inicial' => ( !empty($data['total']) ? currencyToSystemDefaultBD($data['total'],2,true) : '')

        ]);



        $formulario[] = FormularioRepositorie::formulario([

            'formulario' => 9,

            'label' => ( !empty($data['id']) ? 'Parcela atual' : 'Quantidade de parcelas' ),

            'nome_no_banco_de_dados' => 'parcela',

            'required'=>1,

            'readonly'=>( !empty($data['id']) ? 1 : 0 ),

            'tipo'=>'number',

            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-list-ol'],

            'campoLivre'=>'onkeyup="calculaCamposFormulario()"',

            'valor_inicial' => ( !empty($data['parcela']) ? $data['parcela'] : '')

        ]);



        $formulario[] = FormularioRepositorie::formulario([

            'formulario' => 9,

            'label' => 'Valor da parcela',

            'nome_no_banco_de_dados' => 'valor',

            'readonly'=>1,

            'mascara'=>'mascaraMoeda',

            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-usd'],

            'valor_inicial' => ( !empty($data['valor']) ? currencyToSystemDefaultBD($data['valor'],2,true) : '')

        ]);



        $formulario[] = FormularioRepositorie::formulario([

            'formulario' => 9,

            'label' => 'Forma de pagamento',

            'nome_no_banco_de_dados' => 'formas_pgto_id',

            'required'=>1,

            'tipo'=>'select',

            'tabela_relacional'=>'Consulta_formas_de_pagamento',

            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-credit-card'],

            'iconeD' => ['tipo'=>'icone','arquivo'=>'fa fa-plus','url'=>'/veiculos/financeiro/forma_pgto/create'],

            'valor_inicial' => ( !empty($data['formas_pgto_id']) ? $data['formas_pgto_id'] : '')

        ]);



        $formulario[] = FormularioRepositorie::formulario([

            'formulario' => 9,

            'label' => 'Vencimento',

            'nome_no_banco_de_dados' => 'vencimento',

            'required'=>1,

            'tipo'=>'date',

            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-calendar'],

            'valor_inicial' => ( !empty($data['vencimento']) ? $data['vencimento'] : '')

        ]);



        $formulario[] = FormularioRepositorie::formulario([

            'formulario' => 9,

            'label' => 'Observações',

            'nome_no_banco_de_dados' => 'obs',

            'required'=>1,

            'tipo'=>'textarea',

            'editor'=>'summernote',

            'valor_inicial' => ( !empty($data['obs']) ? $data['obs'] : '')

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



        $formRequest = [];



/*

        $formRequest['name|nome_completo'] = ['required'=>'campo_obrigatorio'];

        $formRequest['email|email'] = ['required'=>'campo_obrigatorio'];



        if (empty($data['id'])){

        $formRequest['senha|senha'] = ['required'=>'campo_obrigatorio','min:6'=>'Campo deve ter no mínimo |min| caracteres',];

        $formRequest['logo|logotipo'] = ['required'=>'campo_obrigatorio',];

        $formRequest['fundo|fundo_login'] = ['required'=>'campo_obrigatorio',];

        }

*/



        $dados = Bancos_Repositorie_Campos::index()['dados'];



        return [

            'dados'=>$dados,

            'formulario'=>$formulario,

            'formRequest'=>$formRequest,

        ];

    }









    static function pagar($id){



        $data = Model('Veiculos','VeiculosFinanceiro')::find($id);



        $formulario[] = FormularioRepositorie::formulario([

            'formulario' => 9,

            'label' => 'Fornecedor',

            'nome_no_banco_de_dados' => 'cli_id',

            'readonly'=>1,

            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-user'],

            'valor_inicial' => $data['credor']['nome'] . ' - ' . $data['credor']['email'],

        ]);



        $formulario[] = FormularioRepositorie::formulario([

            'formulario' => 9,

            'label' => 'Valor total',

            'nome_no_banco_de_dados' => 'total',

            'required'=>1,

            'readonly'=>( !empty($data['id']) ? 1 : 0 ),

            'mascara'=>'mascaraMoeda',

            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-usd'],

            'valor_inicial' => ( !empty($data['total']) ? currencyToSystemDefaultBD($data['total'],2,true) : '')

        ]);



        $formulario[] = FormularioRepositorie::formulario([

            'formulario' => 9,

            'label' => ( !empty($data['id']) ? 'Parcela atual' : 'Quantidade de parcelas' ),

            'nome_no_banco_de_dados' => 'parcela',

            'required'=>1,

            'readonly'=>( !empty($data['id']) ? 1 : 0 ),

            'tipo'=>'number',

            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-list-ol'],

            'campoLivre'=>'onkeyup="calculaCamposFormulario()"',

            'valor_inicial' => ( !empty($data['parcela']) ? $data['parcela'] : '')

        ]);



        $formulario[] = FormularioRepositorie::formulario([

            'formulario' => 9,

            'label' => 'Valor da parcela',

            'nome_no_banco_de_dados' => 'valor',

            'readonly'=>1,

            'mascara'=>'mascaraMoeda',

            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-usd'],

            'valor_inicial' => ( !empty($data['valor']) ? currencyToSystemDefaultBD($data['valor'],2,true) : '')

        ]);



        $formulario[] = FormularioRepositorie::formulario([

            'formulario' => 9,

            'label' => 'Valor do pagamento',

            'nome_no_banco_de_dados' => 'valor_pago',

            'required'=>1,

            'mascara'=>'mascaraMoeda',

            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-usd'],

            'valor_inicial' => ( !empty($data['valor']) ? currencyToSystemDefaultBD($data['valor'],2,true) : '')

        ]);



        $formulario[] = FormularioRepositorie::formulario([

            'formulario' => 9,

            'label' => 'Forma de pagamento',

            'nome_no_banco_de_dados' => 'formas_pgto_id',

            'readonly'=>1,

            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-credit-card'],

            'valor_inicial' => $data['formasPgto']['nome'],

        ]);



        $formulario[] = FormularioRepositorie::formulario([

            'formulario' => 9,

            'label' => 'Vencimento',

            'nome_no_banco_de_dados' => 'vencimento',

            'readonly'=>1,

            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-calendar'],

            'valor_inicial' => formataData($data['vencimento']),

        ]);



        $formulario[] = FormularioRepositorie::formulario([

            'formulario' => 9,

            'label' => 'Pagamento',

            'nome_no_banco_de_dados' => 'pagamento',

            'required'=>1,

            'tipo'=>'date',

            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-calendar'],

        ]);



        $formulario[] = FormularioRepositorie::formulario([

            'formulario' => 9,

            'label' => 'Observações',

            'nome_no_banco_de_dados' => 'obs',

            'required'=>1,

            'tipo'=>'textarea',

            'editor'=>'summernote',

            'valor_inicial' => ( !empty($data['obs']) ? $data['obs'] : '')

        ]);



        $formulario[] = Componentes::MontaBotao([

            'tipo' => 'BotaoModalSalvar',

            'size'=>10,

            'icone' => 'fa fa-save',

            'titulo' => 'Conluir pagamento',

            'cor' => 'primary'

        ]);



        if( !empty($id) ){

            $formulario[] = FormularioRepositorie::formulario([

                'formulario' => 12,

                'nome_no_banco_de_dados' => 'id',

                'valor_inicial' => $id,

                'tipo' => 'hidden'

            ]);

        }



        $formRequest = [];



/*

        $formRequest['name|nome_completo'] = ['required'=>'campo_obrigatorio'];

        $formRequest['email|email'] = ['required'=>'campo_obrigatorio'];



        if (empty($data['id'])){

        $formRequest['senha|senha'] = ['required'=>'campo_obrigatorio','min:6'=>'Campo deve ter no mínimo |min| caracteres',];

        $formRequest['logo|logotipo'] = ['required'=>'campo_obrigatorio',];

        $formRequest['fundo|fundo_login'] = ['required'=>'campo_obrigatorio',];

        }

*/



        $dados = Bancos_Repositorie_Campos::index()['dados'];

        $dados['rota_geral'] = $dados['rota_geral'] . '/'.$data['id'].'/pagar';



        return [

            'dados'=>$dados,

            'formulario'=>$formulario,

            'formRequest'=>$formRequest,

        ];

    }

};