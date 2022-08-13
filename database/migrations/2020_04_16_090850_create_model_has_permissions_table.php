<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelHasPermissionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('model_has_permissions', function(Blueprint $table)
		{
			$table->unsignedInteger('permission_id')->index('IDX_6B22422AFED90CCA');
			$table->string('model_type');
			$table->unsignedBigInteger('model_id');
			$table->primary(['permission_id','model_id','model_type']);
			$table->index(['model_type','model_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('model_has_permissions');
	}
}
