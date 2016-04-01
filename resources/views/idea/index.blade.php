@extends('masterpage')

@section('content')
    <h2>My Ideas</h2>
    <br>

    @foreach($ideas as $idea)
        <idea>

            <div class="well">

                <h3>
                    Title :
                    <a href="{{action('IdeaController@show', [$idea->id])}}">{{$idea->title}}</a>
                </h3>

                <h4>
                    Category : {{$idea->category}}
                </h4>

                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-empty"></i>
                <b> ratings : {{$idea->ratings}}</b>

                <hr>

                <div class="body">{{$idea->body}}
                    <a href="{{action('IdeaController@show', [$idea->id])}}">
                        view more...
                    </a>
                </div>

                <br>


                <i class="fa fa-thumbs-o-up"></i>
                <a href="#">like</a>
                <span>{{$idea->likes}}</span>


                <i class="fa fa-thumbs-o-down"></i>
                <a href="#">dislike</a>
                <span> {{$idea->dislikes}}</span>

            </div>

        </idea>
    @endforeach
@endsection
