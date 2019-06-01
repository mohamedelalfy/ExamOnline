<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Authenticatable 
{

    protected $table = 'doctors';
    public $timestamps = true;
    protected $fillable = array('f_name', 'l_name', 'phone', 'photo', 'email', 'password', 'description');

    public function students()
    {
        return $this->belongsToMany('App\Student');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }
    public function exams()
    {
        return $this->hasMany('App\Exam');
    }
    public function exam(){
        return $this->hasOne( 'App\Exam');
      }
   


}