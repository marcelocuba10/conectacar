<?php
namespace Modules\Gerenciamento\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\MultiEmpresaScope;

class Alertas extends Model{
	use SoftDeletes;

	public $connection = 'base_principal';
	public $table = 'alertas';
	public $primarykey = 'id';
	public $fillable = [
		'emp_id','hash_grupo_envio','users_id','users_id_to','assunto','mensagem','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
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

	public function qualUsuarioEnviou(){
		return $this->HasOne('App\Models\Users','users_id','id');
	}

	public function qualUsuarioRecebeu(){
		return $this->HasOne('App\Models\Users','users_id_to','id');
	}
}