<?php

namespace App\Http\Controllers;
use Auth;
use App\DataTables\AdminDatatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Exports\QuestionExport;
use App\Imports\QuestionImport;
use Maatwebsite\Excel\Facades\Excel;
use Facades\jpmurray\LaravelCountdown\Countdown;
use Illuminate\Support\Facades\Input as input;
use Carbon\Carbon;
use App\Doctor;
use Alert;
use App\Student;
use App\Course;
use App\Exam;
use App\Result;
use App\Question;
use App\Choose;
use App\Quiz;
use App\ChooseQuiz;
use App\Degree;
use DB;

class MainController extends Controller
{

    public function login(){ return view('login');}

    public function instructorLogin(){

        if (Auth::guard('instructor')->attempt(['email' => request('email'), 'password' => request('password')])) {
            return redirect('/');
        } else {
            session()->flash('error', 'Your Email Or Password Is Not Correct');
            return redirect(url('login'));
        }
    }

    public function studentLogin(){

        if (Auth::guard('student')->attempt(['email' => request('email'), 'password' => request('password')])) {
            return redirect('/');
            
        } else {
            session()->flash('errorlogin', 'Your Email Or Password Is Not Correct');
            return redirect(url('login'));
        }
    }
    public function studentSignUp(Request $request){

        $data = $this->validate(request(),[
            'f_name'=>'required',
            'l_name'=>'required',
            'phone'=>'required|min:11|unique:students',
            'email'=>'required|email|unique:students',
            'password'=>'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
            'photo'=>'required|image|mimes:jpg,jpeg,png',
          ], [] ,[
            'f_name'=>'First Name',
            'l_name'=>'Last Name',
            'phone'=>'Phone',
            'email'=>'Email',
            'password'=>'Password',
            'password_confirmation' => 'Re-password',
            'photo'=>'Photo',
          ]);
      
            $data['photo'] = $request->photo->store('images');
            $data['password'] =bcrypt(request('password'));
            Student::create($data);
            session()->flash('success', ' Add Record Success');
            return redirect(url('/'));
    }

    public function logout(){
        doctor()->logout();
        return redirect(url('login'));
    }
    public function logoutStudent(){
        student()->logout();
        return redirect(url('login'));
    }

    public function profileDoctor($id){ 

        $doctor = Doctor::findOrFail($id);
        return view('profileDoctor',compact('doctor'));
    }
    public function profileStudent($id){ 

        $student = Student::findOrFail($id);
        return view('profileStudent',compact('student'));
    }

    public function profileDoctorpost($id, Request $request)
    {
          $validator = validator()->make($request->all(),[
            'f_name'=>'required',
            'l_name'=>'required',
            'photo'=>'image|mimes:jpg,jpeg,png',
            'phone'=>'required|numeric|min:11|unique:doctors,phone,'.$id,
            'email'=>'required|email|unique:doctors,email,'.$id,
            'password'=>'sometimes|nullable|min:6|confirmed',
        ]);
            
            if($validator->fails())
            {       
                return Alert::error('error','error Update');
            }else 
            {
              
              $image = Doctor::find($id);
              if($request->hasFile('photo'))
              {
                Storage::delete($image->photo);
                $data['photo'] = $request->photo->store('images');
              }
              if($request->has('password'))
              {
                $data['password'] =bcrypt(request('password'));
              }
              $doctor=Doctor::where('id', $id)->update($data);
              Alert::success('Success','Success Update');
              return back();
          }
    }

    public function profileStudentPost($id, Request $request)
    {
            $data = $this->validate(request(),[
            'f_name'=>'required',
            'l_name'=>'required',
            'photo'=>'image|mimes:jpg,jpeg,png',
            'phone'=>'required|numeric|min:11|unique:doctors,phone,'.$id,
            'email'=>'required|email|unique:doctors,email,'.$id,
            'password'=>'sometimes|nullable|min:6|confirmed',
        ], [] ,[
            'f_name'=>'First Name',
            'l_name'=>'Last Name',
            'phone'=>'Phone',
            'photo'=>'Photo',
            'email'=>'Email',
            'password'=>'Password',
            ]);
            $image = Student::find($id);
            if($request->hasFile('photo'))
            {
                Storage::delete($image->photo);
                $data['photo'] = $request->photo->store('images');
            }
            if($request->has('password'))
            {
                $data['password'] =bcrypt(request('password'));
            }
            $doctor=Student::where('id', $id)->update($data);
          session()->flash('success', ' Update Record Success');
        return back();
    }

