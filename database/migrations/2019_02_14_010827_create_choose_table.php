<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChooseTable extends Migration {

	public function up()
	{
		Schema::create('choose', function(Blueprint $table) {
			$table->increments('id');
			$table->text('ch_one');
			$table->text('ch_two');
			$table->text('ch_three');
			$table->text('ch_four');
			$table->timestamps();
			$table->integer('question_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('choose');
	}
}