<?php
namespace Modules\Gerenciamento\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\MultiEmpresaScope;
use App\Repositories\Tratamentos;

class UsersForgotPassword extends Model{
	use SoftDeletes;

	public $connection = 'base_principal';
	public $table = 'users_forgot_password';
	public $primarykey = 'id';
	public $fillable = [
		'emp_id','users_id','hash','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];
	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new MultiEmpresaScope);

		self::creating(function ($model) {
			$model->created_by = ( Auth()->check() ? Auth()->user()->id : site_id()['emp_id'] );
			$model->created_from = pegaIPUsuario();
			$model->hash = Tratamentos::blockchain($model);
		});

		self::updating(function ($model) {
			$model->updated_by = ( Auth()->check() ? Auth()->user()->id : site_id()['emp_id'] );
		});

		self::deleting(function ($model) {
			$model->deleted_by = ( Auth()->check() ? Auth()->user()->id : site_id()['emp_id'] );
		});
	}
}