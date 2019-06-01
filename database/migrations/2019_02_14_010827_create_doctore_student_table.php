<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDoctoreStudentTable extends Migration {

	public function up()
	{
		Schema::create('doctore_student', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('student_id')->unsigned();
			$table->integer('doctor_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('doctore_student');
	}
}