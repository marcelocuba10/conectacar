<?php
namespace Modules\Ecommerce\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\MultiEmpresaScope;

class Carrinho extends Model{
	use SoftDeletes;

	public $connection = 'ecommerce';
	public $table = 'carrinho';
	public $primarykey = 'id';
	public $fillable = [
		'emp_users_hash_compra','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];
	public $hidden = [
		'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by','created_from','updated_from','deleted_from'
	];

	protected $appends = [
		'produtos',
		'fechamento',
		'pagamento',
	];
	public function getprodutosAttribute() { return $this->attributes['produtos'] = CarrinhoProdutos::where('carrinho_id',$this->id)->get(); }
	public function getfechamentoAttribute() { return $this->attributes['fechamento'] = CarrinhoFechamento::where('carrinho_id',$this->id)->get(); }
	public function getpagamentoAttribute() { return $this->attributes['pagamento'] = CarrinhoPagamento::where('carrinho_id',$this->id)->get(); }

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

	public function qualUsuario(){
		return $this->HasOne('App\Models\Users','users_id','id');
	}
}