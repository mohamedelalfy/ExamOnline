@extends('admin.index')
@section('content')
        {!! Form::model($doctor,['method'=>'PATCH','route'=>['doctor.update', $doctor->id],'id'=>'editForm','files'=>'true']) !!}
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <i class="fa fa-user"></i>
                    {!! Form::label('f_name', 'First Name') !!}
                    {!! Form::text('f_name',$doctor->f_name,['class'=>'form-control','placeholder'=>'Enter First Name', 'required'=>'required' ]) !!}   
                </div>
                <div class="col-md-6">
                    {!! Form::label('l_name', 'Last Name') !!}
                    {!! Form::text('l_name',$doctor->l_name,[ 'class'=>'form-control','placeholder'=>'Enter Last Name' ,'required'=>'required' ]) !!}        
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <i class="fa fa-phone"></i>
                    {!! Form::label('phone', 'Phone') !!}
                    {!! Form::text('phone',$doctor->phone,['class'=>'form-control','placeholder'=>'Enter Your Phone', 'required'=>'required' ]) !!}   
                </div>
                <div class="col-md-6">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email',$doctor->email,[ 'class'=>'form-control','placeholder'=>'Enter Your Email' ,'required'=>'required' ]) !!}        
                </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <i class="fa fa-unlock-alt"></i>
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', [ 'class'=>'form-control','placeholder'=>'Enter password']) !!}       
                </div>
                <div class="col-md-6">
                    <i class="fa fa-lock"></i>
                    {!! Form::label('password_confirmation', 'Password_Confirmation') !!}
                    {!! Form::password('password_confirmation', [ 'class'=>'form-control','placeholder'=>'Enter Agin Password']) !!}       
                </div>
            </div>
          </div>
          <i class="fa fa-image"></i>
          <div class="form-group">
              @if (!empty($doctor->photo))
                <image class="image-responsive" src="{{ url('uploads/'.$doctor->photo) }}" alt="Photo Profile" style="width:60px;height:60px">
              @endif
            {!! Form::label('photo', 'Photo') !!}
            {!! Form::file('photo', [ 'class'=>'form-control']) !!}       
          </div>
          <div class="modal-footer" style="background: #3c8dbc;color:#FFF">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            {!! Form::submit('Update', ['class'=>'btn btn-info']) !!}
          </div>
        {!! Form::close() !!}
    

@endsection