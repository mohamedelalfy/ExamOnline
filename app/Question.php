<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model 
{

    protected $table = 'questions';
    public $timestamps = true;
    protected $fillable = array('type', 'question', 'question_answer', 'degree', 'exam_id');

    public function chooses()
    {
        return $this->hasMany('App\Choose');
    }
    public function choose()
    {
        return $this->hasOne('App\Choose');
    }

    public function results()
    {
        return $this->hasMany('App\Result');
    }

    public function exam()
    {
        return $this->belongsTo('App\Exam');
    }

}