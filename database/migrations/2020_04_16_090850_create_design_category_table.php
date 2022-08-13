<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignCategoryTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('design_category', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('design_id');
			$table->integer('category_id');
			$table->dateTime('created_at')->nullable()->useCurrent();
			$table->dateTime('update_at')->nullable();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('design_category');
	}
}
