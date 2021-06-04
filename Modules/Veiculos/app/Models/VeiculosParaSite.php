<?php
namespace Modules\Veiculos\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Scopes\MultiEmpresaScope;
// use App\Repositories\Tratamentos;

class VeiculosParaSite extends Model{
	use SoftDeletes;

	public $connection = 'veiculos';
	public $table = 'veiculos';
	public $primarykey = 'id';
	public $fillable = [
		'emp_id','hash_id','ativo','ultimo_contrato','tipo','nome','ano_fabricacao','ano_veiculo','cambio','km','placa','pais','cor','carroceria','portas','motorizacao','combustivel','chassi','renavam','montadora','modelo','versao','moeda','valor','observacoes','visualizacoes','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];
	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

    protected $appends = [
    	'pegaTipo',
    	'pegaCambio',
    	'pegaCor',
    	'pegaCarroceria',
    	'pegaPorta',
    	'pegaMotorizacao',
    	'pegaCombustivel',
    	'pegaMontadora',
        'pegaFotos',
        'pegaVisualizacoes',
        'pegaEmpresa',
    ];

    public function getpegaTipoAttribute() { 
    	$consulta = Model('Veiculos','VeiculosVariacoes')::find($this->tipo);
    	return $this->attributes['pegaTipo'] = ( !empty($consulta) ? $consulta['nome'] : trataTraducoes('Não localizado') );
    }

    public function getpegaCambioAttribute() { 
    	$consulta = Model('Veiculos','VeiculosVariacoes')::find($this->cambio);
    	return $this->attributes['pegaCambio'] = ( !empty($consulta) ? $consulta['nome'] : trataTraducoes('Não localizado') );
    }

    public function getpegaCorAttribute() { 
    	$consulta = Model('Veiculos','VeiculosVariacoes')::find($this->cor);
    	return $this->attributes['pegaCor'] = ( !empty($consulta) ? $consulta['nome'] : trataTraducoes('Não localizado') );
    }

    public function getpegaCarroceriaAttribute() { 
    	$consulta = Model('Veiculos','VeiculosVariacoes')::find($this->carroceria);
    	return $this->attributes['pegaCarroceria'] = ( !empty($consulta) ? $consulta['nome'] : trataTraducoes('Não localizado') );
    }

    public function getpegaPortaAttribute() { 
    	$consulta = Model('Veiculos','VeiculosVariacoes')::find($this->portas);
    	return $this->attributes['pegaPorta'] = ( !empty($consulta) ? $consulta['nome'] : trataTraducoes('Não localizado') );
    }

    public function getpegaMotorizacaoAttribute() { 
    	$consulta = Model('Veiculos','VeiculosVariacoes')::find($this->motorizacao);
    	return $this->attributes['pegaMotorizacao'] = ( !empty($consulta) ? $consulta['nome'] : trataTraducoes('Não localizado') );
    }

    public function getpegaCombustivelAttribute() { 
    	$consulta = Model('Veiculos','VeiculosVariacoes')::find($this->combustivel);
    	return $this->attributes['pegaCombustivel'] = ( !empty($consulta) ? $consulta['nome'] : trataTraducoes('Não localizado') );
    }
    
    public function getpegaMontadoraAttribute() { 
    	$consulta = Model('Veiculos','VeiculosVariacoes')::find($this->montadora);
    	return $this->attributes['pegaMontadora'] = ( !empty($consulta) ? $consulta['nome'] : trataTraducoes('Não localizado') );
    }
    
    public function getpegaEmpresaAttribute() { 
        $consulta = Model('Gerenciamento','UsersLivre')::find($this->emp_id);
        return $this->attributes['pegaEmpresa'] = ( !empty($consulta) ? $consulta : trataTraducoes('Não localizado') );
    }
    
    public function getpegaFotosAttribute() { 
        if( !empty($this->id) ){
            $resultado = Model('Veiculos','VeiculosFotos')::where('veiculos_id',$this->id)->get();
        } else {
            $resultado = Model('Veiculos','Veiculos')::where('hash_id',$this->hash_id)->first();
            $resultado = Model('Veiculos','VeiculosFotos')::where('veiculos_id',$resultado['id'])->get();
        }
        return $this->attributes['pegaFotos'] = $resultado;
    }

    public function getpegaVisualizacoesAttribute() { return $this->attributes['pegaVisualizacoes'] = Model('Veiculos','WebsiteEstatisticas')::where('tipo','/cars/details/'.$this->hash_id)->count(); }

	protected static function boot()
	{
		parent::boot();
		// static::addGlobalScope(new MultiEmpresaScope);

		self::creating(function ($model) {
			$model->emp_id = Auth()->user()->emp_id;
			// $model->hash_id = Tratamentos::blockchain($model);
			$model->created_by = Auth()->user()->id;
			$model->created_from = pegaIPUsuario();
		});

		self::updating(function ($model) {
			$model->updated_by = Auth()->user()->id;
		});

		self::deleting(function ($model) {
			$model->deleted_by = Auth()->user()->id;
		});
	}
}