<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersEnderecosTable extends Migration
{
    public function up()
    {
        Schema::create('users_enderecos', function (Blueprint $table) {

		$table->increments(id);
		$table->integer('users_id',11)->nullable()->default('NULL');
		$table->string('cep',45)->nullable()->default('NULL');
		$table->string('endereco')->nullable()->default('NULL');
		$table->string('numero',45)->nullable()->default('NULL');
		$table->string('complemento')->nullable()->default('NULL');
		$table->string('bairro')->nullable()->default('NULL');
		$table->string('cidade')->nullable()->default('NULL');
		$table->string('estado')->nullable()->default('NULL');
		$table->string('pais',45)->nullable()->default('NULL');
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
        Schema::dropIfExists('users_enderecos');
    }
}