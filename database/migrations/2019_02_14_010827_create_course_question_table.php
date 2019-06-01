<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseQuestionTable extends Migration {

	public function up()
	{
		Schema::create('course_question', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('course_id')->unsigned();
			$table->integer('question_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('course_question');
	}
}