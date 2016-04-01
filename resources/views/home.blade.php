@extends('masterpage')

@section('content')
    <h2>Latest Ideas</h2>
    <br>

    @foreach($ideas as $idea)
        <idea>

            <div class="well">

                <h3>
                    Title :
                    <a href="{{action('IdeaController@show', [$idea->id])}}">{{$idea->title}}</a>
                </h3>

                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-empty"></i>
                <b> ratings :</b>

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
