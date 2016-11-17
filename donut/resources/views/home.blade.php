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
                  <a href="/create_chat/{{$user->id}}" class="btn btn-success">{{$user->name}}</a>
                  @endforeach
                  <br>
                  <h1><u>Our Reuse</u></h1>
                    Laravel Framework<br>
                    https://github.com/howCodeORG/Messenger<br>
                    http://www.youtube.com/howCode<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
