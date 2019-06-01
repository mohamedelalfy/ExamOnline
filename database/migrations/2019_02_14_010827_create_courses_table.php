<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	public function up()
	{
		Schema::create('courses', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('photo', 150);
			$table->integer('doctor_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('courses');
	}
}