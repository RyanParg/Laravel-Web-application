<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Page;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function page(){

      return view('comments.index');
    }

    public function apiIndex($id){
      $page = Page::find($id);
      $comments = $page->comments;

      return $comments;
    }

    public function apiStore(Request $request, $id){
      $e = new Comment;
      $validatedData = $request->validate([
        'content' => 'required|max:100',
      ]);
      $e->user_id = $request['user_id'];
      $e->user_name = $request['user_name'];
      $e->page_id = $request['page_id'];
      $e->content = $validatedData['content'];
      $e->save();

      return $e;
    }


    public function apiEdit(Request $request){
      $validatedData = $request->validate([
        'content' => 'required|max:100',
      ]);
      $e = Comment::find($request['content_id']);
      $e->content = $validatedData['content'];
      $e->save();
      return $e;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
