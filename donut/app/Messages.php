<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
  protected $table= "messages";


  protected $fillable = [
      'chat_id', 'user_id', 'message',
  ];

  public function user()
{
    return $this->belongsTo('App\User', 'user_id');
}

public function chat()
{
    return $this->belongsTo('App\Chat', 'chat_id');
}
}
