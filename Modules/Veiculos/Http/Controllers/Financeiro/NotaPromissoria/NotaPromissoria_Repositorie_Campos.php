<?php
namespace Modules\Veiculos\Http\Controllers\Financeiro\NotaPromissoria;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class NotaPromissoria_Repositorie_Campos{

    const url = '/veiculos/painel/financeiro/nota_promissoria';

    static function index($id = ''){

        $dados = [
            'rota_geral'=>NotaPromissoria_Repositorie_Campos::url,
            'rota_geral_voltar'=>NotaPromissoria_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Veículos|Financeiro|Nota promissória',
            // 'botoes_da_datatable'=>Componentes::MontaBotao([
            //     'cor'=>'primary',
            //     'url'=>NotaPromissoria_Repositorie_Campos::url.'/create',
            //     'tipo'=>'LinkGeralIcone',
            //     'titulo'=>'Cadastrar nova conta a receber',
            // ]),
            'botaoPDF'=>0,
            'botaoExcel'=>0,
            'botaoImprimir'=>0,
        ];
        $dados['javascript'] = calculaCamposFormulario(['campo_1' => 'total','campo_2' => 'parcela','campo_destino' => 'valor','operacao' => '/']);

        
        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>40,'label'=>'Nome','nome_no_banco_de_dados'=>'credorNome',],
            ['tabela'=>20,'label'=>'Parcelas','nome_no_banco_de_dados'=>'parcelas',],
            ['tabela'=>30,'label'=>'Total','nome_no_banco_de_dados'=>'valor_total',],
            ['tabela'=>5,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Veiculos','Financeiro')::with('credor')->where('tipo','contas_receber')->where('data_pagamento', Null)->select('codigo_transacao')->groupby('codigo_transacao')->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);

            $completo = Model('Veiculos','Financeiro')::with('credor')->where('codigo_transacao', $d['codigo_transacao'])->where('data_pagamento', Null)->get();

            $d['credorNome'] = ( count($completo) > 0 ? $completo[0]['credor']['nome'] . ' - ' . $completo[0]['credor']['email'] : Null );
            $d['parcelas'] = $completo->count();
            $d['valor_total'] = currencyToSystemDefaultBD($completo->sum('valor'));

            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'success','url'=>NotaPromissoria_Repositorie_Campos::url.'/imprimir/'.$d['codigo_transacao'],'tipo'=>'LinkGeralIcone','icone'=>'fa fa-th','titulo'=>'Imprimir','target'=>'_blank']);
        } 

        return compact('data','dados','datatable');
    }




    static function createorEdit($id = ''){

        if( !empty($id) ){
            $data = Model('Veiculos','Financeiro')::where('hash_id',$id)->first();
        }

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Fornecedor',
            'nome_no_banco_de_dados' => 'cli_id',
            'required'=>1,
            'tipo'=>'select',
            'tabela_relacional' => 'Consulta_Cadastros',
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
            'valor_inicial' => ( !empty($data['parcela']) ? $data['parcela'] : 1)
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

        $dados = NotaPromissoria_Repositorie_Campos::index()['dados'];
        $dados['titulo_pagina'] = $dados['titulo_pagina'] . '|Alterar fatura';

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }




    static function pagar($id){

        $data = Model('Veiculos','Financeiro')::where('hash_id',$id)->first();

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

        $dados = NotaPromissoria_Repositorie_Campos::index()['dados'];
        $dados['rota_geral'] = $dados['rota_geral'] . '/'.$data['id'].'/pagar';
        $dados['titulo_pagina'] = $dados['titulo_pagina'] . '|Baixar fatura';

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};