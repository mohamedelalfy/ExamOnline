<?php
use App\Exam;
use App\Course;

Route::get('/', function () 
{ 
    $exam= Exam::all();
    if(doctor()->user())
    {
        $courses = Course::where('doctor_id',doctor()->user()->id)->get();
    }
    return view('home',compact('exam','courses')); 
});
Route::get('/ourteam', function () {return view('ourTeam'); });

Route::get('login','MainController@login');
Route::post('instructorLogin','MainController@instructorLogin');
Route::post('studentLogin','MainController@studentLogin');
Route::post('studentSignUp','MainController@studentSignUp');


Route::group(['middleware' => 'AuthInstructor:instructor'], function() {

    Route::get('logout','MainController@logout');
    Route::get('profileDoctor/{id}','MainController@profileDoctor');
    Route::any('profileDoctorPost/{id}','MainController@profileDoctorPost');
    Route::get('addexam','MainController@addexam');
    Route::post('addexamPost','MainController@addexamPost');
    Route::any('destroy/{id}','MainController@destroy');
    Route::any('edit/{id}','MainController@edit');
    Route::get('question/{id}','MainController@question');
    Route::any('updatequestion/{id}','MainController@updatequestion');
    Route::any('updatequiz/{id}','MainController@updatequiz');
    Route::any('updatequestionCH/{id}','MainController@updatequestionCH');
    Route::any('updatequizCH/{id}','MainController@updatequizCH');
    Route::any('questiondelete/{id}','MainController@questiondelete');
    Route::any('quizdelete/{id}','MainController@quizdelete');
    Route::any('destroy_question','MainController@destroy_question');
    Route::any('destroy_quiz','MainController@destroy_quiz');
    Route::any('course_details/{id}','MainController@course_details');

    

    Route::post('store','MainController@store');
    Route::get('export','MainController@Export')->name('quetion.export');
    Route::post('import/{id}','MainController@import')->name('quetion.import');
    Route::post('random','MainController@random');
    Route::get('quizes','MainController@quizes');


});


Route::group(['middleware' => 'AuthStudent:student'], function() {
    Route::get('logoutStudent','MainController@logoutStudent');
    Route::get('studentQuiz/{id}','MainController@studentQuiz');
    Route::post('degree','MainController@degree');
    Route::get('quizdegree','MainController@quizdegree');
    Route::get('profileStudent/{id}','MainController@profileStudent');
    Route::any('profileStudentPost/{id}','MainController@profileStudentPost');
    
});



