<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChooseQuiz extends Model 
{

    protected $table = 'choose_quiz';
    public $timestamps = true;
    protected $fillable = array('ch_one', 'ch_two', 'ch_three', 'ch_four', 'quiz_id');

    public function quiz()
    {
        return $this->belongsTo('App\quiz');
    }
    public function choose()
    {
        return $this->belongsTo('App\quiz');
    }

}