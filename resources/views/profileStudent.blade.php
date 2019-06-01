@extends('index')
@section('body')
<body style=" background: url('../design/profile3.jpg')no-repeat; background-size:cover ">
    @endsection()
@section('content')


@if (student()->user()->id == $student->id)


<section class="user_profile">
{!! Form::model($student,['method'=>'PATCH','url'=>['profileStudentPost/'.student()->user()->id],'id'=>'profileStudent','files'=>'true','class'=>'formprofile'])  !!}

        <h2>Stident Profile</h2>
        <img class="img-circle img-responsive center-block" src="{{ url('uploads/'.student()->user()->photo) }}" width="200px" height="200px">
        <h3 class="h3 text-center">{{ $student->f_name }} {{ $student->l_name }}</h3>
        <div class="row">
            <div class="col-md-6">              
                <div class="form-group">
                    <label for="email">First Name:</label>
                    <div class="relative">
                        {!! Form::text('f_name',$student->f_name, ['required'=>'required','autocomplete'=>'off',' aria-describedby'=>'basic-addon1','placeholder'=>'first name']) !!}
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Last Name:</label>
                    <div class="relative">
                        {!! Form::text('l_name',$student->l_name, ['required'=>'required','autocomplete'=>'off',' aria-describedby'=>'basic-addon1','placeholder'=>'last name']) !!}
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <div class="relative">
                        {!! Form::email('email',$student->email, ['required'=>'required','autocomplete'=>'off',' aria-describedby'=>'basic-addon1','placeholder'=>'email address']) !!}
                        <i class="fa fa-envelope"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Phone Number:</label>
                    <div class="relative">
                            {!! Form::text('phone',$student->phone, ['required'=>'required','autocomplete'=>'off',' aria-describedby'=>'basic-addon1','placeholder'=>'phone number']) !!}
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-6">        
        <div class="form-group">
            <label for="email">Password</label>
            <div class="relative">
                {!! Form::password('password',['autocomplete'=>'off','placeholder'=>'password',' aria-describedby'=>'basic-addon1' ]) !!}
                <i class="fa fa-user"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">Password Confirmation</label>
            <div class="relative">
                {!! Form::password('password_confirmation',['autocomplete'=>'off','placeholder'=>'password confirmation',' aria-describedby'=>'basic-addon1' ]) !!}
                <i class="fa fa-user"></i>
            </div>
        </div>
    </div>
</div>

        


<div class="form-group">
            <label for="email">Attachment:</label>
            <div class="relative">
                <div class="input-group">
                    <label class="input-group-btn">
                        <span class="btn btn-default">
                            update your photo&hellip; 
                            {!! Form::file('photo',['style'=>'display: none']) !!}
                        </span>
                    </label>
                    <input type="text" class="form-control" required="" placeholder="Attachment..." readonly>
                    <i class="fa fa-link"></i>
                </div>
            </div>
        </div>
        
        <div class="tright">
            <a>{!! Form::submit('Update', ['class'=>'movebtn movebtnsu']) !!}</a>
        </div>
    {!! Form::close() !!}


</section>

    @else
        <div class="error">
           <p> <i class="fa fa-close"></i> No Such ID</p> 
        </div>
    @endif
    @include('layouts.footeroption')
    @endsection()
