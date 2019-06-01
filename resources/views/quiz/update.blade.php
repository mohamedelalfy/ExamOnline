
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update-model{{ $id }}"> <i class="fa fa-edit"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="update-model{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #3c8dbc;color:#FFF">
                <h5 class="modal-title" style="text-align:center;font-size:30px;color:#FFF" id="exampleModalLongTitle">
                    <i class="fa fa-edit"></i>Update Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($question->type == 'Ch') 
                    {!! Form::model($question,['method'=>'PATCH', 'url'=>('updatequizCH'.'/'.$id), "id"=>"update-form{{ $id }}" ]) !!}
                        {!! Form::hidden('doctor_id',doctor()->user()->id) !!}
                        {!! Form::hidden('choose') !!}
                        {!! Form::hidden('exam_id', $question->exam_id) !!}
                        {!! Form::textarea('question',old('question'),['placeholder'=>'Enter Your Question','class'=>'form-control','rows'=>'5','cols'=>'20' ,'required'=>'required','style'=>'border: none;
                        background: #FFF;color: #363535;font-family: auto;']) !!}
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-default" value="1" type="button"> A </button>
                            </span>
                            {!! Form::text('ch_one',$question->choose->ch_one,['class'=>'form-control' ,'required'=>'required']) !!}
                        </div>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-default" value="2" type="button"> B </button>
                            </span>
                            {!! Form::text('ch_two',$question->choose->ch_two,['class'=>'form-control test' ,'required'=>'required']) !!}
                        </div>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-default" value="3" type="button"> C </button>
                            </span>
                            {!! Form::text('ch_three',$question->choose->ch_three,['class'=>'form-control test' ,'required'=>'required']) !!}
                        </div>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button name="choose" class="btn btn-default" value="4" type="button"> D </button>
                            </span>
                            {!! Form::text('ch_four',$question->choose->ch_four,['class'=>'form-control test' ,'required'=>'required']) !!}
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::label('question_answer', 'The Answer') !!}
                                    {{--  {!! Form::select('question_answer',['A','B','C','D'],null,['class' => 'form-control' ,'required'=>'required']) !!}     --}}
                                    <select name="question_answer" class="form-control">
                                        <option value="A"@if ($question->question_answer == 'A')selected @endif>A</option>
                                        <option value="B"@if ($question->question_answer == 'B')selected @endif>B</option>
                                        <option value="C"@if ($question->question_answer == 'C')selected @endif>C</option>
                                        <option value="D"@if ($question->question_answer == 'D')selected @endif>D</option>
                                    </select>
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
                @else
                    {!! Form::model($question,['method'=>'PATCH', 'url'=>('updatequiz'.'/'.$id), "id"=>"update-form{{ $id }}" ]) !!}

                        {!! Form::hidden('doctor_id',doctor()->user()->id) !!}
                        {!! Form::hidden('exam_id', $question->exam_id) !!}
                        {!! Form::textarea('question',old('question'),['placeholder'=>'Enter Your Question','class'=>'form-control','rows'=>'5','cols'=>'20']) !!}
                        <div class="row">
                                <div class="col-md-6">
                                    <label>Answer The Question</label><br>
                                    <span><input type="radio" name="question_answer" value="True"
                                        @if ($question->question_answer == 'True' or $question->question_answer == '1')checked @endif > True</span>
                                    <span><input type="radio" name="question_answer" value="False"
                                        @if ($question->question_answer == 'False' or $question->question_answer == '0')checked @endif > False</span>
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
                @endif
            </div>

        </div>
    </div>
</div>
    