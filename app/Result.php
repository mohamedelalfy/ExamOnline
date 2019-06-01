<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model 
{

    protected $table = 'result';
    public $timestamps = true;
    protected $fillable = array('student_answer', 'degree', 'student_id', 'quiz_id');

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function Quiz()
    {
        return $this->belongsTo('App\Quiz');
    }

    
    public function Quizs()
    {
        return $this->hasMany('App\Quiz');
    }

}