<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadastrosTable extends Migration
{
    public function up()
    {
        Schema::create('cadastros', function (Blueprint $table) {

		$table->increments(id);
		$table->integer('emp_id',11)->nullable()->default('NULL');
		$table->integer('root',11)->default('0');
		$table->string('tipo',45)->nullable()->default('NULL');
		$table->string('nome')->nullable()->default('NULL');
		$table->string('fantasia')->nullable()->default('NULL');
		$table->string('email')->nullable()->default('NULL');
		$table->string('hash')->nullable()->default('NULL');
		$table->string('cep')->nullable()->default('NULL');
		$table->string('logradouro')->nullable()->default('NULL');
		$table->string('numero')->nullable()->default('NULL');
		$table->string('complemento')->nullable()->default('NULL');
		$table->string('bairro')->nullable()->default('NULL');
		$table->string('cidade')->nullable()->default('NULL');
		$table->string('estado')->nullable()->default('NULL');
		$table->string('pais')->nullable()->default('NULL');
		$table->string('fone_1')->nullable()->default('NULL');
		$table->string('fone_2')->nullable()->default('NULL');
		$table->string('fone_3')->nullable()->default('NULL');
		$table->string('fone_4')->nullable()->default('NULL');
		$table->string('sexo')->nullable()->default('NULL');
		$table->string('cpf_cnpj')->nullable()->default('NULL');
		$table->string('rg_ie')->nullable()->default('NULL');
		$table->string('nascimento_fundacao')->nullable()->default('NULL');
		$table->string('nacionalidade')->nullable()->default('NULL');
		$table->string('naturalidade')->nullable()->default('NULL');
		$table->string('dados')->nullable()->default('NULL');
		$table->string('pai')->nullable()->default('NULL');
		$table->string('mae')->nullable()->default('NULL');
		$table->string('status_usuario')->nullable()->default('NULL');
		$table->string('idioma')->nullable()->default('NULL');
		$table->string('foto')->nullable()->default('NULL');
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
        Schema::dropIfExists('cadastros');
    }
}