<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaisesTable extends Migration
{
    public function up()
    {
        Schema::create('paises', function (Blueprint $table) {

		$table->increments(id);
		$table->string('nome')->nullable()->default('NULL');
		$table->string('alpha2Code')->nullable()->default('NULL');
		$table->string('alpha3Code')->nullable()->default('NULL');
		$table->string('capital')->nullable()->default('NULL');
		$table->string('regiao')->nullable()->default('NULL');
		$table->string('codigo_ddd_pais',45)->nullable()->default('NULL');
		$table->string('subregiao')->nullable()->default('NULL');
		$table->string('latitude')->nullable()->default('NULL');
		$table->string('longitude')->nullable()->default('NULL');
		$table->string('codigo')->nullable()->default('NULL');
		$table->string('bandeira')->nullable()->default('NULL');
		$table->string('cioc')->nullable()->default('NULL');
		$table->string('ddi',45)->nullable()->default('NULL');
		$table->integer('moeda_padrao_id',11)->default('1');
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
        Schema::dropIfExists('paises');
    }
}