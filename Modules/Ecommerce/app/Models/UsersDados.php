<?php
namespace Modules\Ecommerce\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\MultiEmpresaScope;

class UsersDados extends Model{
	use SoftDeletes;

	public $connection = 'ecommerce';
	public $table = 'users_dados';
	public $primarykey = 'id';
	public $fillable = [
		'users_id','sexo','documento_principal','documento_secundario','nascimento','nacionalidade','naturalidade','filiacao_pai','filiacao_mae','status_usuario','idioma','moeda_padrao','email_validado','foto','observacoes','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
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
}