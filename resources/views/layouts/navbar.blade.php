<!-- Start Our Navbar -->

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ournavbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="ournavbar">
            <div class="row">
                <div class="col-md-4">

                    <a class="navbar-brand wobble-horizontal" href="#">EX <span>AM</span></a>
                </div>
                <div class="col-md-4">
                    <ul class="nav navbar-nav navbar-left">

                        <li class="active link"><a href="{{ url('/') }}">Home</a></li>
                        <li><a class="link " href="#About_us">About</a></li>
                        <li><a class="link" href="{{ url('ourteam') }}#img">our team</a></li>
                        <li><a class="link" href="#contact-us" data-vale="contact"> contact us</a></li>

                        <!-- notification -->

                    </ul>
                </div>
                <div class="col-md-4">
                    @if(doctor()->user())
                    <ul class="nav navbar-nav navbar-right">
                        <li role="presentation" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img class=" img-circle img-responsive" src="{{ url('uploads/'.doctor()->user()->photo) }}"
                                    alt="user img not found">
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" class="img" role="button" aria-haspopup="true" aria-expanded="false">
                                        <img class="img-responsive" src="{{ url('uploads/'.doctor()->user()->photo) }}"
                                            alt="user img not found">
                                    </a>
                                    <h4>DR : {{ doctor()->user()->f_name }} {{ doctor()->user()->l_name }}</h4>
                                    <div class="buttons">
                                        <div class="row">
                                            <div class="col-md-6">                                                
                                                <a class="btn btn-primary btn-block" href="{{ url('profileDoctor/'.doctor()->user()->id) }}"><i class="fa fa-users fa-lg"></i>
                                                    profile</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a class="btn btn-primary btn-block" href="{{ url('logout') }}"><i class="fa fa-edit fa-lg"></i>
                                                    logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <div class="notifications">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell"></i>
                                    <span class="num"> 5</span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <span class="icon"> <i class="fa fa-user"></i> </span>
                                        <span class="text ">You Have Quiz After 2 Days </span>
                                    </li>
                                    <li>
                                        <span class="icon"> <i class="fa fa-user"></i></span>
                                        <span class="text">You Have Quiz After 3 Days </span>
                                    </li>
                                    <li>
                                        <span class="icon"> <i class="fa fa-user"></i></span>
                                        <span class="text">You Have Quiz After 4 Days </span>
                                    </li>
                                    <li>
                                        <span class="icon"> <i class="fa fa-user"></i></span>
                                        <span class="text">You Have Quiz After 5 Days </span>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="dropdown">
                            <div class="notifications">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-comments"></i>
                                    <span class="num"> 3</span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <span class="icon"> <i class="fa fa-comment"></i> </span>
                                        <span class="text ">You Have Quiz After 2 Days </span>
                                    </li>
                                    <li>
                                        <span class="icon"> <i class="fa fa-comment"></i></span>
                                        <span class="text">You Have Quiz After 3 Days </span>
                                    </li>
                                    <li>
                                        <span class="icon"> <i class="fa fa-comment"></i></span>
                                        <span class="text">You Have Quiz After 4 Days </span>
                                    </li>
                                    <li>
                                        <span class="icon"> <i class="fa fa-comment"></i></span>
                                        <span class="text">You Have Quiz After 5 Days </span>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                    @elseif (student()->user())

                    <ul class="nav navbar-nav navbar-right">
                        <li role="presentation" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img class=" img-circle img-responsive" src="{{ url('uploads/'.student()->user()->photo) }}"
                                    alt="user img not found">
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" class="img" role="button" aria-haspopup="true" aria-expanded="false">
                                        <img class="img-responsive" src="{{ url('uploads/'.student()->user()->photo) }}"
                                            alt="user img not found">
                                    </a>
                                    <h4>St : {{ student()->user()->f_name }} {{ student()->user()->l_name }}</h4>
                                    <div class="buttons">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a class="btn btn-primary pull-lef btn-blockt" href="{{ url('profileStudent'.'/'.student()->user()->id) }}"><i class="fa fa-users fa-lg"></i>
                                                    profile</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a class="btn btn-primary btn-block"  href="{{ url('logoutStudent') }}"><i class="fa fa-edit fa-lg"></i>
                                                    logout</a>
                                            </div>
                                            <div class="col-md-4">
                                                    <a class="btn btn-primary btn-block pull-right" href="{{ url('quizdegree') }}"><i class="fa fa-info fa-lg"></i>
                                                        Degrees</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <div class="notifications">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell"></i>
                                    <span class="num"> 5</span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <span class="icon"> <i class="fa fa-user"></i> </span>
                                        <span class="text ">You Have Quiz After 2 Days </span>
                                    </li>
                                    <li>
                                        <span class="icon"> <i class="fa fa-user"></i></span>
                                        <span class="text">You Have Quiz After 3 Days </span>
                                    </li>
                                    <li>
                                        <span class="icon"> <i class="fa fa-user"></i></span>
                                        <span class="text">You Have Quiz After 4 Days </span>
                                    </li>
                                    <li>
                                        <span class="icon"> <i class="fa fa-user"></i></span>
                                        <span class="text">You Have Quiz After 5 Days </span>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="dropdown">
                            <div class="notifications">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-comments"></i>
                                    <span class="num"> 3</span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <span class="icon"> <i class="fa fa-comment"></i> </span>
                                        <span class="text ">You Have Quiz After 2 Days </span>
                                    </li>
                                    <li>
                                        <span class="icon"> <i class="fa fa-comment"></i></span>
                                        <span class="text">You Have Quiz After 3 Days </span>
                                    </li>
                                    <li>
                                        <span class="icon"> <i class="fa fa-comment"></i></span>
                                        <span class="text">You Have Quiz After 4 Days </span>
                                    </li>
                                    <li>
                                        <span class="icon"> <i class="fa fa-comment"></i></span>
                                        <span class="text">You Have Quiz After 5 Days </span>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    @else
                    <div class="nav navbar-nav navbar-right">
                        <a class="btn btn-primary" style="margin:8px auto" href="{{ url('login') }}">
                            Login <i class="fa fa-sign-in"></i></i></a>

                    </div>
                    @endif
                </div>

            </div>





        </div>
    </div>

    </div> <!-- End Of The Container -->
</nav>

<!-- End Our Navbar -->
