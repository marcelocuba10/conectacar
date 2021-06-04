<?php
namespace Modules\Gerenciamento\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\MultiEmpresaScope;

class TemaWebsite extends Model{
	use SoftDeletes;

	public $connection = 'base_principal';
	public $table = 'tema_website';
	public $primarykey = 'id';
	public $fillable = [
		'template_id','emp_id','idioma','grupo','root','chave','conteudo','tipo_campo_form','tabela_relacional','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];
	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

    protected $appends = ['conteudoFilho'];
    public function getconteudoFilhoAttribute() { return $this->attributes['conteudoFilho'] = Model('Veiculos','TemaWebsite')::where('root',$this->id)->get(); }

	protected static function boot(){
		parent::boot();
		static::addGlobalScope(new MultiEmpresaScope);

		self::creating(function ($model) {
			$model->emp_id = Auth()->user()->emp_id;
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