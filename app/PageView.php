<?php

namespace App;
use App\Page;
use Auth;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    public static function logView(Page $page){
      $view = new PageView();
      $view->page_id = $page->id;
      $view->user_id = Auth::user()->id;
      $view->save();
    }
}
