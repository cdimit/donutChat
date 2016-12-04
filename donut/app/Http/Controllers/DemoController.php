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
  $name = $m->user->name;
  $time = $m->user->created_at;
    if($m->user_id==$user_id){
      echo "<div class=\"msgc\" style=\"margin-bottom: 30px;\"> <div class=\"msg msgfrom\">$m->message</div> <div class=\"msgarr msgarrfrom\"></div> <div class=\"msgsentby msgsentbyfrom\">Sent by $name $time</div> </div>";
    }else{
      echo "<div class=\"msgc\"> <div class=\"msg\"> $m->message </div> <div class=\"msgarr\"></div> <div class=\"msgsentby\">Sent by $name $time</div> </div>";
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

  public function createGroup()
  {
    $users = $_GET["users"];
    $user = explode("_",$users);
    $auth = Auth::user();
    $time = Carbon::now();

    $chat = Chat::create([
      'name' => $time,
    ]);

    Participans::create([
      'user_id' => $auth->id,
      'chat_id' => $chat->id,
    ]);

    foreach($user as $u){
      if ($u==''){
        }else{
          Participans::create([
            'user_id' => $u,
            'chat_id' => $chat->id,
          ]);
      }
    }

    return redirect('/chat/'.$chat->id);


  }

  public function createChat($user_id)
  {
    $user = User::find($user_id);
    $time = Carbon::now();
    $auth = Auth::user();
    $part1 = $user->part()->get();
    $part2 = $auth->part()->get();
    if($user==$auth){
      foreach($part1 as $p){
        if($p->chat->part->count()==1){
          return redirect('/chat/'.$p->chat->id);
        }
      }
      $chat = Chat::create([
        'name' => "Just You",
      ]);

      Participans::create([
        'user_id' => $user_id,
        'chat_id' => $chat->id,
      ]);

      return redirect('/chat/'.$chat->id);

    }

    foreach($part1 as $p1){
      foreach($part2 as $p2){
          if($p1->chat->id == $p2->chat->id){
            return redirect('/chat/'.$p1->chat->id);
          }
      }
    }

    $chat = Chat::create([
      'name' => $time,
    ]);

    Participans::create([
      'user_id' => $user_id,
      'chat_id' => $chat->id,
    ]);

    Participans::create([
      'user_id' => $auth->id,
      'chat_id' => $chat->id,
    ]);

    return redirect('/chat/'.$chat->id);

  }
}
