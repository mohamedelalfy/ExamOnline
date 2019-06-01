<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseQuestion extends Model 
{

    protected $table = 'course_question';
    public $timestamps = true;
    protected $fillable = array('course_id', 'question_id');

}