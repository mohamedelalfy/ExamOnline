
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update-model{{ $id }}">
    <i class="fa fa-edit"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="update-model{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #3c8dbc;color:#FFF">
                <h5 class="modal-title" style="text-align:center;font-size:30px;color:#FFF" id="exampleModalLongTitle">
                    <i class="fa fa-edit"></i>Update Exam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::model($exam,['method'=>'PATCH', 'url'=>('edit'.'/'.$id), "id"=>"update-form{{ $id }}" ]) !!}

                {!! Form::hidden('doctor_id',doctor()->user()->id) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <i class="fa fa-user"></i>
                            {!! Form::label('name', 'Exam Name') !!}
                            {!! Form::text('name',old('name'),['placeholder'=>'Exam Name',
                            'required'=>'required' ]) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('date', 'Date') !!}
                            {!! Form::date('date',old('date'), [ 'class'=>'form-control','placeholder'=>'Date For Exam' ,'required'=>'required']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('startTime', 'Start Time ') !!}
                            {!! Form::time('startTime',old('startTime'), [
                            'placeholder'=>'duration For Exam' ,'required'=>'required']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::label('endTime', 'End Time ') !!}
                            {!! Form::time('endTime',old('endTime'), [
                            'placeholder'=>'duration For Exam' ,'required'=>'required']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::label('degree', 'Degree') !!}
                            {!! Form::text('degree',old('degree'),[ 'placeholder'=>'degree'
                            ,'required'=>'required' ]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('course_id','Choose Course') !!}<br>
                            {!! Form::select('course_id',$allCourses,null,['class'=>'form-control','style'=>'width:100%;margin-bottom: 10px;']) !!}
                        </div>
                    </div>

                <div class="modal-footer" style="background: #3c8dbc;color:#FFF">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    {!! Form::submit('Update', ['id'=>'submit{{ $id }}','value'=>'Update','class'=>'btn btn-success'])
                    !!}
                </div>

                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>
    