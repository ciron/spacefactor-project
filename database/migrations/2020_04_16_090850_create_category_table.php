<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('cat_name', 50)->nullable();
			$table->string('cat_image', 50)->nullable();
			$table->timestamp('created_at')->useCurrent();
			$table->dateTime('updated_at')->nullable();
			$table->softDeletes();
			$table->tinyInteger('active')->nullable();
			$table->string('slug', 150)->nullable();
			$table->string('type', 50)->nullable()->default('NULL');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category');
	}
}
