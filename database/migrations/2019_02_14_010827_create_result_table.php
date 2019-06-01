<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResultTable extends Migration {

	public function up()
	{
		Schema::create('result', function(Blueprint $table) {
			$table->increments('id');
			$table->string('student_answer', 255);
			$table->integer('degree');
			$table->timestamps();
			$table->integer('student_id')->unsigned();
			$table->integer('quiz_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('result');
	}
}