<?php
namespace Modules\Gerenciamento\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\MultiEmpresaScope;
use App\Repositories\Tratamentos;

class UsersSemRelacionamentos extends Model{
	use SoftDeletes;

	public $connection = 'base_principal';
	public $table = 'users';
	public $primarykey = 'id';
	public $fillable = [
		'hash_id','emp_id','root','name','nome_fantasia','email','password','remember_token','token_access','razao','fantasia','url','modulo','status_cadastro','nivel','tentativas','tema','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];
	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new MultiEmpresaScope);

		self::creating(function ($model) {
			// $model->emp_id = ( Auth()->check() ? ( Auth()->user()->nivel === 'emp' ? Auth()->user()->id : Auth()->user()->emp_id ) : 0 );
			$model->hash_id = Tratamentos::blockchain($model);
			$model->created_by = ( Auth()->check() ? Auth()->user()->id : site_id()['emp_id'] );
			$model->created_from = pegaIPUsuario();
		});

		self::created(function ($model) {
			criaDadosEssenciais($model);
		});

		self::updating(function ($model) {
			$model->updated_by = ( Auth()->check() ? Auth()->user()->id : site_id()['emp_id'] );
		});

		self::deleting(function ($model) {
			$model->deleted_by = Auth()->user()->id;
		});
	}

	public function quaisDados(){
		return $this->HasOne('Modules\Gerenciamento\app\Models\UsersDados','id','id');
	}
}