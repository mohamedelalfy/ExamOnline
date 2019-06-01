<?php 

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\DataTables\AdminDatatable;
use Illuminate\Http\Request;
use App\Course;
use App\Doctor;

class CourseController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $all_courses= Course::orderBy('id', 'desc')->paginate(4);
    $doctors = Doctor::pluck('f_name', 'id')->toArray();
    return view('admin.courses.index' , ['title' => 'Courses Control'],compact('all_courses','doctors'));
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
      'name'=>'required',
      'photo'=>'required|image',
      'doctor_id'=>'required',
    ], [] ,[
      'name'=>'Course Name',
      'photo'=>'Image The Course',
      'doctor_id'=>'Doctor',
    ]);

      $data['photo'] = $request->photo->store('images');
      $data['password'] =bcrypt(request('password'));
      Course::create($data);
      session()->flash('success', ' Add Record Success');
      return redirect(aurl('course'));
    
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
    $course  =Course::find($id);
    $doctors = Doctor::all();
    return view('admin.courses.edit',['title' => 'Edit Course'],compact('course','doctors'));
    
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
      'name'=>'required',
      'photo'=>'image',
      'doctor_id'=>'required',
    ], [] ,[
      'name'=>'Course Name',
      'photo'=>'Image The Course',
      'doctor_id'=>'Doctor',
    ]);

    $photo = Course::find($id);
    if($request->hasFile('photo'))
    {
        Storage::delete($photo->photo);
        $data['photo'] = $request->photo->store('images/'.$id);
    }

    Course::where('id', $id)->update($data);
    session()->flash('success', ' Update Course Success');
    return redirect(aurl('course'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
   
  public static function delete($id,$name=null){
        
    return view('admin.courses.delete',compact('id','name'))->render();

}
public function destroy($id)
{
    Course::find($id)->delete();
    session()->flash('success', ' Delete Course Success');
    return redirect(aurl('course'));
}
  
}

?>