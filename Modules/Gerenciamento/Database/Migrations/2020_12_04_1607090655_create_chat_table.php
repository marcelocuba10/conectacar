<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTable extends Migration
{
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {

		$table->increments(id);
		$table->integer('emp_id',11)->nullable()->default('NULL');
		$table->integer('users_id_from',11)->nullable()->default('NULL');
		$table->integer('users_id_to',11)->nullable()->default('NULL');
		$table->string('mensagem')->nullable()->default('NULL');
		$table->integer('lida',11)->default('0');
		$table->string('hash1')->nullable()->default('NULL');
		$table->string('hash2')->nullable()->default('NULL');
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
        Schema::dropIfExists('chat');
    }
}