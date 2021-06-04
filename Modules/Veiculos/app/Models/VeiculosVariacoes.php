<?php
namespace Modules\Veiculos\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\MultiEmpresaScope;

class VeiculosVariacoes extends Model
{
	use SoftDeletes;

	public $connection = 'veiculos';
	public $table = 'veiculos_variacoes';
	public $primarykey = 'id';
	public $fillable = [
		'emp_id','tipo','nome','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from','_token'
	];

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new MultiEmpresaScope);

		if( Auth()->check() ){
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
}