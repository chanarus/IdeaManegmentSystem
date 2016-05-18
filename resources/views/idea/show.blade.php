@extends('masterpage')

@section('content')

    <div>
        @if(Session::has('flash_message'))
            <div class="alert alert-danger">
                {{Session::get('flash_message')}}
            </div>
        @endif
    </div>

    <div class="container">
        <idea>
            <div class="row">
                <div class="col-md-10">
                    <!-- Display Idea title -->
                    <h2 style="color:dodgerblue;font-weight: bold">{{$idea->title}}</h2>

                    <i class="fa fa-book fa-2x"></i>

                    <!-- Display Idea category -->
                    <b style="font-size: x-large">Category : {{$idea->category}}</b>
                    <br>

                    <!-- Display Idea current ratings -->
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-empty"></i>
                    <b> ratings : {{$idea->ratings}}</b>
                    <br>

                    <!-- Display Idea published date or last edit date -->
                    <i class="fa fa-clock-o"></i><b> Last Edit : {{$idea->updated_at->format('d-m-y')}}</b>
                </div>
                <div class="col-md-2">
                    <!-- Display Idea creator -->
                    <img src="{{ asset($idea->user->prof_pic) }}" width="100px" height="100px" class="img-circle"><br>
                    <i class="fa fa-user"></i><span><b> {{$idea->user->name}}</b></span>
                    <br>
                </div>
            </div>

            <hr>

            <!-- Display Idea body -->
            <div class="body">{{$idea->body}}</div>
            <br>
            <hr>
            <div class="row">
                <h3>Images</h3>
                <div class="col-md-4">
                    <img src="{{asset($idea->idea_image1)}}">
                </div>
                <div class="col-md-4">
                    <img src="{{asset($idea->idea_image2)}}">
                </div>
                <div class="col-md-4">
                    <img src="{{asset($idea->idea_image3)}}">
                </div>
            </div>
            <br><br>

            <!-- Display Idea likes and dislike count -->
            <i class="fa fa-thumbs-o-up"></i>
            <a href="{{action('LikeController@addlike', [$idea->id])}}">like</a>
            <span>{{$idea->likes}}</span>


            <i class="fa fa-thumbs-o-down"></i>
            <a href="{{action('LikeController@adddislike', [$idea->id])}}">dislike</a>
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

                <script src="js/sweetalert.min.js"></script>

                <!-- Include this after the sweet alert js file -->
                @include('sweet::alert')
            </div>

        </idea>

        <!-- Display Idea All Comments with the user it added -->
        <h4><i class="fa fa-comments"></i> Comments</h4>
        <hr>

        @foreach($comments->comments as $comment)

            <img src="{{ asset($comment->user->prof_pic) }}" width="60px" height="60px">
            <span style="color: #2e6da4">{{ $comment->user->name }}</span><span> {{ $comment->body }}</span>

            <br><br>
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
