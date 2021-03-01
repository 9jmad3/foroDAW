<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Establecemos la tabla asociada al modelo
   protected $table = 'comments';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
      'body',
   ];

   //Definimos la relación Many To One con la tabla 'users'
   public function user()
   {
      // Este método devuelve el objeto Usuario que ha hecho el comentario
      return $this->belongsTo(User::class, 'user_id');
   }

   //Definimos la relación Many To One con la tabla 'posts'
   public function post()
   {
      // Este método devuelve el objeto Post en el que está el comentario
      return $this->belongsTo(Post::class, 'post_id');
   }
}
