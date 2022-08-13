<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('design', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title', 250)->nullable();
			$table->string('sub_title', 250)->nullable();
			$table->string('image', 50)->nullable()->default('NULL');
			$table->timestamp('created_at')->useCurrent();
			$table->longText('meta')->nullable();
			$table->dateTime('updated_at')->nullable();
			$table->softDeletes();
			$table->enum('active', ['yes','no'])->nullable()->default('yes');
			$table->integer('category')->nullable();
			$table->string('type', 50)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('design');
	}
}
