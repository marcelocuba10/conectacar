<?php
namespace Modules\Veiculos\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VeiculosValores extends Model
{
	use SoftDeletes;

	public $connection = 'veiculos';
	public $table = 'veiculos_valores';
	public $primarykey = 'id';
	public $fillable = [
		'veiculo_id','contrato_id','tipo','valor','moeda_id','observacoes','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

	public $hidden = [
        'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
    ];

    // protected $appends = ['cotacoesConvertidas'];
    // public function getcotacoesConvertidasAttribute() {
    	// $cotacaoAtual = Model('')
    	// return $this->attributes['cotacoesConvertidas'] = Model('Gerenciamento','Menu')::where('root',$this->id)->get();
    // }

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