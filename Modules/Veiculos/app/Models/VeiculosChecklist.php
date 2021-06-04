<?php
namespace Modules\Veiculos\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VeiculosChecklist extends Model{
	use SoftDeletes;

	public $connection = 'veiculos';
	public $table = 'veiculos_checklist';
	public $primarykey = 'id';
	public $fillable = [
		'veiculo_id','retorno','hash','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

	protected static function boot()
	{
		parent::boot();

		if( Auth()->check() ){
			self::creating(function ($model) {
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
}