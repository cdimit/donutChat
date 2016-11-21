@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <h1><u>My Chats</u></h1>
                  @foreach($chats as $c)
                    <h3><a href="/chat/{{$c->chat_id}}">{{$c->chat->name}}</a></h3>
                  @endforeach
                  <br>
                 <h1><u>Users</u></h1>
                  @foreach($users as $user)
                  @if($user->isOnline())
                  <a href="/create_chat/{{$user->id}}" class="btn btn-success">{{$user->name}}</a>
                  @else
                  <a href="/create_chat/{{$user->id}}" class="btn btn-danger">{{$user->name}}</a>
                  @endif
                  @endforeach
                  <br>
                  <h1><u>Our Reuse</u></h1>
                    Laravel Framework<br>
                    Bootstrap<br>
                    https://github.com/howCodeORG/Messenger<br>
                    http://www.youtube.com/howCode<br>
                    A simple PHP API extension for DateTime. <a href="http://carbon.nesbot.com/">Carbon</a><br>
                    <a href="https://erikbelusic.com/tracking-if-a-user-is-online-in-laravel/">Tracking If a User Is Currently Online (Tutorial)</a><br>
                    <a href="http://emojione.com/">EmojiOne</a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
