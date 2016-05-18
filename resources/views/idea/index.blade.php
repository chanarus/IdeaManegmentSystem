@extends('masterpage')


@section('content')


    <h2>My Ideas</h2>
    <br>

    @foreach($ideas as $idea)
        <idea>

            <div class="row">
                <div class="col-md-11">

                    <div class="well">
                        <div class="row">
                            <div class="col-md-9">
                                <h3>
                                    Title :
                                    <a href="{{action('IdeaController@show', [$idea->id])}}">{{$idea->title}}</a>
                                </h3>

                                <h4>
                                    Category : {{$idea->category}}
                                </h4>
                            </div>

                            <div class="col-md-1" align="center">
                                <i class="fa fa-star fa-2x" style="color: #2e6da4"></i>
                                <i class="fa fa-star fa-2x" style="color: #2e6da4"></i>
                                <i class="fa fa-star-half-empty fa-2x" style="color: #2e6da4"></i>
                                <b> ratings<br> {{$idea->ratings}}</b>
                            </div>

                            <div class="col-md-1" align="center">
                                <a href="{{action('LikeController@addlike', [$idea->id])}}">
                                    <i class="fa fa-thumbs-up fa-4x" style="color: #2e6da4"></i>
                                </a><br>
                                <span style="font-weight:bold; font-size: 20px">{{$idea->likes}}</span>
                            </div>

                            <div class="col-md-1" align="center">
                                <a href="{{action('LikeController@adddislike', [$idea->id])}}">
                                    <i class="fa fa-thumbs-down fa-4x" style="color: #2e6da4"></i>
                                </a><br>
                                <span style="font-weight:bold; font-size: 20px"> {{$idea->dislikes}}</span>
                            </div>
                        </div>

                        <div class="body">{{$idea->body}}
                            <a href="{{action('IdeaController@show', [$idea->id])}}">
                                view more...
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-1">
                    <button type="button" class="btn btn-success fa fa-image" data-toggle="modal" data-target="#imgAddForm"></button>
                    <br><br>

                    <form method="post" action="{{ url('/ideas/pic') }}" enctype="multipart/form-data">
                        <div class="modal fade" id="imgAddForm">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="container">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h3>Add Images to Your idea</h3>
                                        </div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                        <input type="hidden" name="id" value="{{ $idea->id }}"/>


                                        <div class="form-group">
                                            <label for="profile_pic">Choose an Image</label>
                                            <input id="idea_image1" name="idea_image1" type="file"/>
                                            <input id="idea_image2" name="idea_image2" type="file"/>
                                            <input id="idea_image3" name="idea_image3" type="file"/>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i>Add Images</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <a href="{{action('IdeaController@edit', [$idea->id])}}">
                        <button type="button" class="btn btn-primary fa fa-edit"></button>
                    </a> <br><br>

                    <div>
                        {!! Form::open([
                                        'method' => 'DELETE',
                                         'url' => ['ideas', $idea->id]
                        ]) !!}
                        {{Form::button('<i class="fa fa-delete"></i>', array('type' => 'submit', 'class' => 'btn btn-danger'))}}
                        {!! Form::close() !!}

                        <script src="js/sweetalert.min.js"></script>

                        <!-- Include this after the sweet alert js file -->
                        @include('sweet::alert')
                    </div>
                </div>
            </div>

        </idea>

        <script src="js/sweetalert.min.js"></script>

        <!-- Include this after the sweet alert js file -->
        @include('sweet::alert')
    @endforeach
@endsection
