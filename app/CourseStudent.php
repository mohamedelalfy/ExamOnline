<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model 
{

    protected $table = 'course_student';
    public $timestamps = true;
    protected $fillable = array('student_id', 'course_id');

}