<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsAndamentoTable extends Migration
{
    public function up()
    {
        Schema::create('tickets_andamento', function (Blueprint $table) {

		$table->increments(id);
		$table->integer('ticket_id',11)->nullable()->default('NULL');
		$table->integer('tipo',11)->nullable()->default('NULL');
		$table->integer('prioridade',11)->nullable()->default('NULL');
		$table->integer('status',11)->nullable()->default('NULL');
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
        Schema::dropIfExists('tickets_andamento');
    }
}