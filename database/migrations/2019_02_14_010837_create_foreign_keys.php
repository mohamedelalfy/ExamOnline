<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('doctore_student', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('doctore_student', function(Blueprint $table) {
			$table->foreign('doctor_id')->references('id')->on('doctors')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('courses', function(Blueprint $table) {
			$table->foreign('doctor_id')->references('id')->on('doctors')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('exams', function(Blueprint $table) {
			$table->foreign('course_id')->references('id')->on('courses')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('exams', function(Blueprint $table) {
			$table->foreign('doctor_id')->references('id')->on('doctors')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

		Schema::table('degree', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('degree', function(Blueprint $table) {
			$table->foreign('exam_id')->references('id')->on('exams')
						->onDelete('cascade')
						->onUpdate('cascade');
		});



		Schema::table('questions', function(Blueprint $table) {
			$table->foreign('exam_id')->references('id')->on('exams')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('quiz', function(Blueprint $table) {
			$table->foreign('exam_id')->references('id')->on('exams')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('choose', function(Blueprint $table) {
			$table->foreign('question_id')->references('id')->on('questions')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('choose_quiz', function(Blueprint $table) {
			$table->foreign('quiz_id')->references('id')->on('quiz')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('result', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('result', function(Blueprint $table) {
			$table->foreign('quiz_id')->references('id')->on('quiz')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('course_question', function(Blueprint $table) {
			$table->foreign('course_id')->references('id')->on('courses')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('course_question', function(Blueprint $table) {
			$table->foreign('question_id')->references('id')->on('questions')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('course_student', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('course_student', function(Blueprint $table) {
			$table->foreign('course_id')->references('id')->on('courses')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('doctore_student', function(Blueprint $table) {
			$table->dropForeign('doctore_student_student_id_foreign');
		});
		Schema::table('doctore_student', function(Blueprint $table) {
			$table->dropForeign('doctore_student_doctor_id_foreign');
		});
		Schema::table('courses', function(Blueprint $table) {
			$table->dropForeign('courses_doctor_id_foreign');
		});
		Schema::table('exams', function(Blueprint $table) {
			$table->dropForeign('exams_course_id_foreign');
		});
		Schema::table('exams', function(Blueprint $table) {
			$table->dropForeign('exams_doctor_id_foreign');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->dropForeign('questions_exam_id_foreign');
		});
		Schema::table('quiz', function(Blueprint $table) {
			$table->dropForeign('questions_exam_id_foreign');
		});
		Schema::table('choose', function(Blueprint $table) {
			$table->dropForeign('choose_question_id_foreign');
		});
		Schema::table('choose_quiz', function(Blueprint $table) {
			$table->dropForeign('choose_quiz_quiz_id_foreign');
		});
		Schema::table('result', function(Blueprint $table) {
			$table->dropForeign('result_student_id_foreign');
		});
		Schema::table('result', function(Blueprint $table) {
			$table->dropForeign('result_quiz_id_foreign');
		});


		Schema::table('degree', function(Blueprint $table) {
			$table->dropForeign('degree_student_id_foreign');
		});
		Schema::table('degree', function(Blueprint $table) {
			$table->dropForeign('degree_exam_id_foreign');
		});


		Schema::table('course_question', function(Blueprint $table) {
			$table->dropForeign('course_question_course_id_foreign');
		});
		Schema::table('course_question', function(Blueprint $table) {
			$table->dropForeign('course_question_question_id_foreign');
		});
		Schema::table('course_student', function(Blueprint $table) {
			$table->dropForeign('course_student_student_id_foreign');
		});
		Schema::table('course_student', function(Blueprint $table) {
			$table->dropForeign('course_student_course_id_foreign');
		});
	}
}