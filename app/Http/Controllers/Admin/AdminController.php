<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\AdminDatatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Admin;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_admins= Admin::orderBy('id', 'desc')->paginate(5);
        return view('admin.admins.index' , ['title' => 'Admin Control'],compact('all_admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
            'photo'=>'required|image',
        ], [] ,[
            'name'=>trans('admin.name'),
            'email'=>trans('admin.email'),
            'password'=>trans('admin.password')  ,
            'phote'=>'Photo',
        ]);

            $data['photo'] = $request->photo->store('images');
        $data['password'] =bcrypt(request('password'));
        Admin::create($data);
        session()->flash('success', ' Add Record Success');
        return redirect(aurl('admin'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin  =Admin::find($id);
        return view('admin.admins.edit',['title' => 'Edit Admin'],compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email|unique:admins,email,'.$id,
            'password'=>'sometimes|nullable|min:6|confirmed',
            'phote'=>'image',
        ], [] ,[
            'name'=>trans('admin.name'),
            'email'=>trans('admin.email'),
            'password'=>trans('admin.password')  ,
            'photo'=>'Photo',
        ]);
        $photo = Admin::find($id);
        if($request->hasFile('photo'))
        {
            Storage::delete($photo->photo);
            $data['photo'] = $request->photo->store('images/'.$id);
        }
      if($request->has('password'))
      {
        $data['password'] =bcrypt(request('password'));
      }
      Admin::where('id', $id)->update($data);
      session()->flash('success', ' Update Record Success');
      return redirect(aurl('admin'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function delete($id,$name=null){
        
        return view('admin.admins.delete',compact('id','name'))->render();

    }
    public function destroy($id)
    {
        Admin::find($id)->delete();
        session()->flash('success', ' Delete Record Success');
        return redirect(aurl('admin'));
    }
}
