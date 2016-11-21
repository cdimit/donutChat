<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
protected $table= "chat";

  protected $fillable = [
      'name',
  ];

  public function msg()
  {
    return $this->hasMany('App\Messages');
  }

  public function part()
  {
    return $this->hasMany('App\Participans');
  }
}
