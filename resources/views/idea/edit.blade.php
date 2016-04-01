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

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif


    </div>

@stop