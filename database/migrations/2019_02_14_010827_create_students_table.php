<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration {

	public function up()
	{
		Schema::create('students', function(Blueprint $table) {
			$table->increments('id');
			$table->string('l_name', 100);
			$table->string('f_name', 100);
			$table->string('phone', 60);
			$table->string('photo', 255);
			$table->string('email', 150);
			$table->string('password', 150);
			$table->rememberToken();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('students');
	}
}