    public function addexam(){

        $allExam = Exam::where('doctor_id',doctor()->user()->id)->paginate(10);
        $allCourses = Course::where('doctor_id',doctor()->user()->id)->pluck('name','id');
        return view('exam.addexam',compact('allExam','allCourses'));
    }

    public function addexamPost()
    {
        $data = $this->validate(request(),[
            'name'=>'required',
            'date'=>'required',
            'startTime'=>'required',
            'endTime'=>'required',
            'degree'=>'required|numeric',
            'course_id'=>'required',
            'doctor_id'=>'required',
          ], [] ,[
            'name'=>'Name for Exam',
            'date'=>'Date',
            'startTime'=>'startTime',
            'endTime'=>'endTime',
            'degree'=>'degree',
            'course_id'=>'Course Name',
          ]);
            Exam::create($data);
            session()->flash('success', ' Add Record Success');
            return back();
    }
    
    public static function delete($id,$name=null){
        
        return view('exam.delete',compact('id','name'))->render();
    
    }
    public static function update($id){
        $exam = Exam::findOrFail($id);
        $allCourses = Course::where('doctor_id',doctor()->user()->id)->pluck('name','id');
        return view('exam.update',compact('id','allCourses','exam'))->render();
    
    }
    public function edit($id){
        $data = $this->validate(request(),[
            'name'=>'required',
            'date'=>'required',
            'startTime'=>'required',
            'endTime'=>'required',
            'degree'=>'required|numeric',
            'course_id'=>'required',
            'doctor_id'=>'required',
          ], [] ,[
            'name'=>'Name for Exam',
            'date'=>'Date',
            'startTime'=>'start Time',
            'endTime'=>'end Time',
            'degree'=>'degree',
            'course_id'=>'Course Name',
          ]);

          Exam::findOrFail($id)->update($data);
          session()->flash('success', ' Update Record Success');
        return back();
    }
    public function question($id)
    {
        $exam = Exam::findOrFail($id);
        $questions = Question::where('exam_id',$id)->get();
        return view('question.question',compact('exam','questions','chooses'));
        
    }
    public function store(Request $request)
    {
      if($request->has('choose'))
        {
          $data = $this->validate(request(),[
          'question'    =>'required',
          'ch_one'      =>'required',
          'ch_two'      =>'required',
          'ch_three'      =>'required',
          'ch_four'      =>'required',
          'question_answer'=>'required',
          'degree'      =>'required|max:2'
          
        ], [] ,[
          'question'    =>'Add Question',
          'ch_one'      =>'Choose One',
          'ch_two'      =>'Choose Two',
          'ch_three'      =>'Choose Three',
          'ch_four'      =>'Choose Four',
          'question_answer'=>'Answer The Question',
          'degree'      =>'Degree'
        ]);
        
        if(request('question_answer') == 0)
        {
          $x='A';
        }elseif(request('question_answer') == 1) {
          $x='B';
        }elseif(request('question_answer') == 2) {
          $x='C';
        }elseif(request('question_answer') == 3) {
          $x='D';
        }
        Question::create([
        'type' => 'Ch',
        'question'   => request('question'),
        'degree'     => request('degree'),
        'exam_id'    => request('exam_id'),
        'question_answer'=>$x,
        ]);
        
        $query  = DB::table('questions')->pluck('id')->last();
        Choose::create([
          'ch_one'    => request('ch_one'),
          'ch_two'    => request('ch_two'),
          'ch_three'  => request('ch_three'),
          'ch_four'   => request('ch_four'),
          'question_id'=>$query
          ]);
          session()->flash('success', ' Add Record Success');
          return back();
      }
      if($request->has('TrueFalse'))
      {
        $data = $this->validate(request(),[
        'question'    =>'required',
        'question_answer'=>'required',
        'degree'      =>'required|max:2'
      ], [] ,[
        'question'    =>'Add Question',
        'question_answer'=>'Answer The Question',
        'degree'      =>'Degree'
      ]);
      
      Question::create([
      'type'            => 'TF',
      'question'        => request('question'),
      'degree'          => request('degree'),
      'exam_id'         => request('exam_id'),
      'question_answer' => request('question_answer'),

      ]);
        session()->flash('success', ' Add Record Success');
        return back();
    }
          
    }
    public function Export()
    {
      return Excel::download(new QuestionExport, 'question.xlsx');
    }

