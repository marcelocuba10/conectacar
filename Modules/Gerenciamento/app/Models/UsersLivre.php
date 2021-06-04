<?php
namespace Modules\Gerenciamento\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersLivre extends Model{
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

    protected $appends = ['quaisDados'];
    public function getquaisDadosAttribute() { return $this->attributes['quaisDados'] = Model('Gerenciamento','UsersDados')::find($this->id); }
}