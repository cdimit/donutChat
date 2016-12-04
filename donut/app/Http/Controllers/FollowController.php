<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class FollowController extends Controller
{
    public function sendFollow($id)
    {
      $rec = User::find($id);

        Auth::user()->follow($rec);
        $rec->acceptFollowRequestFrom(Auth::user());

        return redirect()->back();
    }

    public function unfollow($id)
    {
        $rec = User::find($id);

        Auth::user()->unfollow($rec);

        return redirect()->back();

    }

    public function welcome()
    {
      if(Auth::check()){
        return redirect('/home');

      }else {
        return view('welcome');

      }

    }
}