    public function import(Request $request)
    {
        if($request->hasFile('file'))
        {
          Excel::import(new QuestionImport,request()->file('file'));
          return back();
        }

    }
    public function destroy($id)
    {
        Exam::find($id)->delete();
        session()->flash('success', ' Delete Course Success');
        return back();
    }

    public function random (Request $request)
    {
      $data = $this->validate(request(),[
        'random'    =>'required',
      ], [] ,[
        'random'    =>'random Question',
      ]);

      $random_Question=Question::where('exam_id',$request->exam_id)->inRandomOrder()->limit($request->random)->get();
      foreach ($random_Question as $key => $value) 
      {
        if ($value->type == 'TF')
        {
          Quiz::create([
            'type'=>$value->type,
            'question'=>$value->question,
            'question_answer'=>$value->question_answer,
            'degree'=>$value->degree,
            'exam_id'=>$value->exam_id,
          ]);
        }

        if($value->type == 'Ch')
        {
          Quiz::create([
            'type'=>$value->type,
            'question'=>$value->question,
            'question_answer'=>$value->question_answer,
            'degree'=>$value->degree,
            'exam_id'=>$value->exam_id,
          ]);
          $query  = DB::table('quiz')->pluck('id')->last();
          $choose=Choose::where('question_id',$value->id)->get();
          foreach ($choose as $key => $ch)
          {
            ChooseQuiz::create([
              'ch_one'    => $ch->ch_one,
              'ch_two'    => $ch->ch_two,
              'ch_three'  => $ch->ch_three,
              'ch_four'   => $ch->ch_four,
              'quiz_id'   =>$query
              ]);
          }

        }
        
        
      }
      session()->flash('success', ' Add Random Queation Success');
      return back();
    }

    public function quizes()
    {
      $quizes = Exam::where('doctor_id',doctor()->user()->id)->get();
      return view('quiz.quizes',compact('quizes'));

    }
    public function studentQuiz($id)
    {
      $questionQuiz = Quiz::where('exam_id',$id)->get();
      $date = Exam::where('id',$id)->get();
      return view('studentQuiz',compact('questionQuiz','date')) ;
    }

    public static function degree(Request $request)
    {
      $ch='';
      $id='';
    if($request->select)
    {

      $r=count($request->select);
      for ($i=0; $i<$r ; $i++) 
      {
        $c=strlen($request->select[$i]);
        for ($f=0; $f <$c ; $f++) 
        {
          if(is_numeric($request->select[$i][$f]))
          {
            $id.=$request->select[$i][$f];
            
          }else 
          {
            $ch.=$request->select[$i][$f];
          }
        }
        $ch.=',';
        $id.=',';
      }
      $ch2=explode(',',$ch);
      $id2=explode(',',$id);
      $coutn = count($id2);
      for ($i=0; $i <$coutn-1 ; $i++)
      {
        if ($ch2[$i] == 'true') {
          $ch2[$i]='1';
        }
        if ($ch2[$i] == 'false') {
          $ch2[$i]='0';
        }
        
        $degree = Quiz::where('id',$id2[$i])->pluck('degree');
        Result::create([

          'student_answer'=>$ch2[$i],
            'degree' =>$degree[0],
            'student_id'=> student()->user()->id,
            'quiz_id'=>(int)$id2[$i]
            ]);
        }

        }

          return redirect('quizdegree');
          
        }
        
        public function quizdegree()
        {
          $degree=0;
          $id='';
          $result = Result::where('student_id',student()->user()->id)->get();
          if($result->count()>0)
          {
            foreach ($result as $key => $value) 
            {
              if($value->student_answer == $value->quiz->question_answer)
              {
                $degree+=$value->degree;
              }
  
            }
            $d = Degree::where('student_id',student()->user()->id)->get();
              Degree::updateOrCreate([
                'student_id'=>student()->user()->id,
                'degree'=>$degree,
                'exam_id'=>$value->Quiz->exam_id
              ]);
              return view('quizResult',compact('d'));
          }else {
            return back();
          }

        }

        public static function questionedit($id)
        {
          $question = Question::findOrFail($id);
          return view('question.update',compact('id','question'))->render();
        }
        public static function quizedit($id)
        {
          $question = Quiz::findOrFail($id);
          return view('quiz.update',compact('id','question'))->render();
        }

