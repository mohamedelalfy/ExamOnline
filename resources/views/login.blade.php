@extends('index')
@section('body')
<body style="background:url(img/login.jpg)no-repeat center center fixed;background-size:cover">
@endsection()
@section('content')

 <div class="login-overlay">
  <div class="login">
    <div class="form">
      <ul class="tab-group">
 
            <li class="tab active"><a href="#signup">Sign Up</a></li>

            <li class="tab"><a href="#login">Log In</a></li>

            <li class="tab"><a href="#login-instructor">Instructor</a></li>

      </ul>
      <div class="tab-content">
        <div id="signup">
          <h2>Sign Up </h2>
          {!! Form::open(['url'=>'studentSignUp','method'=>'POST','files'=>'true']) !!} 
          <div class="top-row">
              <div class="field-wrap">
                {!! Form::label('f_name', 'First Name', ['class'=>'req']) !!}
                {!! Form::text('f_name',old('f_name'), ['required'=>'required','autocomplete'=>'off',]) !!}
              </div>
              <div class="field-wrap">
                {!! Form::label('l_name', 'Last Name', ['class'=>'req']) !!}
                {!! Form::text('l_name',old('l_name'), ['required'=>'required','autocomplete'=>'off' ]) !!}
              </div>
            </div>
          <div class="top-row">
              <div class="field-wrap">
                {!! Form::label('phone', 'Phone_number', ['class'=>'req']) !!}
                {!! Form::text('phone',old('phone'), ['required'=>'required','autocomplete'=>'off' ]) !!}
              </div>
              <div class="field-wrap">
                {!! Form::label('email', 'Email', ['class'=>'req']) !!}
                {!! Form::email('email',old('email'), ['required'=>'required','autocomplete'=>'off' ]) !!}
              </div>
            </div>
          <div class="top-row">
              <div class="field-wrap">
                {!! Form::label('password', 'Password', ['class'=>'req']) !!}
                {!! Form::password('password',['required'=>'required','autocomplete'=>'off' ]) !!}
              </div>
              <div class="field-wrap">
                {!! Form::label('password_confirmation', 'password_confirmation', ['class'=>'req']) !!}
                {!! Form::password('password_confirmation',['required'=>'required','autocomplete'=>'off' ]) !!}
              </div>
          </div>
          <div class="form-group">
              <div class="custom-file">
                  <input type="file" name="photo">
              </div>
          </div>
          {!! Form::submit('Sign Up', ['class'=>'button button-block']) !!}
            
          {!! Form::close() !!}
        </div>

        <div id="login">
          <h2>Welcome Student</h2>
          {!! Form::open(['url'=>'studentLogin', 'method'=>'POST']) !!}
            <div class="field-wrap">
              {!! Form::label('email', 'Email', ['class'=>'req']) !!}
              {!! Form::email('email',old('email'), ['required'=>'required' ]) !!}
            </div>
            <div class="field-wrap">
              {!! Form::label('password', 'Password', ['class'=>'req']) !!}
              {!! Form::password('password',['required'=>'required','autocomplete'=>'off' ]) !!}
            </div>
            <p class="forgot"><a href="#">Forgot Password?</a></p>
            
            {!! Form::submit('Log In', ['class'=>'button button-block']) !!}
            <p class="aletr alert-danger">{{ session()->get('errorlogin')}}</p>
            
          {!! Form::close() !!}
        </div>

        <div id="login-instructor">
          <h2>Welcome instructor</h2>
          {!! Form::open(['url'=>'instructorLogin', 'method'=>'POST']) !!}
          <div class="field-wrap">
            {!! Form::label('email', 'Email', ['class'=>'req']) !!}
            {!! Form::email('email',old('email'), ['required'=>'required']) !!}
          </div>
          <div class="field-wrap">
            {!! Form::label('password', 'Password', ['class'=>'req']) !!}
            {!! Form::password('password',['required'=>'required','autocomplete'=>'off' ]) !!}
          </div>
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          {!! Form::submit('Log In', ['class'=>'button button-block']) !!}
        {!! Form::close() !!}
        <p class="aletr alert-danger">{{ session()->get('error')}}</p>
      </div>

      </div> <!-- tab-content -->

    </div> <!-- form -->
  </div>
</div> <!-- End Section Loading -->


@endsection()