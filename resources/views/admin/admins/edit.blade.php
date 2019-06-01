@extends('admin.index')
@section('content')
        {!! Form::model($admin,['method'=>'PATCH','route'=>['admin.update', $admin->id],'id'=>'editForm','files'=>'true']) !!}
          <div class="form-group">
            <i class="fa fa-user"></i>
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name',$admin->name,['class'=>'form-control','placeholder'=>'Enter Name', 'required'=>'required', 'id'=>'name' ]) !!}    
          </div>
          <div class="form-group">
              <i class="fa fa-envelope"></i>
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email',$admin->email,[ 'class'=>'form-control','placeholder'=>'Enter email' ,'required'=>'required','id'=>'email' ]) !!}       
          </div>
          <div class="form-group">
              <i class="fa fa-unlock-alt"></i>
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', [ 'class'=>'form-control','placeholder'=>'Enter password' ]) !!}       
          </div>
          <i class="fa fa-lock"></i>
          <div class="form-group">
              {!! Form::label('password_confirmation', 'Password_Confirmation') !!}
              {!! Form::password('password_confirmation', [ 'class'=>'form-control','placeholder'=>'Enter Agin Password' ]) !!}       
          </div>
          <div class="form-group">
              @if (!empty($admin->photo))
                <image class="image-responsive" src="{{ url('uploads/'.$admin->photo) }}" alt="Photo Profile" style="width:60px;height:60px">
              @endif
             {!! Form::label('photo', 'Change Your Photo') !!}
            {!! Form::file('photo', [ 'class'=>'form-control']) !!}       
          </div>
          <div class="modal-footer" style="background: #3c8dbc;color:#FFF">
            <button type="button" onclick="history.back(-1)" class="btn btn-danger" data-dismiss="modal">Back</button>
            {!! Form::submit('Update', ['class'=>'btn btn-info']) !!}
          </div>
        {!! Form::close() !!}
    

@endsection