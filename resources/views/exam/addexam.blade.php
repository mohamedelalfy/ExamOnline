@extends('index')
@section('body')

<body id="home">
    @endsection()
    @section('content')
    <div class="panel panel-default" style="margin-bottom: 206px">
        <div class="panel-heading">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fa fa-plus"></i> Add New Exam
            </button>
        </div>
        <div class="panel-body">
            {{--  Start Show doctor data  --}}
            <table class="table table-striped  table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Exam Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Degree</th>
                        <th scope="col">Course</th>
                        <th scope="col">Edit | Delete | Show Question</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($allExam as $exam)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{ $exam->name }}</td>
                        <td>{{ $exam->date }}</td>
                        <td>{{ $exam->duration }}</td>
                        <td>{{ $exam->degree}}</td>
                        <td>{{ $exam->course->name}}</td>
                        <td>{!! ExamController::update($exam->id) !!}
                        {!! ExamController::delete($exam->id, $exam->name) !!}
                        <a href="{{ url('question'.'/'.$exam->id) }}" class="btn btn-info"> <i class="fa fa-eye fa-lg"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfooter>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Exam Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Degree</th>
                        <th scope="col">Course</th>
                        <th scope="col">Edit | Delete | Show Question</th>
                    </tr>
                </tfooter>
            </table>
        </div>
    </div>
    {{--  End Show doctor data  --}}
    {{--  Strat Cteate doctor  --}}

    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #3c8dbc;color:#FFF">
                    <h5 class="modal-title" style="text-align:center;font-size:30px;color:#FFF" id="exampleModalLongTitle"><i
                            class="fa fa-plus"></i> Add New Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['method'=>'post','url'=>'addexamPost']) !!}
                    
                    {!! Form::hidden('doctor_id',doctor()->user()->id) !!}
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <i class="fa fa-user"></i>
                                {!! Form::label('name', 'Exam Name') !!}
                                {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Exam Name', 'required'=>'required' ]) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('date', 'Date and Time') !!}
                                {!! Form::date('date',old('date'), [ 'class'=>'form-control','placeholder'=>'Date For Exam' ,'required'=>'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                {!! Form::label('startTime', 'Start Time') !!}
                                {!! Form::time('startTime',old('startTime'), [ 'class'=>'form-control','placeholder'=>'Start Time For Exam' ,'required'=>'required']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Form::label('endTime', 'End Time') !!}
                                {!! Form::time('endTime',old('endTime'), [ 'class'=>'form-control','placeholder'=>'End Time For Exam' ,'required'=>'required']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Form::label('degree', 'Degree') !!}
                                {!! Form::text('degree',old('degree'),[ 'class'=>'form-control','placeholder'=>'degree' ,'required'=>'required' ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('course_id','Choose Course') !!}     
                        {!! Form::select('course_id',$allCourses,null,['class'=>'form-control']) !!}  
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
    {{--  End Cteate doctor  --}}
    @include('layouts.footeroption')
    @endsection()
