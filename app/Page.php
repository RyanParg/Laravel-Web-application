<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

  /**
  * Each Page has only one owner.
   */
  public function owner(){
    return $this->belongsTo('App\Owner');
  }

  public function getRouteKeyName()
  {
    return 'title';
  }
}
