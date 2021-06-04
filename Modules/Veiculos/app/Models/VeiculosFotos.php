<?php
namespace Modules\Veiculos\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VeiculosFotos extends Model
{
	use SoftDeletes;

	public $connection = 'veiculos';
	public $table = 'veiculos_fotos';
	public $primarykey = 'id';
	public $fillable = [
		'veiculos_id','ordem','imagem','legenda','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from','_token'
	];
	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from','_token'
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

	public function QualVeiculo(){
		return $this->HasOne('App\Models\Veiculos','id','veiculos_id');
	}
}