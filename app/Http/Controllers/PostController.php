<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $post = Post::find($id);

        return view('indexpost', compact('post'));
    }

    /**
     * Busqueda de post personalizada
     * Si el campo categoría es igual a 0 es porque quiere todos los posts independientemente de la categoria.
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
     public function customIndex(Request $request)
     {
        $buscar = $request->get('buscarportitulo');
        $categoria = $request->get('categoria');

        if ($categoria === "0") {
            $posts = Post::where('title','like',"%$buscar%")->paginate(10);
        } else {   
            $posts = Post::where('title','like',"%$buscar%")
                        ->where('category_id','=',$categoria)
                        ->paginate(10);
        }
        
        return view('dashboard', compact('posts'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        //Validación
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'category_id' => 'required|integer'
        ]);

        $title = $request->title;
        $body = $request->body;
        $category_id = $request->category_id;
        
        //Sacamos el id del usuario a través del usuario autenticado.
        $user_id = Auth::user()->id;

        $post = new Post();

        $post->body = $body;
        $post->title = $title;
        $post->user_id = $user_id;
        $post->category_id = $category_id; 

        $post->save();
        $post = $post->id;        

        return redirect()->route("post.index",["id"=>$post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // $post = Post::find($post);
        return view('editpost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        //Validación
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'category_id' => 'required|integer'
        ]);

        //Sacamos el id del usuario a través del usuario autenticado.
        $user_id = Auth::user()->id;

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route("post.index",["id"=>$post->id]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }


    /**
     * Elimina el post junto con los comentarios asociados a este.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function delete(Request $request)
    {
        $post_id = $request->input('post_id');
        $post = Post::find($post_id);
        $status = "Post borrado con éxito.";

        $comments = $post->comments;

        foreach ($comments as $comment) {
            $comment->delete();
        }

        $post->delete();

        // Recuperamos los posts.
        $posts = Post::orderBy('updated_at','desc')->paginate(10);
  
        return view('dashboard', compact('posts','status'));
        // return redirect()->route("dashboard")->with(['status'=>'Post borrado con éxito.']);;
    }

    /**
     * Devuelve todos los post con categoria criptomonedas (1)
     * @return Array con objetos post.
     */
    public function indexCriptomonedas(){
        $posts = Post::where('category_id', '=', '1')->paginate(10);

        return view('dashboard', compact('posts'));
        // echo $posts;
    }

    /**
     * Devuelve todos los post con categoria bolsa (2)
     * @return Array con objetos post.
     */
     public function indexBolsa(){
        $posts = Post::where('category_id', '=', '2')->paginate(10);
        
        
        return view('dashboard', compact('posts'));
        // echo $posts;
    }

    /**
     * Devuelve todos los post con categoria banca (3)
     * @return Array con objetos post.
     */
     public function indexBanca(){
        $posts = Post::where('category_id', '=', '3')->paginate(10);
        
        
        return view('dashboard', compact('posts'));
        // echo $posts;
    }

    /**
     * Devuelve todos los post con categoria actualidad (4)
     * @return Array con objetos post.
     */
     public function indexActualidad(){
        $posts = Post::where('category_id', '=', '4')->paginate(10);
        
        
        return view('dashboard', compact('posts'));
        // echo $posts;
    }

    /**
     * Devuelve todos los post con categoria inversion (5)
     * @return Array con objetos post.
     */
     public function indexInversion(){
        $posts = Post::where('category_id', '=', '5')->paginate(10);
        
        
        return view('dashboard', compact('posts'));
        // echo $posts;
    }

    
}
