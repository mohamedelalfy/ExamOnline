<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model 
{

    protected $table = 'courses';
    public $timestamps = true;
    protected $fillable = array('name', 'photo','doctor_id');

    public function exams()
    {
        return $this->hasMany('App\Exam');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
    

    public function students()
    {
        return $this->belongsToMany('App\Student');
    }

}