        public function updatequestion(Request $request ,$id)
        {
          $data = $this->validate(request(),[
            'question'    =>'required',
            'question_answer'=>'required',
            'degree'      =>'required|max:2'
          ], [] ,[
            'question'    =>'Add Question',
            'question_answer'=>'Answer The Question',
            'degree'      =>'Degree'
          ]);
          
          Question::findOrFail($id)->update($data);
            session()->flash('success', 'Update Success');
            return back();
        }
        public function updatequiz(Request $request ,$id)
        {
          $data = $this->validate(request(),[
            'question'    =>'required',
            'question_answer'=>'required',
            'degree'      =>'required|max:2'
          ], [] ,[
            'question'    =>'Add Question',
            'question_answer'=>'Answer The Question',
            'degree'      =>'Degree'
          ]);
          
          Quiz::findOrFail($id)->update($data);
            session()->flash('success', 'Update Success');
            return back();
        }


        public function updatequestionCH(Request $request ,$id)
        {
          $data = $this->validate(request(),[
            'question'    =>'required',
            'ch_one'      =>'required',
            'ch_two'      =>'required',
            'ch_three'      =>'required',
            'ch_four'      =>'required',
            'question_answer'=>'required',
            'degree'      =>'required|max:2'
            
          ], [] ,[
            'question'    =>'Add Question',
            'ch_one'      =>'Choose One',
            'ch_two'      =>'Choose Two',
            'ch_three'      =>'Choose Three',
            'ch_four'      =>'Choose Four',
            'question_answer'=>'Answer The Question',
            'degree'      =>'Degree'
          ]);

          Question::findOrFail($id)->update([
          'question'   => request('question'),
          'degree'     => request('degree'),
          'exam_id'    => request('exam_id'),
          'question_answer'=>request('question_answer'),
          ]);

            Choose::where('question_id',$id)->update([
            'ch_one'    => request('ch_one'),
            'ch_two'    => request('ch_two'),
            'ch_three'  => request('ch_three'),
            'ch_four'   => request('ch_four'),
          ]);

            session()->flash('success', ' Add Record Success');
            return back();

        }
        public function updatequizCH(Request $request ,$id)
        {
          $data = $this->validate(request(),[
            'question'    =>'required',
            'ch_one'      =>'required',
            'ch_two'      =>'required',
            'ch_three'      =>'required',
            'ch_four'      =>'required',
            'question_answer'=>'required',
            'degree'      =>'required|max:2'
            
          ], [] ,[
            'question'    =>'Add Question',
            'ch_one'      =>'Choose One',
            'ch_two'      =>'Choose Two',
            'ch_three'      =>'Choose Three',
            'ch_four'      =>'Choose Four',
            'question_answer'=>'Answer The Question',
            'degree'      =>'Degree'
          ]);

          Quiz::findOrFail($id)->update([
          'question'   => request('question'),
          'degree'     => request('degree'),
          'exam_id'    => request('exam_id'),
          'question_answer'=>request('question_answer'),
          ]);

          ChooseQuiz::where('quiz_id',$id)->update([
            'ch_one'    => request('ch_one'),
            'ch_two'    => request('ch_two'),
            'ch_three'  => request('ch_three'),
            'ch_four'   => request('ch_four'),
          ]);

            session()->flash('success', ' Add Record Success');
            return back();

        }

        public static function deletequestion($id,$name)
        {
          return view('question.delete',compact('id','name'))->render();
        }

        public static function deletequiz($id,$name)
        {
          return view('quiz.delete',compact('id','name'))->render();
        }


        public function questiondelete($id)
        {
          Question::find($id)->delete();
          session()->flash('success', ' Delete Success');
          return back();
        }
        public function quizdelete($id)
        {
          Quiz::find($id)->delete();
          session()->flash('success', ' Delete Success');
          return back();
        }

        public function destroy_question()
        {
          Question::destroy(request('destroy'));
          session()->flash('success', ' Delete Success');
          return back();
        }
        public function destroy_quiz()
        {
          Quiz::destroy(request('destroy'));
          session()->flash('success', ' Delete Success');
          return back();
        }
        

        public function course_details($id)
        {
          $exams = Exam::where('doctor_id',doctor()->user()->id)->where('course_id',$id)->get();
          $degree = Degree::get();
          return view('courseDetails',compact('exams','degree'));
        }

    
} 


