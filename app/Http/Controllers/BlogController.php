<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\User;
use App\PageView;
use Auth;
use Storage;
use File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);


        return view('blogs.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = User::orderBy('name', 'asc')->get();
        return view('blogs.create', ['owners' => $owners]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required|max:1000',
        'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);

      $imageName = time().'.'.request()->image->getClientOriginalExtension();
      request()->image->move(storage_path('app/public'), $imageName);

      $b = new Page;
      $b->title = $validatedData['title'];
      $b->content = $validatedData['content'];
      $b->user_id = Auth::user()->id;
      $b->image = $imageName;
      $b->save();
      $user = Auth::user();
      $pages = $user->pages;
      session()->flash('message', 'Page was created.');
      return redirect()->route('blogs.edit', ['user' => $user, 'pages' => $pages]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $pages = Page::where('user_id',$user->id)->paginate(15);

        return view('blogs.show', ['user' => $user, 'pages' => $pages]);
    }

    public function showUserPosts(User $user, Page $page)
    {
      PageView::logView($page);
      return view('blogs.show_user_posts',['page' =>$page]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      $numViews = PageView::get();

      if($user->isAdmin()){
        $pages = Page::paginate(15);
      }else{
        $pages = Page::where('user_id',$user->id)->paginate(15);
    }

      return view('blogs.edit', ['user' => $user, 'pages' => $pages, 'numViews' => $numViews]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Page $page)
    {
      return view('blogs.update', ['page' => $page]);
    }

    public function storeUpdate(Request $request,User $user, Page $page)
    {
      $validatedData = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required|max:1000',
      ]);

      $b = Page::find($page->id);
      $b->title = $validatedData['title'];
      $b->content = $validatedData['content'];
      $b->user_id = Auth::user()->id;
      $b->save();
      $user = Auth::user();
      $pages = $user->pages;
      session()->flash('message', 'Page was updated.');
      return redirect()->route('blogs.edit', ['user' => $user, 'pages' => $pages]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Page $page)
    {

        $image_path = "storage/$page->image";
        if(File::exists($image_path)) {
        File::delete($image_path);
        }
        $page->delete();
        $user = $page->user;
        $pages =$user->pages;

        return redirect()->route('blogs.edit', ['user' => $user, 'pages' => $pages])->with('message', 'Blog was deleted.');
    }
}
