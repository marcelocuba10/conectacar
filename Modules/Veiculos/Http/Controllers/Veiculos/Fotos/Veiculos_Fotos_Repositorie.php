<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Fotos;

use App\Repositories\FormularioValidacoes;
use App\Repositories\Tratamentos;
use Modules\Veiculos\Http\Controllers\Veiculos\Fotos\Veiculos_Fotos_Repositorie_Campos;
use Hash;

class Veiculos_Fotos_Repositorie{

    CONST url = Veiculos_Fotos_Repositorie_Campos::url;

    static function index($veiculosID){
        return Veiculos_Fotos_Repositorie_Campos::index($veiculosID);
    }

    static function create($veiculosID){
        return Veiculos_Fotos_Repositorie_Campos::index($veiculosID);
    }

    static function store($veiculosID, $data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Veiculos_Fotos_Repositorie_Campos::index($veiculosID)['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        $qualVeiculo = Model('Veiculos','Veiculos')::where('hash_id', $veiculosID)->first();
        $verificaUltimaPosicao = Model('Veiculos','VeiculosFotos')::where('veiculos_id', $qualVeiculo['id'])->orderby('ordem','desc')->first();

        $ordem = ( !empty($verificaUltimaPosicao) ? ( $verificaUltimaPosicao['ordem']+1 ) : 1 );
        foreach( $data['imagem'] as $key => $datas ){
            $ultimo = Tratamentos::trataUpload([
                'pasta' => '/clientes/'.Auth()->user()->emp_id.'/veiculos/'.$veiculosID.'/',
                'arquivo' => $datas,
            ]);

            Model('Veiculos','VeiculosFotos')::create(['veiculos_id' => $qualVeiculo['id'],'ordem' => ($ordem++),'imagem' => $ultimo]);
        }

        return direcionaAposConcluir(str_replace('{veiculosID}', $veiculosID, Veiculos_Fotos_Repositorie_Campos::url));
    }

    static function show($veiculosID){
        $data = Veiculos_Fotos_Repositorie_Campos::index($veiculosID)['data'];
        return compact('data');
    }

    static function edit($veiculosID, $fotoID){
        return Veiculos_Fotos_Repositorie_Campos::index($veiculosID, $fotoID);
    }

    static function update($veiculosID, Request $request, $id){
        return 'update';
    }

    static function destroy($veiculosID, $fotoID){
        $consultaVeiculo = Model('Veiculos','Veiculos')::where('hash_id',$veiculosID)->first();
        $resultado = Model('Veiculos','VeiculosFotos')::where('veiculos_id', $consultaVeiculo['id'])->where('id',$fotoID)->first();
        if( !empty($resultado) ){
            return $resultado->destroy($resultado['id']);
        }
        return direcionaAposConcluir(['url'=>str_replace('{veiculosID}', $veiculosID, Veiculos_Fotos_Repositorie_Campos::url),'cor'=>'error','titulo'=>'Erro','mensagem'=>'Imagem não localizada']);
    }

    static function reordenar($veiculosID, $data){
        $qualVeiculo = Model('Veiculos','Veiculos')::where('hash_id', $veiculosID)->first();

        if( !empty($data['remover_foto']) ){
            foreach( $data['remover_foto'] as $key => $removerFoto ){
                $consulta = Model('Veiculos','VeiculosFotos')::where('veiculos_id',$qualVeiculo['id'])->where('id',$removerFoto)->first();
                $imagem = public_path(str_replace('/','\\',$consulta['imagem']));

                if( file_exists($imagem) ){
                    unlink($imagem);
                }
                $consulta->destroy($removerFoto);
            }
        }


        foreach( $data['reordena_foto'] as $key => $reordena ){
            $consulta = Model('Veiculos','VeiculosFotos')::where('veiculos_id',$qualVeiculo['id'])->where('id',$reordena)->first();
            if( !empty($consulta) ){
                $consulta->update(['ordem' => ($key+1)]);
            }
        }

        return direcionaAposConcluir(str_replace('{veiculosID}', $veiculosID, Veiculos_Fotos_Repositorie_Campos::url));
    }
}