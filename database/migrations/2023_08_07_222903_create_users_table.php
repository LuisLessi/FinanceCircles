<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
            //People data
			$table->increments('id');
			
			$table->char('cpf', 140)->unique()->nullable();
			$table->string('name', 100)->nullable();
			$table->char('phone', 11);
			$table->date('birth')->nullable();
			$table->char('gender', 1)->nullable();
			$table->text('notes')->nullable();
			
			//Auth data
			$table->string('email', 100)->unique();
			$table->string('password', 254);

			//Permission data
			$table->string('status')->default('active');
			$table->string('permission')->default('app.user');

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
		Schema::table('users', function(Blueprint $table) {
		
		});
		Schema::drop('users');
	}
};
