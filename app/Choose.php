<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choose extends Model 
{

    protected $table = 'choose';
    public $timestamps = true;
    protected $fillable = array('ch_one', 'ch_two', 'ch_three', 'ch_four', 'question_id');

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
    public function choose()
    {
        return $this->belongsTo('App\Question');
    }

}