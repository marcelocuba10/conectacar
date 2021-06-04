<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculosTable extends Migration
{
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {

		$table->increments(id);
		$table->integer('emp_id',11)->default('0');
		$table->string('hash_id')->nullable()->default('NULL');
		$table->integer('ativo',11)->nullable()->default('NULL');
		$table->integer('tipo',11)->nullable()->default('NULL');
		$table->string('nome')->nullable()->default('NULL');
		$table->integer('ano_fabricacao',11)->nullable()->default('NULL');
		$table->integer('ano_veiculo',11)->nullable()->default('NULL');
		$table->integer('cambio',11)->nullable()->default('NULL');
		$table->string('km')->nullable()->default('NULL');
		$table->string('placa')->nullable()->default('NULL');
		$table->integer('cor',11)->nullable()->default('NULL');
		$table->integer('carroceria',11)->nullable()->default('NULL');
		$table->integer('portas',11)->nullable()->default('NULL');
		$table->integer('motorizacao',11)->nullable()->default('NULL');
		$table->integer('combustivel',11)->nullable()->default('NULL');
		$table->string('chassi')->nullable()->default('NULL');
		$table->string('renavam')->nullable()->default('NULL');
		$table->string('montadora')->nullable()->default('NULL');
		$table->string('modelo')->nullable()->default('NULL');
		$table->string('versao')->nullable()->default('NULL');
		$table->decimal('valor',20,8)->nullable()->default('NULL');
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
        Schema::dropIfExists('veiculos');
    }
}