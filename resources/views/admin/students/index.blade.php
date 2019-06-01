@extends('admin.index')
@section('content')
@section('title')
<h3>Add New Student </h3>
@endsection
<div class="panel panel-default">
  <div class="panel-heading">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        <i class="fa fa-plus"></i> Add New Student
    </button>
    </div>
    <div class="panel-body">
      
      {{--  Start Show student data  --}}

<table class="table table-striped  table-bordered" id="datatable" >
  <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">photo</th>
        <th scope="col">F_Name</th>
        <th scope="col">L_Name</th>
        <th scope="col">Phone</th>
        <th scope="col">email</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    
    <tbody>
      @foreach ($all_students as $student)
        <tr>
          <th scope="row">{{ $student->id }}</th>
          <td><image class="image-responsive" src="{{ url('uploads/'.$student->photo) }}" alt="Photo Profile" style="width:60px;height:60px"></td>
          <td>{{ $student->f_name }}</td>
          <td>{{ $student->l_name }}</td>
          <td>{{ $student->phone }}</td>
          <td>{{ $student->email}}</td>
          <td><a href="{{ route('student.edit',$student->id) }}" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i></a></td>
          <td>{!! Student::delete($student->id, $student->name) !!}</td>
        </td>
        </tr>
      @endforeach
    </tbody>
    <tfooter>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">photo</th>
            <th scope="col">F_Name</th>
            <th scope="col">L_Name</th>
            <th scope="col">Phone</th>
            <th scope="col">email</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
      </tfooter>
    </table>
  </div>
</div>
    {{--  End Show student data  --}}
    {{--  Strat Cteate student  --}}

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #3c8dbc;color:#FFF">
        <h5 class="modal-title" style="text-align:center;font-size:30px" id="exampleModalLongTitle"><i class="fa fa-plus"></i> Add New Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['route'=>'student.store', 'method'=>'POST','files'=>'true']) !!}
          <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <i class="fa fa-user"></i>
                    {!! Form::label('f_name', 'First Name') !!}
                    {!! Form::text('f_name',old('f_name'),['class'=>'form-control','placeholder'=>'Enter First Name', 'required'=>'required' ]) !!}   
                </div>
                <div class="col-md-6">
                    {!! Form::label('l_name', 'Last Name') !!}
                    {!! Form::text('l_name',old('l_name'),[ 'class'=>'form-control','placeholder'=>'Enter Last Name' ,'required'=>'required' ]) !!}        
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <i class="fa fa-phone"></i>
                    {!! Form::label('phone', 'Phone') !!}
                    {!! Form::text('phone',old('phone'),['class'=>'form-control','placeholder'=>'Enter Your Phone', 'required'=>'required' ]) !!}   
                </div>
                <div class="col-md-6">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email',old('email'),[ 'class'=>'form-control','placeholder'=>'Enter Your Email' ,'required'=>'required' ]) !!}        
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <i class="fa fa-unlock-alt"></i>
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', [ 'class'=>'form-control','placeholder'=>'Enter password', 'required'=>'required' ]) !!}       
                </div>
                <div class="col-md-6">
                    <i class="fa fa-lock"></i>
                    {!! Form::label('password_confirmation', 'Password_Confirmation') !!}
                    {!! Form::password('password_confirmation', [ 'class'=>'form-control','placeholder'=>'Enter Agin Password', 'required'=>'required' ]) !!}       
                </div>
            </div>
          </div>
          <i class="fa fa-image"></i>
          <div class="form-group">
            {!! Form::label('photo', 'Photo') !!}
            {!! Form::file('photo', [ 'class'=>'form-control']) !!}       
          </div>
          <div class="modal-footer" style="background: #3c8dbc;color:#FFF">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            {!! Form::submit('Insert', ['class'=>'btn btn-info']) !!}
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
{{--  End Cteate student  --}}


@endsection