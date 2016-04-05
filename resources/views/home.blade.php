@extends('masterpage')


<div class="row">
    <div class="col-md-12">
        <img src="{{ asset('images/1.jpg') }}">
    </div>
</div>

<nav class="navbar navbar-collapse">

</nav>

<h1 align="center">Welcome to Curtin University </h1>
<h3 align="center">Idea Manegement System </h3>


@section('content')


    <div class="row">
        <div class="col-md-4">
            <a href="#Administration"><h3 align="center">Administration</h3></a>
        </div>
        <div class="col-md-4">
            <a href="#General"><h3 align="center">General</h3></a>
        </div>
        <div class="col-md-4">
            <a href="#Sport"><h3 align="center">Sport</h3></a>
        </div>
    </div>
    <br><br>

    <div class="row">
        <div class="col-md-6">
            dbxfngfnfnhf
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/2.jpg') }}">
        </div>
    </div>
    <br><br><br>

        @foreach($ideas as $idea)
        <section id="{{$idea->category}}">

            <idea>

                <div class="well">
                  <div class="row">
                    <div class="col-md-4">
                      <img src="{{ asset('images/user1.jpg') }}" class="img-circle"><br>{{ $idea->user->name }}
                    </div>
                    <div class="col-md-8">
                      <h3>
                          Title :
                          <a href="{{action('IdeaController@show', [$idea->id])}}">{{$idea->title}}</a>
                      </h3>
                      <h4>
                          Category :
                          <a href="#">{{$idea->category}}</a>
                      </h4>

                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-empty"></i>
                      <b> ratings :</b>
                    </div>
                  </div>

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
            </section>
        @endforeach

@endsection
