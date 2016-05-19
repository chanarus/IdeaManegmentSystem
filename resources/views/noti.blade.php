@extends('masterpage')

@section('noti')

@if($notification != NULL)

<!-- Notifications-->
<li class="dropdown">
    <a href="{{action('NotificationController@update')}}" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>

    <ul class="dropdown-menu alert-dropdown">
        @foreach($notification as $n)
        <li>
            <a href="#">{{$n->id}}<span class="label label-default">{{$n->status}}</span></a>
        </li>
        <li class="divider"></li>

        @endforeach
        <li>
            <a href="#">View All</a>
        </li>
    </ul>

</li>

@endif

    @stop