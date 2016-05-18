@extends('masterpage')

@section('content')
    <div class="container">
        <h2>Enter Your Idea</h2>
        <i class="fa fa-user fa-2x"></i><span>   </span><b>Chanaru Sampath</b>
        <hr>
        <!-- Idea Editing form -->
        {!! Form::model($idea, ['method'=>'PATCH', 'action' =>['IdeaController@update', $idea->id]]) !!}
            @include('idea._form', ['submitButtonName'=>'Edit the Idea'])
        {!! Form::close() !!}

        <form method="post" action="{{ url('/ideas/pic') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="id" value="{{ $idea->id }}"/>


            <div class="form-group">
                <label for="profile_pic">Choose an Image</label>
                <input id="idea_image1" name="idea_image1" type="file"/>
                <input id="idea_image2" name="idea_image2" type="file"/>
                <input id="idea_image3" name="idea_image3" type="file"/>
                <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i>Add Images</button>
            </div>
        </form>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif


    </div>

@stop