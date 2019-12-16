<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\User;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

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
        'owner_id' => 'required|integer',
      ]);

      $b = new Page;
      $b->title = $validatedData['title'];
      $b->owner_id = $validatedData['owner_id'];
      $b->save();

      session()->flash('message', 'Page was created.');
      return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $pages = $user->pages;

        return view('blogs.show', ['user' => $user, 'pages' => $pages]);
    }

    public function showUserPosts(User $user, Page $page)
    {

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
      $pages = $user->pages;
      return view('blogs.edit', ['user' => $user, 'pages' => $pages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Page::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogs.index')->with('message', 'Blog was deleted.');
    }
}
