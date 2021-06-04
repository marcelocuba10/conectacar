<?php
namespace Modules\Gerenciamento\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersDados extends Model{
	use SoftDeletes;

	public $connection = 'base_principal';
	public $table = 'users_dados';
	public $primarykey = 'id';
	public $fillable = [
		'nivel','documento_principal','documento_secundario','fundacao','idioma','moeda_padrao','email_validado','icone','logotipo','cep','endereco','numero','complemento','cidade','estado','pais','bairro','fone_1','fone_2','fone_3','fone_4','observacoes','moeda_atualizada','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];
	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

	protected static function boot()
	{
		parent::boot();

		self::creating(function ($model) {
			$model->created_by = ( Auth()->check() ? ( Auth()->user()->nivel === 'emp' ? Auth()->user()->id : Auth()->user()->emp_id ) : 0 );
			$model->created_from = pegaIPUsuario();
		});

		self::updating(function ($model) {
			$model->updated_by = ( Auth()->check() ? ( Auth()->user()->nivel === 'emp' ? Auth()->user()->id : Auth()->user()->emp_id ) : 0 );
		});

		self::deleting(function ($model) {
			$model->deleted_by = Auth()->user()->id;
		});
	}
}