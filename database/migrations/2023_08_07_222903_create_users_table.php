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
			
			$table->char('cpf', 11)->unique()->nullable();
			$table->string('name', 100);
			$table->char('phone', 11);
			$table->date('birth', 11);
			$table->char('gender', 1);
			$table->text('notes')->nullable();
			
			//Auth data
			$table->string('email', 100)->unique();
			$table->string('password', 254)->nullable();

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
