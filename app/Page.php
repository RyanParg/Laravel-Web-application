<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

  /**
  * Each Page has only one owner.
   */
  public function user(){
    return $this->belongsTo('App\User');
  }

  public function getRouteKeyName()
  {
    return 'title';
  }
}
