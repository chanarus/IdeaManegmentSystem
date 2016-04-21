@extends('masterpage')

@section('content')

    <div class="-header">
        <h2>My Profile</h2>
    </div>

    <div class="row">
        <!-- profile picture -->
        <div class="col-md-4">
            <img src="{{ asset('images/profile1.jpg') }}">
            <button type="button" class="btn bg-success"><i class="fa fa-edit"></i> Edit your profile picture</button>
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
                                    {!! Form::close() !!}

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

@endsection