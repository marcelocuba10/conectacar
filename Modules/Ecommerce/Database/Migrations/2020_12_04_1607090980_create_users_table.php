<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

		$table->increments(id);
		$table->string('hash_id')->nullable()->default('NULL');
		$table->integer('emp_id',11)->default('0');
		$table->integer('root',11)->default('0');
		$table->string('name')->nullable()->default('NULL');
		$table->string('email')->nullable()->default('NULL');
		$table->string('password')->nullable()->default('NULL');
		$table->string('remember_token')->nullable()->default('NULL');
		$table->integer('status_cadastro',11)->default('0');
		$table->string('nivel',45)->nullable()->default('NULL');
		$table->string('token_access')->nullable()->default('NULL');
		$table->integer('tentativas',11)->default('0');
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
        Schema::dropIfExists('users');
    }
}