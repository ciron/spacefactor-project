<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title', 50)->nullable();
			$table->string('slug', 50)->nullable();
			$table->text('description')->nullable();
			$table->string('gallery', 250)->nullable();
			$table->dateTime('created_at')->nullable()->useCurrent();
			$table->dateTime('updated_at')->nullable();
			$table->softDeletes();
			$table->integer('category')->nullable();
			$table->string('banner', 150)->nullable();
			$table->longText('meta')->nullable();
			$table->integer('design_service')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}
}
