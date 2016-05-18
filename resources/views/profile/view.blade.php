@extends('masterpage')

@section('content')

    <div class="-header">
        <h2>My Profile</h2>
    </div>

    <div class="row">
        <!-- profile picture -->
        <div class="col-md-4">


            <form method="post" action="{{ url('/profile/pic') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="id" value="{{ Auth::user()->id }}"/>

                <img src="{{ Auth::user()->prof_pic == NULL ? URL::asset('images/profile1.jpg') : URL::asset(Auth::user()->prof_pic) }}">
                <label for="profile_pic">Choose an Image</label>
                <input id="profile_pic" name="profile_pic" type="file"/>
                <button type="submit" class="btn bg-success"><i class="fa fa-edit"></i> Edit your profile picture</button>
            </form>

            <script src="js/sweetalert.min.js"></script>

            <!-- Include this after the sweet alert js file -->
            @include('sweet::alert')

        </div>

        <!-- basic details -->
        <div class="col-md-8">
            @foreach($user_details as $user)
                <table>
                    <tr>
                        <td class="title">Name</td>
                        <td>:{{$user->name}}</td>
                    </tr>

                    <tr>
                        <td class="title">Email</td>
                        <td>:{{$user->email}}</td>
                    </tr>

                    <tr>
                        <td class="title">Status</td>
                        <td>:{{$user->status}}</td>
                    </tr>

                    <tr>
                        <td class="title">Faculty</td>
                        <td>:{{$user->faculty}}</td>
                    </tr>

                </table>

            @endforeach

                <button type="button" class="btn bg-success" data-toggle="modal" data-target="#profileEditForm">
                    <i class="fa fa-edit"></i> Edit your profile
                </button>

                {!! Form::model($user, ['method'=>'PATCH', 'action' =>['ProfileController@update', $user->id]]) !!}
                <div class="modal fade" id="profileEditForm">
                    <div class="modal-backdrop">
                        <div class="modal-content">
                            <div class="container">
                                <!-- Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h3>Edit Your Profile</h3>
                                </div>

                                <!-- Body -->

                                    <div class="form-group">
                                        {!! Form::label('name', 'Name') !!}
                                        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name'] )!!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('email', 'Email') !!}
                                        {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Email'] )!!}
                                    </div>

                                            <!-- Footer -->
                                    <div class="form-group">
                                        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}


        </div>
    </div>



    <div class="row" style="padding-top: 30px">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bar-chart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$user->userlevel}}</div>
                            <div>Level</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$ideacount}}</div>
                            <div>Ideas</div>
                        </div>
                    </div>
                </div>
                <a href="{{action('IdeaController@index')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$commencount}}</div>
                            <div>Comments</div>
                        </div>
                    </div>
                </div>
                <a href="{{action('CommentControler@show')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection