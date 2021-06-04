<?php
namespace Modules\Veiculos\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\MultiEmpresaScope;
use App\Repositories\Tratamentos;

class Cadastros extends Model{
	use SoftDeletes;

	public $connection = 'veiculos';
	public $table = 'cadastros';
	public $primarykey = 'id';
	public $fillable = [
		'emp_id','root','tipo','nome','fantasia','email','hash_id','cep','logradouro','numero','complemento','bairro','cidade','estado','pais','fone_1','fone_2','fone_3','fone_4','sexo','cpf_cnpj','rg_ie','nascimento_fundacao','nacionalidade','naturalidade','dados','pai','mae','status_usuario','idioma','foto','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
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
}