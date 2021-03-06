<?php

namespace App\Http\Controllers;

use App\comment;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments = comment::all();
        //TODO: create views
        return;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO: create views
        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = auth()->user()->id;
        // $urlId = $request->route('id');
        $newComment = Comment::create([
            'comment' => $request->commentName,
            'userId' => $id,
            'ticketId' => $request->ticketId,
        ]); 
        $newComment->save();
        //TODO: returns views
        return back()->with('success', 'Comment succesfully added!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        //TODO: views
        return view('', $comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //TODO: create view
        $comment = User::find($comment->id);
        return view('', $comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        //
        $newComment = comment::find($request->commentid);
        $newComment->comment = $request->comment;

        $newComment->save();
        //TODO: views
        return back()->with('success', 'Comment succesfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comments, Request $request )
    {
        //
        $comment = comment::find($request->id);
        $comment->delete();
        //TODO: redirect
        return back()->with('success', 'Comment succesfully deleted!');
    }
}
