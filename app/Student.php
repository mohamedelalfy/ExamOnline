<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable 
{

    protected $table = 'students';
    public $timestamps = true;
    protected $fillable = array('l_name', 'f_name', 'phone', 'photo', 'email', 'password');

    public function doctors()
    {
        return $this->belongsToMany('App\Doctor');
    }

    public function results()
    {
        return $this->hasMany('App\Result');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

}