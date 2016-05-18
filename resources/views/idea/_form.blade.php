<!-- Idea title input -->
<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class'=>'form-control'] )!!}
</div>

<div class="form-group">
    {!! Form::label('category', 'Category') !!}
    {!!  Form::select('category', ['General' => 'General',
                                    'Academic' => 'Academic',
                                   'Administration' => 'Administration',
                                   'Sport' => 'Sport'],null,
                              ['class'=>'form-control']
)   !!}
</div>

<!-- Idea body input -->
<div class="form-group">
    {!! Form::label('body', 'Body') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control'] )!!}
</div>


<!-- Idea files input -->
<div class="form-group">
    {!! Form::label('file', 'Files') !!}
    {!! Form::file('file', null, ['class'=>'form-control'] )!!}
</div>

<!-- Idea video input -->
<div class="form-group">
    {!! Form::label('video', 'Videos') !!}
    {!! Form::file('video', null, ['class'=>'form-control'] )!!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonName, ['class'=>'btn btn-primary']) !!}
</div>



