<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\UsersDados;

class GlobalController extends Controller{
     public function index(){
        $mostraQdadeTicket = [];
        $mostraQdadeAlertas = [];
        $mostraQdadeChat = [];
        $mostraQdadeCorreInterno = [];
        $cotacaoMoedas = '<table width="100%" cellpadding="0" cellspacing="0" border="0">';
        $cotacaoMoedas .= '<tr>';

        foreach( moedasDaPlataforma() as $moedas ){
            if( $moedas['moeda_sigla'] != 'USD' ){
                $cotacaoMoedas .= '<td>( USD / ' . $moedas['moeda_sigla'] . ' ) '. $moedas['ultima_cotacao'] .'</td>';
            }
        }

        $cotacaoMoedas .= '</tr>';
        $cotacaoMoedas .= '</table>';

        // $mostraQdadeTicket = Model('Tickets')->where('leitura',(Auth()->user()->nivel != 'cli' ? 0 : Auth()->user()->id))->count();
        // $mostraQdadeAlertas = Model('Alertas')->where('users_id_to', Auth()->user()->id)->count();
        // $mostraQdadeChat = Model('Chat')->where('users_id_to', Auth()->user()->id)->where('lida',0)->count();
        // $mostraQdadeCorreInterno = Model('Correio')->where('users_id_to', Auth()->user()->id)->where('lida',0)->count();

        return compact('mostraQdadeTicket','mostraQdadeAlertas','mostraQdadeChat','mostraQdadeCorreInterno','cotacaoMoedas');
    }
}