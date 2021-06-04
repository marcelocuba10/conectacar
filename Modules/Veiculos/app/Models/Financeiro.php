<?php
namespace Modules\Veiculos\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\MultiEmpresaScope;
use App\Repositories\Tratamentos;

class Financeiro extends Model{
	use SoftDeletes;

	public $connection = 'veiculos';
	public $table = 'financeiro';
	public $primarykey = 'id';
	public $fillable = [
		'hash_id','emp_id','tipo','root','users_id','cli_id','parcela','valor','total','formas_pgto_id','status_pgto_id','vencimento','dias_atraso','data_pagamento','porcentagem_plataforma','valor_plataforma','obs','status_transacao','cotacao','codigo_transacao','json_transacao','pin','hash_pagamento','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
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

	public function credor(){
		return $this->HasOne('Modules\Veiculos\app\Models\Cadastros','id','cli_id');
	}
}