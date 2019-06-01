@extends('admin.index')
@section('content')
        {!! Form::model($course,['method'=>'PATCH','route'=>['course.update', $course->id],'id'=>'editForm','files'=>'true']) !!}
        <div class="form-group">
          <div class="form-group">
            <i class="fa fa-user"></i>
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name',$course->name,['class'=>'form-control','placeholder'=>'Enter First Name', 'required'=>'required' ]) !!}   
          </div>
          <label>Select Doctor</label>
          <select class="form-control" name="doctor_id">
            <option value=""></option>
            @foreach ($doctors as $doctor)
              <option value="{{ $doctor->id }}" >{{ $doctor->f_name}} {{ $doctor->l_name}} </option>
            @endforeach
          </select> <br>
          <i class="fa fa-image"></i>
              @if (!empty($course->photo))
                <image class="image-responsive" src="{{ url('uploads/'.$course->photo) }}" alt="Photo Profile" style="width:60px;height:60px"> <br>
              @endif
            {!! Form::label('photo', 'Photo') !!}
            {!! Form::file('photo', [ 'class'=>'form-control']) !!}
          <div class="modal-footer" style="background: #3c8dbc;color:#FFF">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            {!! Form::submit('Update', ['class'=>'btn btn-info']) !!}
          </div>
        {!! Form::close() !!}
    

@endsection