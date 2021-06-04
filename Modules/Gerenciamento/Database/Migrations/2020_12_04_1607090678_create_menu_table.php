<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {

		$table->increments(id);
		$table->integer('emp_id',11)->default('0');
		$table->string('modulo')->nullable()->default('NULL');
		$table->integer('ordem',11)->nullable()->default('NULL');
		$table->integer('root',11)->default('0');
		$table->string('link')->nullable()->default('NULL');
		$table->string('menu')->nullable()->default('NULL');
		$table->string('icone')->nullable()->default('NULL');
		$table->string('target')->nullable()->default('NULL');
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
        Schema::dropIfExists('menu');
    }
}