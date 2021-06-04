<?php
namespace Modules\Veiculos\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\MultiEmpresaScope;

class Mensagens extends Model{
	use SoftDeletes;

	public $connection = 'veiculos';
	public $table = 'mensagens';
	public $primarykey = 'id';
	public $fillable = [
		'emp_id','veiculo_id','nome','email','telefone','mensagem','original','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];
	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

	protected static function boot(){
		parent::boot();
		static::addGlobalScope(new MultiEmpresaScope);

		self::creating(function ($model) {
			$model->emp_id = ( Auth()->check() ? Auth()->user()->emp_id : site_id()['emp_id'] );
			$model->created_by = ( Auth()->check() ? Auth()->user()->emp_id : site_id()['emp_id'] );
			$model->created_from = pegaIPUsuario();
		});

		self::updating(function ($model) {
			$model->updated_by = ( Auth()->check() ? Auth()->user()->emp_id : site_id()['emp_id'] );
		});

		self::deleting(function ($model) {
			$model->deleted_by = ( Auth()->check() ? Auth()->user()->emp_id : site_id()['emp_id'] );
		});
	}
}