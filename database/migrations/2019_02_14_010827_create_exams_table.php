<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExamsTable extends Migration {

	public function up()
	{
		Schema::create('exams', function(Blueprint $table) {
			$table->string('name');
			$table->increments('id');
			$table->date('date');
			$table->time('startTime');
			$table->time('endTime');
			$table->integer('degree');
			$table->integer('course_id')->unsigned();
			$table->integer('doctor_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('exams');
	}
}