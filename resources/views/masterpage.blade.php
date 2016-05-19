<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CURTIN UNIVERSITY</title>

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('bootstrap/css/sb-admin.css') }}" rel="stylesheet">

    <!-- SweetAlert CSS -->
    <link href="{{ asset('bootstrap/css/sweetalert.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('bootstrap/css/plugins/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('bootstrap/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{action('HomeController@home')}}">
                    <img src="{{ asset('images/curtin-logo.gif') }}" height="35px">

                </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                 @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                        <!-- messages -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu message-dropdown">
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>John Smith</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-footer">
                                <a href="#">Read All New Messages</a>
                            </li>
                        </ul>
                    </li>
                            @if($notification != NULL)

                    <!-- Notifications-->
                    <li class="dropdown">
                        <a href="{{action('NotificationController@update')}}" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>

                                <ul class="dropdown-menu alert-dropdown">
                                    @foreach($notification as $n)
                                    <li>
                                        <a href="#">{{$n->id}}<span class="label label-default">{{$n->status}}</span></a>
                                    </li>
                                    @endforeach
                                    <li class="divider"></li>

                                    <li>
                                        <a href="#">View All</a>
                                    </li>
                                </ul>

                    </li>

                            @endif

                    <!-- User Details -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <image src="{{ asset(Auth::user()->prof_pic) }}" width="30px" height="30px"></image>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{action('ProfileController@view',[Auth::user()->id])}}">
                                    <i class="fa fa-fw fa-user"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                            </li>
                            <li>
                                <a href="{{action('ProfileController@password',[Auth::user()->id])}}">
                                    <i class="fa fa-fw fa-gear"></i> Settings
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="{{action('HomeController@home')}}"><i class="fa fa-fw fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo">
                            <i class="fa fa-fw fa-arrows-v"></i> Filter <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#Administration">Administration</a>
                            </li>
                            <li>
                                <a href="#General">General</a>
                            </li>
                            <li>
                                <a href="#Sport">Sport</a>
                            </li>
                            <li>
                                <a href="#Academic">Academic</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{action('IdeaController@index')}}"><i class="fa fa-fw fa-book"></i> My Ideas</a>
                    </li>
                    <li>
                        <a href="{{action('IdeaController@create')}}"><i class="fa fa-fw fa-pencil"></i> Add Idea</a>
                    </li>
                    <li>
                        <a href="{{action('SearchController@show')}}"><i class="fa fa-fw fa-search"></i> Search</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container">

                <br><br>

                @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('bootstrap/js/jquery.js') }}"></script>
    <script src="{{ asset('js/notification.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{asset('js/sweetalert.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('bootstrap/js/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/plugins/morris/morris-data.js') }}"></script>

    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="{{ asset('bootstrap/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('bootstrap/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('bootstrap/js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('bootstrap/js/plugins/flot/flot-data.js') }}"></script>

</body>

</html>
