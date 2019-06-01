<?php
use App\Admin;
use App\Doctor;
use App\Student;
use App\Course;

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function(){

    Config::set('auth.defines', 'admin');
    Route::get('login','AdminAuth@login');
    Route::post('login','AdminAuth@dologin');
    Route::get('forgot/password', 'AdminAuth@forgot_password');
    Route::post('forgot/password', 'AdminAuth@forgot_password_post');
    Route::get('reset/password/{token}','AdminAuth@reset_password');
    Route::post('reset/password/{token}','AdminAuth@reset_password_post');

    Route::group(['middleware' => 'admin:admin'], function(){
        Route::get('/', function()
        {
            $numberOfAdmin = Admin::count();
            $numberOfDoctor = Doctor::count();
            $numberOfStudent = Student::count();
            $students = Student::latest('id',8)->get();
            $doctors = Doctor::latest('id',8)->get();
            $numberOfCourse = Course::count();
            return view('admin.home',compact('numberOfAdmin','numberOfDoctor','numberOfStudent','numberOfCourse','students','doctors'));  
        });
        Route::resource('/admin','AdminController');
        Route::resource('/doctor', 'DoctorController');
        Route::resource('/student', 'StudentController');
        Route::resource('/course', 'CourseController');
        Route::any('logout', 'AdminAuth@logout');
              
    });

});