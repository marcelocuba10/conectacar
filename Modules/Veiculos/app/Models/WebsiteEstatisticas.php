<?php
namespace Modules\Veiculos\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\EstatisticasWebsite;

class WebsiteEstatisticas extends Model{
	use SoftDeletes;

	public $connection = 'veiculos';
	public $table = 'website_estatisticas';
	public $primarykey = 'id';
	public $fillable = [
		'users_id','tipo','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];
	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

    protected $appends = [
    	'qualVeiculos',
    ];

    public function getqualVeiculosAttribute() { 
		$tipo = str_replace('/cars/details/','',$this->tipo);
		return Model('Veiculos','VeiculosParaSite')::where('hash_id',$tipo)->first();
    }

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new EstatisticasWebsite);

		self::creating(function ($model) {
			$model->created_by = ( Auth()->check() ? Auth()->user()->id : site_id()['id'] );
			$model->created_from = pegaIPUsuario();
		});

		self::updating(function ($model) {
			$model->updated_by = ( Auth()->check() ? Auth()->user()->id : site_id()['id'] );
		});

		self::deleting(function ($model) {
			$model->deleted_by = ( Auth()->check() ? Auth()->user()->id : site_id()['id'] );
		});
	}
}