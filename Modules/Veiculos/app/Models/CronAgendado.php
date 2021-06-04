<?php
namespace Modules\Veiculos\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\MultiEmpresaScope;

class CronAgendado extends Model{
	use SoftDeletes;

	public $connection = 'veiculos';
	public $table = 'cron_agendado';
	public $primarykey = 'id';
	public $fillable = [
		'nome','tarefa','comando','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];
	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

	protected static function boot(){
		parent::boot();
		static::addGlobalScope(new MultiEmpresaScope);

		self::creating(function ($model) {
			$model->created_by = ( Auth()->check() ? Auth()->user()->id : site_id()['emp_id'] );
			$model->created_from = pegaIPUsuario();
		});

		self::updating(function ($model) {
			$model->updated_by = ( Auth()->check() ? Auth()->user()->id : site_id()['emp_id'] );
		});

		self::deleting(function ($model) {
			$model->deleted_by = ( Auth()->check() ? Auth()->user()->id : site_id()['emp_id'] );
		});
	}
}