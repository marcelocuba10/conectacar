<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculosValoresTable extends Migration
{
    public function up()
    {
        Schema::create('veiculos_valores', function (Blueprint $table) {

		$table->increments(id);
		$table->integer('veiculo_id',11)->nullable()->default('NULL');
		$table->string('tipo')->nullable()->default('NULL');
		$table->decimal('valor',10,2)->nullable()->default('NULL');
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
		$table->string('_token')->nullable()->default('NULL');
		$table->primary('id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('veiculos_valores');
    }
}