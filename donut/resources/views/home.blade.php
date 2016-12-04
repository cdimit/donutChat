@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                  <h1><u>My Chats</u></h1>
                  @foreach($chats as $c)
                    <h3><a href="/chat/{{$c->chat_id}}" alt="{{$c->chat->name}}">
                      @if($c->chat->name == 'Just You')
                        Just You
                      @else
                        @foreach($c->chat->part as $p)
                          @if($p->user->id!=Auth::user()->id)
                            ({{$p->user->name}})
                          @endif
                        @endforeach
                      @endif
                    </a></h3>
                    <hr>
                  @endforeach

                  <h1><u>Our Reuse</u></h1>
                    <a href="https://laravel.com/">Laravel Framework</a><br>
                    <a href="http://getbootstrap.com/">Bootstrap</a><br>
                    <a href="https://github.com/howCodeORG/Messenger">Messenger GitHub,</a>
                    <a href="http://www.youtube.com/howCode">Messenger Tutorial</a><br>
                    <a href="http://carbon.nesbot.com/">Carbon: A simple PHP API extension for DateTime.</a><br>
                    <a href="https://erikbelusic.com/tracking-if-a-user-is-online-in-laravel/">Tracking If a User Is Currently Online (Tutorial)</a><br>
                    <a href="http://emojione.com/">EmojiOne</a><br>
                    <a href="http://fontawesome.io/">Font Awesome</a></br>
                    <a href="https://github.com/skybluesofa/laravel-followers">Laravel Followers</a><br>

                  <h1><u>Future Reuse</u></h1>
                    <a href="https://github.com/laravel/socialite">Laravel Socialite</a><br>
                    <a href="https://github.com/Bogardo/Mailgun">Mailgun API</a><br>
                    <a href="https://github.com/OneSignal/emoji-picker">Emoji Picker</a><br>
                    <a href="https://github.com/thedevdojo/laravel-user-image">Laravel User Image</a><br>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
          <div class="panel-heading">Users</div>
          <div class="panel-body">
           <h1><u>Users</u></h1>
           <p>Online</p>
            @foreach($users as $user)
              @if($user->id!=Auth::user()->id)
                @if($user->isOnline())
                @if(!Auth::user()->isFollowing($user))
                  <h3><span class="label label-success">{{$user->name}}</span>
                    <a href="/create_chat/{{$user->id}}" class="btn btn-primary"><i class="fa fa-comment" aria-hidden="true"></i></a>
                    <a onclick="group({{$user->id}}, '{{$user->name}}');" id="plus{{$user->id}}" class="btn btn-primary"><i style="color:yellow" class="fa fa-comments" aria-hidden="true"></i></a>
                  <a href="/send_follow/{{$user->id}}" class="btn btn-primary"><i class="fa fa-heart" style="color:red" aria-hidden="true"></i></a>
                </h3>
                  @else
                  <h3><span class="label label-success">{{$user->name}} <i class="fa fa-heart" style="color:red" aria-hidden="true"></i></span>
                    <a href="/create_chat/{{$user->id}}" class="btn btn-primary"><i class="fa fa-comment" aria-hidden="true"></i></a>
                    <a onclick="group({{$user->id}}, '{{$user->name}}');" id="plus{{$user->id}}" class="btn btn-primary"><i style="color:yellow" class="fa fa-comments" aria-hidden="true"></i></a>
                  <a href="/unfollow/{{$user->id}}" class="btn btn-primary"><i class="fa fa-times" style="color:red" aria-hidden="true"></i></a>
                  </h3>
                  @endif
                @endif
              @endif
            @endforeach
            <p>Offline</p>
            @foreach($users as $user)
                @if(!$user->isOnline())
                  @if(!Auth::user()->isFollowing($user))
                  <h3><span class="label label-danger">{{$user->name}}</span>
                    <a href="/create_chat/{{$user->id}}" class="btn btn-primary"><i class="fa fa-comment" aria-hidden="true"></i></a>
                    <a onclick="group({{$user->id}}, '{{$user->name}}');" id="plus{{$user->id}}" class="btn btn-primary"><i style="color:yellow" class="fa fa-comments" aria-hidden="true"></i></a>
                  <a href="/send_follow/{{$user->id}}" class="btn btn-primary"><i class="fa fa-heart" style="color:red" aria-hidden="true"></i></a>
                  <h3
                  @else
                  <h3><span class="label label-danger">{{$user->name}} <i class="fa fa-heart" style="color:red" aria-hidden="true"></i></span>
                    <a href="/create_chat/{{$user->id}}" class="btn btn-primary"><i class="fa fa-comment" aria-hidden="true"></i></a>
                    <a onclick="group({{$user->id}}, '{{$user->name}}');" id="plus{{$user->id}}" class="btn btn-primary"><i style="color:yellow" class="fa fa-comments" aria-hidden="true"></i></a>
                  <a href="/unfollow/{{$user->id}}" class="btn btn-primary"><i class="fa fa-times" style="color:red" aria-hidden="true"></i></a>
                  </h3>
                  @endif
                @endif
            @endforeach
            <br>
            <a href="/create_group?users=" class="btn btn-warning" id="cgb" style="visibility:hidden">Create New Chat</a>
            <a href="/home" class="btn btn-danger" id="clear" style="visibility:hidden">Clear</a>

            <p id="atoma"></p>
          </div>


        </div>
      </div>
    </div>
</div>

<script>
function group(id, name){
  document.getElementById("plus"+id).style.visibility='hidden';
  document.getElementById("cgb").style.visibility='visible';
  document.getElementById("clear").style.visibility='visible';


  document.getElementById("atoma").innerHTML += '<strong>'+name+"</strong> ,";

  btn = document.getElementById("cgb");
  btn.href += id + '_';
}
</script>
@endsection
