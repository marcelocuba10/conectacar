<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosVariacoesTable extends Migration
{
    public function up()
    {
        Schema::create('produtos_variacoes', function (Blueprint $table) {

		$table->increments(id);
		$table->integer('produtos_id',11)->nullable()->default('NULL');
		$table->string('chamada')->nullable()->default('NULL');
		$table->string('conteudo')->nullable()->default('NULL');
		$table->string('grupo')->nullable()->default('NULL');
		$table->decimal('valor',20,8)->nullable()->default('NULL');
		$table->timestamp('created_at')->nullable()->default('NULL');
		$table->timestamp('updated_at')->nullable()->default('NULL');
		$table->timestamp('deleted_at')->nullable()->default('NULL');
		$table->integer('created_by',11)->nullable()->default('NULL');
		$table->integer('updated_by',11)->nullable()->default('NULL');
		$table->integer('deleted_by',11)->nullable()->default('NULL');
		$table->string('created_from')->nullable()->default('NULL');
		$table->string('updated_from')->nullable()->default('NULL');
		$table->string('deleted_from')->nullable()->default('NULL');
		$table->primary('id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos_variacoes');
    }
}