<!-- include summernote css/js-->


@extends('masterpage')

@section('content')
<div class="container">
    <h2>Enter Your Idea</h2>
    <image src="{{ asset(Auth::user()->prof_pic) }}" width="60px" height="60px"></image></i><span>   </span><b>Chanaru Sampath</b>
    <hr>
    <!-- Idea creating form -->
    {!! Form::open(['url'=>'ideas']) !!}
        @include('idea._form', ['submitButtonName'=>'Add an Idea'])
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