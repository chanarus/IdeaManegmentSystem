@extends('masterpage')

@section('content')

    <div>
        <span style="color: #2e6da4;font-size: large">Number of Results : {{$count}}</span>
    </div>
    <br>
    @foreach($results as $result)
        <idea>

            <div class="well">

                <h3>
                    Title :
                    <a href="{{action('IdeaController@show', [$result->id])}}">{{$result->title}}</a>
                </h3>

                <h4>
                    Category : {{$result->category}}
                </h4>

                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-empty"></i>
                <b> ratings : {{$result->ratings}}</b>

                <hr>

                <div class="body">{{$result->body}}
                    <a href="{{action('IdeaController@show', [$result->id])}}">
                        view more...
                    </a>
                </div>

                <br>

                <i class="fa fa-thumbs-o-up"></i><span> 0</span>
                <i class="fa fa-thumbs-o-down"></i><span> 0</span>

            </div>

        </idea>
    @endforeach

@stop