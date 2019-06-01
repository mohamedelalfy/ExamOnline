<?php 

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\AdminDatatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Student;

class StudentController extends Controller 
{
 
  /** 
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $all_students= Student::orderBy('id', 'desc')->paginate(8);
    return view('admin.students.index' , ['title' => 'Student Control'],compact('all_students'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $data = $this->validate(request(),[
      'f_name'=>'required',
      'l_name'=>'required',
      'phone'=>'required|numeric|min:11|unique:students',
      'email'=>'required|email|unique:students',
      'password'=>'required|min:6',
      'password_confirmation' => 'required_with:password|same:password|min:6',
      'photo'=>'required|image',
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
      return redirect(aurl('student'));
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $student  =Student::find($id);
    return view('admin.students.edit',['title' => 'Edit Student'],compact('student'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $data = $this->validate(request(),[
      'f_name'=>'required',
      'l_name'=>'required',
      'phone'=>'required|numeric|min:11|unique:students,phone,'.$id,
      'email'=>'required|email|unique:students,email,'.$id,
      'password'=>'sometimes|nullable|min:6|confirmed',
      'photo'=>'image',
      ], [] ,[
        'f_name'=>'First Name',
        'l_name'=>'Last Name',
        'phone'=>'Phone',
        'email'=>'Email',
        'password'=>'Password',
        'photo'=>'Photo',
      ]); 

      $photo = Student::find($id);
      if($request->hasFile('photo'))
      {
          Storage::delete($photo->photo);
          $data['photo'] = $request->photo->store('images/'.$id);
      }
      if($request->has('password'))
      {
        $data['password'] =bcrypt(request('password'));
      }
      Student::where('id', $id)->update($data);
      session()->flash('success', ' Update Record Success');
      return redirect(aurl('student'));

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public static function delete($id,$name=null){
        
    return view('admin.students.delete',compact('id','name'))->render();

}
public function destroy($id)
{
    Student::find($id)->delete();
    session()->flash('success', ' Delete Record Success');
    return redirect(aurl('student'));
}
  
}

?>