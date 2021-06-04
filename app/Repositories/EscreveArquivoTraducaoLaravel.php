<?php
namespace App\Repositories;

use App\Models\Traducoes;
use fopen;

class EscreveArquivoTraducaoLaravel{

	static function EscreveArquivoTraducaoLaravel($idioma='pt-br',$modulo='Veiculos'){
		$arquivoSolicitado = base_path() . '\Modules\\'.site_id()['modulo'].'\Resources\lang\\'.$idioma.'.php';

		$data = Model($modulo,'Traducoes')::where('idioma',$idioma)->get();
		
        if (!file_exists($arquivoSolicitado)) {
            file_put_contents($arquivoSolicitado, ' ');
        }

        $arquivo = fopen($arquivoSolicitado,'w');

		$conteudo = '<?php ';
		$conteudo .=  "\n".'return [';
		foreach($data as $datas){
		$conteudo .= "\n   '".$datas['chave']."' => '".str_replace("'","\'",$datas['texto'])."',";
        // $conteudo .= "\n   '".$datas['chave']."' => '".$datas['pt-br'].( $idioma != 'pt-br' ? '-'.$idioma : Null )."',";
		}
		$conteudo .= "\n".'];';

		fwrite($arquivo, $conteudo);
		fclose($arquivo);
    }




	static function geraTraducoesGeral(){
    	$textos = traducoes();
        foreach( $textos as $key => $palavras ){
            $consulta = Traducoes::where('chave', $key)->first();
            if( !empty($consulta) ){
                Traducoes::find($consulta['id'])->update([
                    'pt-br' => $palavras,
                ]);
            } else {
                Traducoes::create([
                    'chave' => $key,
                    'pt-br' => $palavras,
                ]);
            }
        }

        EscreveArquivoTraducaoLaravel::EscreveArquivoTraducaoLaravel();
	}
};