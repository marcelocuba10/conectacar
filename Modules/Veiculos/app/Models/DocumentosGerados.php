<?php
namespace Modules\Veiculos\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\MultiEmpresaScope;
use App\Repositories\Tratamentos;

class DocumentosGerados extends Model{
	use SoftDeletes;

	public $connection = 'veiculos';
	public $table = 'documentos_gerados';
	public $primarykey = 'id';
	public $fillable = [
		'hash','emp_id','cliente_id','documento_id','veiculo_id','tipo','dados_origem','documento','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];
	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new MultiEmpresaScope);

		self::creating(function ($model) {
			$model->emp_id = Auth()->user()->emp_id;
			$model->hash = Tratamentos::blockchain($model);
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

	public function qualCliente(){
		return $this->HasOne('Modules\Veiculos\app\Models\Cadastros','id','cliente_id');
	}

	public function qualVeiculo(){
		return $this->HasOne('Modules\Veiculos\app\Models\Veiculos','id','veiculo_id');
	}
}