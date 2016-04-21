@extends('masterpage')


@section('content')


    <h2>My Ideas</h2>
    <br>

    @foreach($ideas as $idea)
        <idea>

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

        </idea>
    @endforeach
@endsection
