<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Carbon;

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

        $post_id = $request->idPost;
        $body = $request->comment_body;
        
        //Sacamos el id del usuario a través del usuario autenticado.
        $user_id = Auth::user()->id;

        $comment = new Comment();

        $comment->body = $body;
        $comment->post_id = $post_id;
        $comment->user_id = $user_id; 

        $comment->save();


        //ACTUALIZAMOS EL CAMPO UPDATED_AT PARA QUE EL POST APAREZCA AL INICIO.

        $post = Post::find($post_id);
        $time = Carbon\Carbon::now();
        $mytime = $time->toDateTimeString();
        $post->updated_at = $mytime;
        $post->save();

        
        return redirect()->route("post.index",["id"=>$post_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
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
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        
    }

    /**
     * Elimina el comentario con ese id.
     *
     * @param  \Illuminate\Http\Request  $request
     */
     public function delete(Request $request)
     {
        $comment_id = $request->input('comment_id');
        $post_id = $request->input('post_id');
        $status = "Comentario borrado con éxito.";
        $comment = Comment::find($comment_id);

        $comment->delete();
  
        $post = Post::find($post_id);

        return view('indexpost', compact('post','status'));
     }
}
