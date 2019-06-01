@extends('admin.index')
@section('content')
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3 style="color:#FFF">{{ $numberOfAdmin }}</h3>
        <p>Number Of Admins</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="{{ aurl('admin') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3 style="color:#FFF">{{ $numberOfDoctor }}</h3>
        <p>Number Of Doctors</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="{{ aurl('doctor') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3 style="color:#FFF">{{ $numberOfStudent }}</h3>
        <p>Number Of Students</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="{{ aurl('student') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3 style="color:#FFF">{{ $numberOfCourse }}</h3>

        <p>Number Of Courses</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{{ aurl('course') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-md-6">
    <!-- USERS LIST -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Latest Students</h3>

        <div class="box-tools pull-right">
          <span class="label label-danger">{{ $numberOfStudent }} New Members</span>
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding" style="">
        <ul class="users-list clearfix">  
          @foreach ($students as $item)
            <li>
              <img src="{{ url('uploads/'.$item->photo) }}" alt="User Image" style="width:120px;height:120px">
              <a class="users-list-name" href="#">{{ $item->f_name }} {{ $item->l_name }}</a>
              <span class="users-list-date">15 Jan</span>
            </li>
          @endforeach
        </ul>
        <!-- /.users-list -->
      </div>

    </div>
    <!--/.box -->
  </div>
  <div class="col-md-6">
    <!-- USERS LIST -->
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Latest Doctors</h3>

        <div class="box-tools pull-right">
          <span class="label label-danger">{{ $numberOfDoctor }} New Members</span>
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding" style="">
        <ul class="users-list clearfix">  
          @foreach ($doctors as $item)
            <li>
              <img src="{{ url('uploads/'.$item->photo) }}" alt="User Image" style="width:120px;height:120px">
              <a class="users-list-name" href="#">{{ $item->f_name }} {{ $item->l_name }}</a>
              <span class="users-list-date">15 Jan</span>
            </li>
          @endforeach
        </ul>
        <!-- /.users-list -->
      </div>

    </div>
    <!--/.box -->
  </div>
@endsection