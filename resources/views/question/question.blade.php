@extends('index')
@section('body')
    <body id="home">
@endsection()
@section('content')

<div class="quiz" style="margin: 80px 3px 8px 12px">
    <button type="button" class="btn btn-info" style="background-color: #6696f9;" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fa fa-plus"></i> Add Questions 
    </button>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ImportModalCenter">
            <i class="fa fa-upload"></i> Import <i class="fa fa-download"></i> Export
    </button>
    <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#randomModalCenter">
            <i class="fa fa-random"> </i> Add Quiz 
    </button>
    <div class="question-bank" style="margin-top: -35px;text-align: center;">
        <h1 style="font-size: 31px; color: #337ab7;"><i class="fa fa-inbox"></i> Question Bank</h1>
    </div>

</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="container" style="border: 1px solid #DDD;padding: 10px 0px 10px 21px; background:#FFF">
            <div>
                <div class="row">
                    <div class="col-md-3">
                        <p> start time at : <span> {{ $exam->startTime }}</span> </p>
                    </div>
                    <div class="col-md-3">
                        <p> Exam-name : <span> {{ $exam->name }}</span> </p>
                    </div>
                    <div class="col-md-3">
                        <p> Date : <span>{{ $exam->date }}</span> </p>
                    </div>
                    <div class="col-md-3">
                        <p>degree : <span>{{ $exam->degree }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="pull-right">
            <input type="submit" form="delete-check" value="Delete Check" class="btn btn-danger" style="width:100%;margin:5px 6px -10px 6px"> 
        </div>
    </div>
    <hr>
    <div class="panel panel-body">
        @foreach ($questions as $question)
            <section class="quiz container">
                <div class="question">
                    <h5>{{ $loop->iteration }}- {{ $question->question }}?<h5><span style="color:#01010194;font-size:20px;font-family:-webkit-body;margin-left: 12px;">Degree:{{ $question->degree }}</span>
                    <div class="answer">
                        @if ($question->type == 'Ch')    
                            <span>
                                <span>
                                    <span @if ($question->question_answer == 'A')class='the-answer' @endif >A- </span>{{ $question->choose->ch_one }}
                                </span>
    
                            </span>
                            <span>
                                <span>
                                    <span @if ($question->question_answer == 'B')class='the-answer' @endif >B- </span>{{ $question->choose->ch_two }} 
                                </span>
                            </span>
                            <span>
                                <span>
                                    <span @if ($question->question_answer == 'C')class='the-answer' @endif >C- </span>{{ $question->choose->ch_three }} 
                                </span>
                            </span>
                            <span>
                                <span>
                                    <span @if ($question->question_answer == 'D')class='the-answer' @endif >D-</span>{{ $question->choose->ch_four }} 
                                </span>
                            </span>
                        @else
                        
                        <div class="tandf">
                            <span>
                                <span @if ($question->question_answer == 'True' or $question->question_answer == '1' )class='the-answer' @endif>
                                    True
                                </span> 
                            </span>
                            <span>
                                <span @if ($question->question_answer == 'False' or $question->question_answer == '0' ) class='the-answer' @endif>
                                    False
                                </span> 
                            </span>
                        </div>
                            
                        @endif
                    </div>
                        <span class="buttons pull-right row" style="position: relative;top:-66px;">
                            <div class="col-xs-4">
                                {!! ExamController::questionedit($question->id) !!}
                            </div>
                            <div class="col-xs-4">
                                {!! ExamController::deletequestion($question->id, $question->question) !!}
                            </div>
                            <div class="col-xs-4">
                                {!! Form::open(['id'=>'delete-check','method'=>'PATCH','url'=>'destroy_question']) !!}
                                    {!! Form::checkbox('destroy[]',$question->id) !!}
                                {!! Form::close() !!}
                            </div>
                        </span>
                </div>
                
            </section>
        @endforeach
    </div>
</div>


{{--  start insert question  --}}

{{-- Start insert Question --}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #3c8dbc;color:#FFF">
                <h5 class="modal-title" style="text-align:center;font-size:30px" id="exampleModalLongTitle"><i class="fa fa-plus"></i>
                    Add New Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form">
                    <ul class="tab-group">
                        <li class="tab active"><a href="#choose">choose</a></li>
                        <li class="tab"> <a href="#login"> True & False </a></li>
                     </ul>
                    <div class="tab-content">
                        <div id="choose">
                                {!! Form::open(['url'=>'store', 'method'=>'POST']) !!}                                
                                    {!! Form::hidden('choose') !!}
                                    {!! Form::hidden('exam_id', $exam->id) !!}
                                    {!! Form::textarea('question',old('question'),['placeholder'=>'Enter Your Question','class'=>'form-control','rows'=>'5','cols'=>'20' ,'required'=>'required','style'=>'border: none;
                                    background: #FFF;color: #363535;font-family: auto;']) !!}
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" value="1" type="button"> A </button>
                                        </span>
                                        {!! Form::text('ch_one',old('ch_one'),['class'=>'form-control' ,'required'=>'required']) !!}
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" value="2" type="button"> B </button>
                                        </span>
                                        {!! Form::text('ch_two',old('ch_two'),['class'=>'form-control test' ,'required'=>'required']) !!}
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" value="3" type="button"> C </button>
                                        </span>
                                        {!! Form::text('ch_three',old('ch_three'),['class'=>'form-control test' ,'required'=>'required']) !!}
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button name="choose" class="btn btn-default" value="4" type="button"> D </button>
                                        </span>
                                        {!! Form::text('ch_four',old('ch_four'),['class'=>'form-control test' ,'required'=>'required']) !!}
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                {!! Form::label('question_answer', 'The Answer') !!}
                                                {!! Form::select('question_answer',['A','B','C','D'],null,['class' => 'form-control' ,'required'=>'required']) !!}   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mark">
                                        <div class="form-group  mark1 ">
                                            <div class="input-group">
                                                <span class="input-group-addon">mark</span>
                                                {!! Form::number('degree',old('degree'),['class' => 'form-control' ,'required'=>'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="background: #3c8dbc;color:#FFF">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        {!! Form::submit('Insert', ['class'=>'btn btn-info']) !!}
                                    </div>
                                {!! Form::close() !!} 
                        </div>
                        <div id="login">
                            {!! Form::open(['url'=>'store', 'method'=>'POST']) !!}
                                {!! Form::hidden('exam_id', $exam->id) !!}
                                {!! Form::hidden('TrueFalse') !!}
                                {!! Form::textarea('question',old('question'),['placeholder'=>'Enter Your Question','class'=>'form-control','rows'=>'5','cols'=>'20']) !!}
                                <div class="row">
                                        <div class="col-md-6">
                                            <label>Answer The Question</label><br>
                                            <span><input type="radio" name="question_answer" value="True" checked=""> True</span>
                                            <span><input type="radio" name="question_answer" value="False"> False</span>
                                        </div>
                                    </div>
                                <div class="mark">
                                        <div class="form-group  mark1 ">
                                            <div class="input-group">
                                                <span class="input-group-addon">mark</span>
                                                {!! Form::number('degree',old('degree'),['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        {!! Form::submit('Insert', ['class'=>'btn btn-info']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div><!-- tab-content -->
                </div><!-- /form -->
            </div>
        </div>
    </div>
</div>
{{-- End Modinsert Question --}}

{{--  End insert question  --}}

{{-- Start Import Export  --}}
<!-- Modal -->
<div class="modal fade" id="ImportModalCenter" tabindex="-1" role="dialog" aria-labelledby="ImportModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #3c8dbc;color:#FFF">
        <h5 class="modal-title" style="text-align:center;font-size:30px" id="ImportModalLongTitle"> <i class="fa fa-upload"></i> Import <i class="fa fa-download"></i> Export</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url'=>'import'.'/'.$exam->id, 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
            {!! Form::hidden('exam_id', $exam->id) !!}
          <div class="form-group">
              {!! Form::label('export', 'Export') !!}
                <a href="{{ url('export') }}" class="btn btn-success">Export</a>
          </div>
          <div class="form-group">
                {!! Form::label('file', 'Import') !!}
                {!! Form::file('file', ['id'=>'file','focus'=>'autofocus','class'=>'form-control','id'=>'import']) !!}
                <span class="help-block with-error"></span>
            </div>
            
            {!! Form::submit('import', ['class'=>'btn btn-success']) !!}
            
        {!! Form::close() !!}
      </div>
          <div class="modal-footer" style="background: #3c8dbc;color:#FFF">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
</div>
{{-- End Import Export  --}}
{{-- Start random ModalCenter  --}}
<!-- Modal -->
<div class="modal fade" id="randomModalCenter" tabindex="-1" role="dialog" aria-labelledby="ImportModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #3c8dbc;color:#FFF">
        <h5 class="modal-title" style="text-align:center;font-size:30px" id="ImportModalLongTitle"><i class="fa fa-random"></i> Add Quiz</h5>
        <p style="text-align:center;font-size:30px;color:#3e3e3ee3"> You Will Add Random Question To Quiz </p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url'=>'random','method'=>'post']) !!}
            {!! Form::hidden('exam_id', $exam->id) !!}
            <p style="text-align:center;font-size:20px;color:#3e3e3ee3"><i class="fa fa-info" style="border:1px solid #000;border-radius:50%; padding: 4px;"></i> You can specify the number of random questions </p>
            <i class="fa fa-random"></i>
            {!! Form::label('random', 'Random Namber') !!}
            {!! Form::number('random', old('random'),['required'=>'required']) !!}
            {!! Form::submit('Add',['class'=>'btn btn-success']) !!}
            
        {!! Form::close() !!}
      </div>
          <div class="modal-footer" style="background: #3c8dbc;color:#FFF">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
</div>
{{-- End random ModalCenter  --}}
    @endsection()