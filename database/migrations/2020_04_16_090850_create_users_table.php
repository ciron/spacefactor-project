<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->char('uuid', 36);
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('email')->unique();
			$table->string('avatar_type')->default('gravatar');
			$table->string('avatar_location')->nullable();
			$table->string('password')->nullable();
			$table->timestamp('password_changed_at')->nullable();
			$table->unsignedTinyInteger('active')->default(1);
			$table->string('confirmation_code')->nullable();
			$table->tinyInteger('confirmed')->default(0);
			$table->string('timezone')->nullable();
			$table->timestamp('last_login_at')->nullable();
			$table->string('last_login_ip')->nullable();
			$table->tinyInteger('to_be_logged_out')->default(0);
			$table->rememberToken();
			$table->timestamps();
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
		Schema::drop('users');
	}
}
