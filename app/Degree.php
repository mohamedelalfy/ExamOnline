<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model 
{

    protected $table = 'degree';
    public $timestamps = true;
    protected $fillable = array('student_id', 'degree', 'exam_id');

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function exam()
    {
        return $this->belongsTo('App\Exam');
    }



}