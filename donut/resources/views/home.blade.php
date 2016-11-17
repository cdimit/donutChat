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
                    <h3><a href="/chat/{{$c->chat_id}}">{{$c->chat->name}}</a></h3><br>
                  @endforeach
                  <br>
                  @foreach($users as $user)
                  <a href="/create_chat" class="btn btn-success">{{$user->name}}</a>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
