@extends('masterpage')

@section('content')

    <h2>Your Comments</h2>

    <div class="container">

            <table class="table table-hover">
                <thead align="center">
                    <tr>
                        <th width="100px">Comment ID</th>
                        <th>Comment</th>
                        <th width="80px">Idea ID</th>
                        <th width="200px">Created At</th>
                        <th width="200px">Updated At</th>
                        <th width="100px">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td>{{$comment->body}}</td>
                            <td>{{$comment->idea_id}}</td>
                            <td>{{$comment->created_at}}</td>
                            <td>{{$comment->updated_at}}</td>
                            <td>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#commentEditForm{{$comment->id}}"><i class="fa fa-edit" ></i></a>

                                {!! Form::open(['method' => 'DELETE',
                                                'url' => ['comment', $comment->id] ]) !!}
                                {!! Form::submit('', ['class' => 'btn btn-danger','fa-trash']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>

                        {!! Form::model($comment, ['method'=>'PATCH', 'action' =>['CommentControler@update', $comment->id]]) !!}
                            <div class="modal fade" id="commentEditForm{{$comment->id}}">
                                <div class="modal-backdrop">
                                    <div class="modal-content">
                                        <div class="container">
                                            <!-- Header -->
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h3>Edit Your Comment</h3>
                                            </div>

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    {!! Form::label('body', 'Comment') !!}
                                                    {!! Form::text('body', null, ['class'=>'form-control', 'placeholder'=>'Comment'] )!!}
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <div class="form-group">
                                                    {!! Form::submit('Edit', ['class'=>'btn btn-primary']) !!}
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    @endforeach
                </tbody>
            </table>

        <script src="js/sweetalert.min.js"></script>

        <!-- Include this after the sweet alert js file -->
        @include('sweet::alert')
    </div>

@endsection