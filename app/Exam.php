<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model 
{

    protected $table = 'exams';
    public $timestamps = true;
    protected $fillable = array('name','date', 'startTime','endTime','degree', 'course_id','doctor_id');

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
    public function quiz()
    {
        return $this->hasMany('App\Quiz');
    }
    public function degrees()
    {
        return $this->hasMany('App\Degree');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
    
}