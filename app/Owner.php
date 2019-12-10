<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    /**
     * An Owner can have many Pages.
     */
    public function pages()
    {
      return $this->hasMany('App\Page');
    }
}
