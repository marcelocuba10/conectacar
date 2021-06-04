<?php
namespace Modules\Veiculos\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\MultiEmpresaScope;
use App\Repositories\Tratamentos;

class Veiculos extends Model{
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

    // protected $appends = ['totalVisualizacao'];
    // public function gettotalVisualizacaoAttribute() { return $this->attributes['totalVisualizacao'] = Model('Veiculos','WebsiteEstatisticas')::where('tipo','detalhes|'.$this->hash_id)->count(); }

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new MultiEmpresaScope);

		self::creating(function ($model) {
			$model->emp_id = Auth()->user()->emp_id;
			$model->hash_id = Tratamentos::blockchain($model);
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

	public function qualTipo(){
		return $this->HasOne('Modules\Veiculos\app\Models\VeiculosVariacoes','id','tipo')->select(['id','nome']);
	}

	public function qualCambio(){
		return $this->HasOne('Modules\Veiculos\app\Models\VeiculosVariacoes','id','cambio')->select(['id','nome']);
	}

	public function qualCor(){
		return $this->HasOne('Modules\Veiculos\app\Models\VeiculosVariacoes','id','cor')->select(['id','nome']);
	}

	public function qualCarroceria(){
		return $this->HasOne('Modules\Veiculos\app\Models\VeiculosVariacoes','id','carroceria')->select(['id','nome']);
	}

	public function qualPorta(){
		return $this->HasOne('Modules\Veiculos\app\Models\VeiculosVariacoes','id','portas')->select(['id','nome']);
	}

	public function qualMotorizacao(){
		return $this->HasOne('Modules\Veiculos\app\Models\VeiculosVariacoes','id','motorizacao')->select(['id','nome']);
	}

	public function qualCombustivel(){
		return $this->HasOne('Modules\Veiculos\app\Models\VeiculosVariacoes','id','combustivel')->select(['id','nome']);
	}

	public function qualMontadora(){
		return $this->HasOne('Modules\Veiculos\app\Models\VeiculosVariacoes','id','montadora')->select(['id','nome']);
	}
}