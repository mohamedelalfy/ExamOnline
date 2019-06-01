@extends('index')
@section('body')
<body id="home">
@endsection()
@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        {{--  Start Show doctor data  --}}
        <table class="table table-striped  table-bordered" id="datatable">
            <thead>
                <tr>
                    <th scope="col">Course</th>
                    <th scope="col">quiz</th>
                    <th scope="col">Your Degree</th>
                    <th scope="col">From Degree</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($d as $item)
                <tr>
                    <td>{{ $item->exam->course->name }}</td>
                    <td>{{ $item->exam->name }}</td>
                    <td>{{ $item->degree }}</td>
                    <td>{{ $item->exam->degree}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfooter>
                <tr>
                    <th scope="col">Course</th>
                    <th scope="col">quiz</th>
                    <th scope="col">Your Degree</th>
                    <th scope="col">From Degree</th>
                </tr>
            </tfooter>
        </table>
    </div>
</div>
{{--  End Show doctor data  --}}

@endsection()
