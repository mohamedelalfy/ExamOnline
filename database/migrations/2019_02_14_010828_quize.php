<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Quize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz', function(Blueprint $table) {
			$table->increments('id');
			$table->enum('type', array('TF', 'Ch'));
			$table->text('question');
			$table->string('question_answer');
			$table->integer('degree');
			$table->timestamps();
			$table->integer('exam_id')->unsigned();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {	
        	Schema::drop('quiz');
    }
}
