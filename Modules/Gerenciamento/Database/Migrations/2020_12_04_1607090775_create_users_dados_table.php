<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersDadosTable extends Migration
{
    public function up()
    {
        Schema::create('users_dados', function (Blueprint $table) {

		$table->increments(id);
		$table->string('nivel')->nullable()->default('NULL');
		$table->string('documento_principal')->nullable()->default('NULL');
		$table->string('documento_secundario')->nullable()->default('NULL');
		$table->date('fundacao')->nullable()->default('NULL');
		$table->string('idioma')->nullable()->default('NULL');
		$table->string('moeda_padrao',45)->default('USD');
		$table->string('email_validado')->nullable()->default('NULL');
		$table->string('icone')->nullable()->default('NULL');
		$table->string('logotipo')->nullable()->default('NULL');
		;
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
        Schema::dropIfExists('users_dados');
    }
}