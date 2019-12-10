<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
  /**
   * A Page has many Posts
   */
  public function posts(){
    return $this->hasMany('App\Post');
  }
  /**
  * Each Page has only one owner.
   */
  public function owner(){
    return $this->belongsTo('App\Owner');
  }
}
