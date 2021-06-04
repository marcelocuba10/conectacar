<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracoesTable extends Migration
{
    public function up()
    {
        Schema::create('configuracoes', function (Blueprint $table) {

		$table->increments(id);
		$table->integer('emp_id',11)->default('0');
		$table->integer('root',11)->default('0');
		$table->string('chave')->nullable()->default('NULL');
		$table->string('valor')->nullable()->default('NULL');
		$table->string('tipo',45)->nullable()->default('NULL');
		$table->string('campo_form')->nullable()->default('NULL');
		$table->string('mascara')->nullable()->default('NULL');
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
        Schema::dropIfExists('configuracoes');
    }
}