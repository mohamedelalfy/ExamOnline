<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChooseQuizTable extends Migration {

	public function up()
	{
		Schema::create('choose_quiz', function(Blueprint $table) {
			$table->increments('id');
			$table->text('ch_one');
			$table->text('ch_two');
			$table->text('ch_three');
			$table->text('ch_four');
			$table->timestamps();
			$table->integer('quiz_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('choose_quiz');
	}
}