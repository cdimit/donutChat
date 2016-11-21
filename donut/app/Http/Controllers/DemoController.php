<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Chat;
use App\Messages;
use App\Participans;
use Carbon\Carbon;

class DemoController extends Controller
{
  public function getmessage($chat)
  {
    $c = Chat::find($chat);
    $user = Auth::user();
    $user_id = $user->id;

foreach ($c->msg as $m) {
    if($m->user_id==$user_id){
      $name = $m->user->name;
      echo "<div class=\"msgc\" style=\"margin-bottom: 30px;\"> <div class=\"msg msgfrom\">$m->message</div> <div class=\"msgarr msgarrfrom\"></div> <div class=\"msgsentby msgsentbyfrom\">Sent by $name </div> </div>";
    }else{
      $name = $m->user->name;
      echo "<div class=\"msgc\"> <div class=\"msg\"> $m->message </div> <div class=\"msgarr\"></div> <div class=\"msgsentby\">Sent by $name</div> </div>";
    }
}

  }

  public function sentmessage($chat)
  {
    $c = Chat::find($chat);
    $user = Auth::user();
    $user_id = $user->id;
    $msg = $_GET["msg"];

    Messages::create([
        'chat_id' => $chat,
        'user_id' => $user_id,
        'message' => $msg,
    ]);

    echo "<div class=\"msgc\" style=\"margin-bottom: 30px;\"> <div class=\"msg msgfrom\">$msg</div> <div class=\"msgarr msgarrfrom\"></div> <div class=\"msgsentby msgsentbyfrom\">Sent by $user->name </div> </div>";

  }

  public function chat($chat)
  {
    $chat = Chat::find($chat);

    return view('chat')->with('chat', $chat);
  }

  public function createChat($user_id)
  {
    $user = User::find($user_id);
    $time = Carbon::now();
    $chat = Chat::create([
      'name' => $time,
    ]);

    Participans::create([
      'user_id' => $user_id,
      'chat_id' => $chat->id,
    ]);

    Participans::create([
      'user_id' => Auth::user()->id,
      'chat_id' => $chat->id,
    ]);

    return redirect('/chat/'.$chat->id);

  }
}
