<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Establecemos la tabla asociada al modelo para mayor seguridad
   protected $table = 'categories';

   //Definimos la relación One To Many con la tabla 'posts'
   public function posts()
   {
      // Este método devuelve el array de objetos con los posts asociados a un usuario 
      return $this->hasMany(Post::class);
   }
}
