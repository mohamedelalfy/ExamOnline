@extends('index')
@section('body')

<body id="home">
@endsection()
@section('content')

<div class="grid">
    <div id="quiz">
        <h2 class="h1">Quiz</h2>
        <div class="pull-right" id="demo"></div>
 
        <br>
        <hr>
        <div class="wrapper">
            {!! Form::open(['method'=>'post','url'=>'degree','id'=>'degree']) !!}
            <ul class="js_slider_question slider_question loaded">
                @foreach ($questionQuiz as $item)
                        <li class="slider_question_item">
                            <div class="question-container">
                                <p> {{ $loop->iteration }}- {{ $item->question }} </p>
                                <ul class="ans">
                                        @if ($item->type == 'Ch')
                                            <li>
                                                <span> {!! Form::checkbox('select[]', 'A'.$item->id, null) !!} A </span> {{ $item->choose->ch_one }}
                                            </li>
                                            <li>
                                                <span>  {!! Form::checkbox('select[]', 'B'.$item->id,null) !!} B </span>{{ $item->choose->ch_two }} 
                                            </li>
                                            <li>
                                                <span>  {!! Form::checkbox('select[]', 'C'.$item->id, null) !!} C </span>{{ $item->choose->ch_three }} 
                                            </li>
                                            <li>
                                                <span>  {!! Form::checkbox('select[]', 'D'.$item->id, null) !!} D </span>{{ $item->choose->ch_four }} 
                                            </li>
                                            @else
                                            <div class="tandf">
                                                <li>
                                                    <span>  {!! Form::checkbox('select[]', 'true'.$item->id, null) !!} True </span>

                                                </li>
                                                <li>   
                                                    <span>  {!! Form::checkbox('select[]', 'false'.$item->id, null) !!} False </span> 
                                                </li>
                                            </div>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        {!! Form::close() !!}
                        {!! Form::submit('Finsh', ['class'=>'btn btn-primary pull-right','form'=>'degree','id'=>'timeout']) !!}
            <hr>

            <div class="slider_controls">
                <span class="slider_control slider_control_prev"> <i class="fa fa-chevron-left hidden-xs"> </i> Prev </span>

                <ol class="js__slider__pagers slider_pagers"></ol>

                <span class="slider_control slider_control_next">Next <i class="fa fa-chevron-right hidden-xs"></i></span>
            </div>

        </div>

    </div>
</div>
<script>
    // Set the date we're counting down to
@foreach ($date as $date)
    
var countDownDate = new Date('{{ $date->date }} {{ $date->endTime }}').getTime();

// Update the count down every 1 second
var x = setInterval(function() {
    
    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is finished, write some text 
    if (distance < 0) 
    {
        document.getElementById("timeout").click(); 
        
    }
}, 1000);

@endforeach
</script>
@endsection()
