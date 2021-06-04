<?php
namespace Modules\Gerenciamento\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\MultiEmpresaScope;

class Configuracoes extends Model{
	use SoftDeletes;

	public $connection = 'base_principal';
	public $table = 'configuracoes';
	public $primarykey = 'id';
	public $fillable = [
		'emp_id','root','label','value','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];
	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

    protected $appends = ['configuracoesFilho'];
    public function getconfiguracoesFilhoAttribute() { return $this->attributes['configuracoesFilho'] = Model('Gerenciamento','Configuracoes')::where('root',$this->id)->get(); }

	protected static function boot()
	{
		parent::boot();
		static::addGlobalScope(new MultiEmpresaScope);

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