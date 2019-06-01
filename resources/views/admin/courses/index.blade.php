@extends('admin.index')
@section('content')
@section('title')
<h3>Add New Course </h3>
@endsection

<div class="panel panel-default">
    <div class="panel-heading">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
          <i class="fa fa-plus"></i> Add New Course
      </button>
    </div>
    <div class="panel-body">
      {{--  Start Show admins data  --}}
@foreach ($all_courses as $course)


  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <image  src="{{ url('uploads/'.$course->photo) }}" alt="Photo Course" style="height:226px;max-height:226px">
        <div class="caption">
          <h3>{{ $course->name }}</h3>
          <span>DR: {{ $course->doctor()->first()->f_name }} {{ $course->doctor()->first()->l_name }}</span><br>
        <a href="{{ route('course.edit',$course->id) }}" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i></a>
         {!! CourseController::delete($course->id, $course->name) !!}  <br>
      </div>
    </div>
  </div>
    
  @endforeach
  
  
  {{--  End Show admins data  --}}
  </div>
</div>
{{--  Strat Cteate admin  --}}

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #3c8dbc;color:#FFF">
        <h5 class="modal-title" style="text-align:center;font-size:30px" id="exampleModalLongTitle"><i class="fa fa-plus"></i> Add New Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['route'=>'course.store', 'method'=>'POST','files'=>'true']) !!}
          <div class="form-group">
                <i class="fa fa-user"></i>
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Course Name', 'required'=>'required' ]) !!}   
          </div>
          <i class="fa fa-image"></i>
          <div class="form-group">
            {!! Form::label('photo', 'Photo') !!}
            {!! Form::file('photo', [ 'class'=>'form-control']) !!}       
          </div>
          <div class="form-group">
            {!! Form::label('doctor_id','Choose Doctor') !!}     
            {!! Form::select('doctor_id',$doctors,null,['class'=>'form-control']) !!}  
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
{{--  End Cteate admin  --}}
<div class="row">
    <div class="col-md-12" style="display:grid;justify-content:center">
       {{ $all_courses->links() }}
    </div>
</div>
@endsection