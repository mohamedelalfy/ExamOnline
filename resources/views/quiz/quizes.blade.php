@extends('index')
@section('body')
<body id="home">
    @endsection()
    @section('content')
<h1 class="text-center" style="color: #4d8dd1d6;background: #f1f1f1;padding: 10px;margin-top: 81px;">Quizes</h1>
    @foreach ($quizes as $quiz)
    <header class="container">
        <div class="text-center">
            <p> start time at <span> {{ $quiz->duration }}</span> </p>
            <p> Date <span>{{ $quiz->date }}</span> </p>
            <p>degree <span>{{ $quiz->degree }}</span></p>
            <p>{{ $quiz->name }}</p>
            <p><span>DR: </span>{{ $quiz->doctor->f_name }} {{ $quiz->doctor->l_name }}</p>
        </div>
    </header>
    <div class="container">
            <div class="pull-right">
                <input type="submit" form="delete-check" value="Delete Check" class="btn btn-danger" style="width:100%;margin:-16px 70px 27px -49px"> 
            </div>
        </div>
    @foreach ($quiz->quiz as $item)
    <section class="quiz container">
        <div class="question">
                <h5>{{ $loop->iteration }}- {{ $item->question }} </h5>
                <div class="answer">
                    @if ($item->type == 'Ch')    
                    <span>
                        <span> A- {{ $item->choose->ch_one }} </span>
                    </span>
                    <span>
                        <span> B- {{ $item->choose->ch_two }} </span>
                    </span>
                    <span>
                        <span> C- {{ $item->choose->ch_three }} </span>
                    </span>
                    <span>
                        <span> D- {{ $item->choose->ch_four }} </span>
                    </span>
                    @else
                    <div class="tandf">
                        <span>
                            <span> True </span> 
                        </span>
                        <span>
                            <span> False </span> 
                        </span>
                    </div>
                    
                    @endif
            
            </div>
            <span class="buttons pull-right row" style="position: relative;top:-66px;">
                    <div class="col-xs-4">
                        {!! ExamController::quizedit($item->id) !!}
                    </div>
                    <div class="col-xs-4">
                        {!! ExamController::deletequiz($item->id, $item->question) !!}
                    </div>
                    <div class="col-xs-4">
                        {!! Form::open(['id'=>'delete-check','method'=>'PATCH','url'=>'destroy_quiz']) !!}
                            {!! Form::checkbox('destroy[]',$item->id) !!}
                        {!! Form::close() !!}
                    </div>
                </span>
        </div>
    </section>
    @endforeach

    @endforeach

    @endsection()
