@extends('index')
@section('body')
<body id="home">
@endsection()
@section('content')

<div class="container">
    @foreach ($exams as $exam)
        
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-4">
                    <span class="resultD">{{ $exam->name }}</span>
                </div>
                <div class="col-md-4">
                    <p class="text-center" style="font-size: 22px;color: #323030;">{{ $exam->course->name }}</p>
                </div>
                <div class="col-md-4">
                    <a  href='' class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            {{--  Start Show doctor data  --}}
            <table class="table table-striped  table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <td>Student_Name</td>
                        <td>Degree</td>
                        <td>From</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($degree as $item)
                        @if ($item->exam->name==$exam->name )
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $item->student->f_name }} {{ $item->student->l_name }}</td>
                                <td>{{ $item->degree }}</td>
                                <td>{{ $item->exam->degree }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                <tfooter>
                    <tr>
                        <th>#</th>
                        <td>Student_Name</td>
                        <td>Degree</td>
                        <td>From</td>
                    </tr>
                </tfooter>
            </table>
        </div>
    </div>
    @endforeach
    {{--  End Show doctor data  --}}
</div>
@endsection()
