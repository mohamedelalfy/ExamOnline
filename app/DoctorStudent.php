<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorStudent extends Model 
{

    protected $table = 'doctore_student';
    public $timestamps = true;
    protected $fillable = array('student_id', 'doctor_id');

}