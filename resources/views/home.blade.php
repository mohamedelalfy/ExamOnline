@extends('index')
@section('body')
    <body id="home">
@endsection()
@section('content')


@if (doctor()->user())

<!-- Start Breadcrumb -->

<div class="breadcrumb-holder">
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Doctors</li>
    </ol>
</div>

<!-- End Breadcrumb -->
<!-- Start Section How To Work  -->
<section class="work text-center ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-header">How to make quiz</h2>
            </div>
            <div class="col-sm-4">
                <a href="{{ url('addexam') }}">
                    <i class="fa fa-pencil-square-o fa-4x" aria-hidden="true"></i>
                    <h3> Add Exams </h3>
                </a>
                <p>exam will be 10 questions randomly chooses from doctor question data, then
                    he will know his degree </p>
            </div>
            <div class="col-sm-4">
                <a href="{{ url('quizes') }}">
                    <i class="fa fa-eye fa-4x" aria-hidden="true"></i>
                    <h3> Show Quizes</h3>
                </a>
                <p>if Doctor adding exam date it will be notificated for all students that enrolled his course or following him.</p>
            </div>
            <div class="col-sm-4">
                <a href="#">
                    <i class="fa fa-child fa-4x"></i>
                    <h3> date & duration</h3>
                </a>
                <p>Doctor choose exam date, duration and final degree.</p>
            </div>

        </div>

    </div>
</section>

<!-- start section of courses -->
	<section class="courses sm-padding">
		<div class="container">
			<div class="slider">

                @foreach ($courses as $item)       
                    <div class="courses_card">
                        <div class="top">
                            <div id="rectangle"></div>
                            <img src="{{ url('uploads/'.$item->photo) }}" alt="img Course">
                        </div>
                        <div class="content">
                            <h3>{{ $item->name }}</h3>
                            <a href="{{ url('course_details'.'/'.$item->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> Details</a>
                        </div>
                    </div>
                @endforeach


			</div> <!-- end slider -->


			<div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100">
				<span class="slider__label sr-only"> </span>

			</div>

		</div>
	</section>
<!-- End section of courses -->

@else
@if (student()->user())
    

<div class="landing-page">
    <div class="page-content">
            <h1 id='open'>your quiz start after </h1>
            @foreach ($exam as $item)
                <a href="{{ url('studentQuiz'.'/'.$item->id) }}" id="start" style="border-radius: 20px; display:none"></a>
            @endforeach
                <div class="count">
                    <div class="countd">
                        <span id="days">00</span> DAYS
                    </div>

                    <div class="countd">
                        <span id="hours">00</span> HOURS
                    </div>
                    
                    <div class="countd">
                        <span id="minutes">00</span> MINUTES
                    </div>
                    
                    <div class="countd">
                        <span id="seconds">00</span> SECONDS
                    </div>
                </div>
                
        </div>
    </div>
    
@endif

<!-- start slider section -->
    
<!-- start contact-us -->
<section id="About_us"class="About_us">
    <div class="container" >
        <div class="text-center">
            <h2 class="title text-center" style="margin-top: 50px;">About Us</h2>
            <p>Our Website is useful for all academic staff , You can enter as student or a doctor. </p>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <div class="information ">
                    <h3>information</h3>
                    <p> Then quizzes are online which you can answer and get your grade and print it on one page.Then you can pick up
                        your available courses by check your notifications on time.
                    </p>
                    <div class="feat">
                        <ul>
                            <li> <i class="fa fa-check"> </i> User can drop courses before first exam only</li>
                            <li> <i class="fa fa-check"> </i> User can chat with all users such as students, admin and user.</li>
                            <li> <i class="fa fa-check"> </i> Doctor choose exam date, duration and final degree.</li>
                            <li> <i class="fa fa-check"> </i> Admin has his own page and ability to change it, or accept all messages</li>
                            <li> <i class="fa fa-check"> </i> if any user find a bug then sends report to admin to fix it.</li>

                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-lg-5">
                <div class="photo">
                    <img src="img/OB821A0.jpg" alt="..." class="img-thumbnail">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- start contact-us  -->
<!-- start section Contact us -->
<section id="contact" class="section md-padding">
    <div class="overlay"></div>
    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section-header -->
            <div class="section-header text-center">
                <h2 id="contact-us" class="title">Get in touch</h2>
            </div>
            <!-- /Section-header -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-phone"></i>
                    <h3>Phone</h3>
                    <p>01011616868</p>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-envelope"></i>
                    <h3>Email</h3>
                    <p>email@su.edu.eg</p>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-map-marker"></i>
                    <h3>Address</h3>
                    <p>Sinai University</p>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact form -->
            <div class="col-md-8 col-md-offset-2">
                <form class="contact-form">
                    <input type="text" class="input" placeholder="Name">
                    <input type="number" class="input" placeholder="id" min="0">
                    <input type="text" class="input" placeholder="Subject">
                    <textarea class="input" placeholder="Message"></textarea>
                    <button id="btn"></button>
                </form>
            </div>
            <!-- /contact form -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</section>
<!-- End section Contact us -->

@endif
@foreach ($exam as $item)
<script>
    // start home count down
      var count = new Date( '{{ $item->date }} {{ $item->startTime }}').getTime();
      var x = setInterval(function() {
        var now = new Date().getTime();
        var d = count - now;
      
        var days = Math.floor(d/(1000*60*60*24));
        var hours = Math.floor((d%(1000*60*60*24))/(1000*60*60));
        var minutes = Math.floor((d%(1000*60*60))/(1000*60));
        var seconds = Math.floor((d%(1000*60))/1000);
        
        document.getElementById("days").innerHTML = days;
        document.getElementById("hours").innerHTML = hours;
        document.getElementById("minutes").innerHTML = minutes;
        document.getElementById("seconds").innerHTML = seconds;
        
        if(d <= 0){
            document.getElementById("days").innerHTML = '00';
            document.getElementById("hours").innerHTML = '00';
            document.getElementById("minutes").innerHTML = '00';
            document.getElementById("seconds").innerHTML = '00';
            document.getElementById("start").style ='display:inline' ;
            document.getElementById("start").innerHTML = 'Start';
            document.getElementById('open').innerHTML = 'Start The Quiz Now'
        }
    },1000);
    // End home count down
</script>
@endforeach
@include('layouts.footeroption')
@endsection()