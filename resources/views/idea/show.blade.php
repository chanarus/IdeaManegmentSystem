@extends('masterpage')

@section('content')

    <div>
        @if(Session::has('flash_message'))
            <div class="alert alert-danger">
                {{Session::get('flash_message')}}
            </div>
        @endif
    </div>

    <div class="well">
        <idea>
            <!-- Display Idea title -->
            <h2>{{$idea->title}}</h2>

            <i class="fa fa-book fa-2x"></i>

            <!-- Display Idea category -->
            <b style="font-size: x-large">Category : {{$idea->category}}</b>
            <br>

            <!-- Display Idea creator -->
            <i class="fa fa-user"></i><span><b> {{$idea->user->name}}</b></span>
            <br>

            <!-- Display Idea current ratings -->
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-empty"></i>
            <b> ratings : {{$idea->ratings}}</b>
            <br>

            <!-- Display Idea published date or last edit date -->
            <i class="fa fa-clock-o"></i><b> Last Edit : {{$idea->updated_at->format('d-m-y')}}</b>
            <hr>

            <!-- Display Idea body -->
            <div class="body">{{$idea->body}}</div>
            <br>

            <!-- Display Idea likes and dislike count -->
            <i class="fa fa-thumbs-o-up"></i>
            <a href="#">like</a>
            <span>{{$idea->likes}}</span>


            <i class="fa fa-thumbs-o-down"></i>
            <a href="#">dislike</a>
            <span> {{$idea->dislikes}}</span>
            <br>

            <!-- Display Idea edit button -->
            <a href="{{action('IdeaController@edit', [$idea->id])}}">
                <button class="btn btn-success">
                   <i class="fa fa-pencil"></i> Edit
                </button>
            </a>
            <br>

            <!-- Display Idea delete button -->
            <div>
                {!! Form::open([
                                'method' => 'DELETE',
                                 'url' => ['ideas', $idea->id]
                ]) !!}
                {!! Form::submit('Delete this Idea?', ['class' => 'btn btn-danger','fa fa-trash']) !!}
                {!! Form::close() !!}
            </div>

        </idea>

        <!-- Display Idea All Comments with the user it added -->
        <h4>Comments</h4>
        <hr>

        @foreach($comments->comments as $comment)

            <span style="color: #2e6da4">By {{ $comment->user->name }}</span>
            <div>{{ $comment->body }}</div>
            <br>

        @endforeach
         <hr>

        <!-- Add Comment -->
        <i class="fa fa-user"></i><b>{{  Auth::user()->name }}</b>
        <form role="form" method="POST" action="/ideas/{{$idea->id}}">

            {{ csrf_field() }}
            <div class="form-group">
                <textarea class="form-control" rows="5" name="comment" id="comment"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>



@endsection
