<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participans extends Model
{

    protected $table= "participants";

  protected $fillable = [
      'chat_id', 'user_id',
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
