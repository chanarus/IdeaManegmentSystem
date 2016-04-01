@extends('masterpage')

@section('content')

    <form method="post" action="{{ url('/search/') }}">
        {{ csrf_field() }}
        <div class="search-label uppercase">Search By</div>
        <div class="input-icon right">
            <i class="icon-magnifier"></i>
            <input type="text" class="form-control" placeholder="Search by title" name='keyword' onclick="this.value=''" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="search-label uppercase">Sort By</div>
                <select class="form-control " name="sort" >
                    <option>Date</option>
                    <option>Rating</option>
                </select>
            </div>
            <div class="col-md-4">
                <div class="search-label uppercase">Category</div>
                <select class="form-control " name="cat" >
                    <option>General</option>
                    <option>Administration</option>
                    <option>Sport</option>
                </select>
            </div>
        </div>
        <br>
        <button class="btn btn-primary" >Search</button>
    </form>


@stop