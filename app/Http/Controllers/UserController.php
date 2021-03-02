<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Models\Comment;


// use App\Http\Controllers\Atuth;

class UserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('perfil');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
      
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:100|unique:users,nick,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'required|string|confirmed|min:1',
        ]);

        
        //Subir la imagen
        $image= $request->file('image');
        // Si recibimos un objeto imagen tendremos que utilizar el disco para almacenarla
        // Para ello utilizaremos un objeto storage de Laravel
        if($image){
            // Generamos un nombre único para la imagen basado en time() y el nombre original de la imagen
            $image_name =  time() . $image->getClientOriginalName();
            // Seleccionamos el disco virtual users, extraemos el fichero de la carpeta temporal
            // donde se almacenó y guardamos la imagen recibida con el nombre generado
            Storage::disk('users')->put($image_name, File::get($image));
            $user->image = $image_name;   
        }   
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->nick = $request->nick;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('user.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = Auth::user();
        
        $user->delete();

        return redirect()->route("dashboard");
    }

    /**
    * Devolvemos los posts creados por el usuario.
    * @return array de objetos post
    */
    public function startedPost(){
        $user_id = Auth::user()->id;
        $posts = Post::where('user_id', '=', $user_id)->paginate(10);
            
        return view('dashboard', compact('posts'));
    }

    
    /**
    * Devolvemos los posts comentados por el usuario.
    * @return array de objetos post
    */
    public function commentPost(){
        $user = Auth::user();
        $posts = $user->commentsPosts()->distinct()->paginate(10);
   
        return view('dashboard', compact('posts'));
    }

    /**
    * Devuelve la imagen avatar del usuario
    *
    * @param [type] $filename
    * @return void
    */
     public function getImage($filename){     
        $file = Storage::disk('users')->get($filename);

        return new Response($file, 200);
    }
}
