@extends('masterpage')

@section('content')


   <!--<form method="post" action="{{url('/search') }}">
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



    <div class="container">
        <div id="result">

        </div>
        <a class="btn btn-primary" id="buttonA">button</a>
    </div>

<footer>
    <script src="bootstrap/js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#buttonA").click(function(){
                $.ajax({
                    url:"search",
                    type:"POST",
                    data:({"id":1}),
                    success: function(r){
                        $("#result").html(r);
                    }
                });
            });
        });
    </script>
</footer>-->
<div class="col-lg-4 col-lg-offset-4">
    <div class="form-group">
        <input type="text" id="search-input" class="form-control" placeholder="Search" onkeydown="down()" onkeyup="up('{{ csrf_token() }}');">
    </div>

</div>
   <div class="col-lg-12" id="search-result">

   </div>

<script src="{{ asset('bootstrap/js/jquery.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/search.js') }}"></script>
@stop