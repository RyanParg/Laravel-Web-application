<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * A post belongs to only one page.
     */
    public function page(){
      return $this->belongsTo('App\Page');
    }
}
