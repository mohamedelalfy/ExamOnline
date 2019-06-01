<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {

	public function up()
	{
		Schema::create('questions', function(Blueprint $table) {
			$table->increments('id');
			$table->enum('type', array('TF', 'Ch'));
			$table->text('question');
			$table->string('question_answer');
			$table->integer('degree');
			$table->timestamps();
			$table->integer('exam_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('questions');
	}
}