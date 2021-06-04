<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceiroTable extends Migration
{
    public function up()
    {
        Schema::create('financeiro', function (Blueprint $table) {

		$table->increments(id);
		$table->integer('emp_id',11)->default('0');
		$table->string('tipo')->nullable()->default('NULL');
		$table->integer('root',11)->default('0');
		$table->integer('users_id',11)->nullable()->default('NULL');
		$table->integer('cli_id',11)->nullable()->default('NULL');
		$table->integer('parcela',11)->default('0');
		$table->decimal('valor',20,8)->nullable()->default('NULL');
		$table->decimal('total',20,8)->nullable()->default('NULL');
		$table->integer('formas_pgto_id',11)->nullable()->default('NULL');
		$table->integer('status_pgto_id',11)->nullable()->default('NULL');
		$table->date('vencimento')->nullable()->default('NULL');
		$table->integer('dias_atraso',11)->default('0');
		$table->date('data_pagamento')->nullable()->default('NULL');
		$table->string('porcentagem_plataforma')->nullable()->default('NULL');
		$table->decimal('valor_plataforma',20,8)->nullable()->default('NULL');
		;
		$table->string('status_transacao')->nullable()->default('NULL');
		$table->decimal('cotacao',20,8)->nullable()->default('NULL');
		$table->string('codigo_transacao')->nullable()->default('NULL');
		;
		$table->string('pin')->nullable()->default('NULL');
		$table->string('hash_pagamento')->nullable()->default('NULL');
		$table->timestamp('created_at')->nullable()->default('NULL');
		$table->timestamp('updated_at')->nullable()->default('NULL');
		$table->timestamp('deleted_at')->nullable()->default('NULL');
		$table->integer('created_by',11)->nullable()->default('NULL');
		$table->integer('updated_by',11)->nullable()->default('NULL');
		$table->integer('deleted_by',11)->nullable()->default('NULL');
		$table->string('created_from',45)->nullable()->default('NULL');
		$table->string('updated_from')->nullable()->default('NULL');
		$table->string('deleted_from')->nullable()->default('NULL');
		$table->primary('id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('financeiro');
    }
}