<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseStudentTable extends Migration {

	public function up()
	{
		Schema::create('course_student', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('student_id')->unsigned();
			$table->integer('course_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('course_student');
	}
}