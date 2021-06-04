<?php
namespace Modules\Ecommerce\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\MultiEmpresaScope;

class Users extends Model{
	use SoftDeletes;

	public $connection = 'ecommerce';
	public $table = 'users';
	public $primarykey = 'id';
	public $fillable = [
		'hash_id','emp_id','root','name','email','password','remember_token','status_cadastro','nivel','token_access','tentativas','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];
	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

	protected $appends = ['qualDado'];
    public function getqualDadoAttribute() { return $this->attributes['qualDado'] = Model('ecommerce::UsersDados')::where('users_id',$this->menu_id)->first(); }

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