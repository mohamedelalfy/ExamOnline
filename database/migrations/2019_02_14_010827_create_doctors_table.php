<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDoctorsTable extends Migration {

	public function up()
	{
		Schema::create('doctors', function(Blueprint $table) {
			$table->increments('id');
			$table->string('f_name', 100);
			$table->string('l_name', 100);
			$table->string('phone', 100);
			$table->string('photo', 255);
			$table->string('email', 150);
			$table->string('password', 150);
			$table->text('description');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('doctors');
	}
}