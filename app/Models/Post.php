<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Establecemos la tabla asociada al modelo para mayor seguridad.
   protected $table = 'posts';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
      'title',
      'body',
      'category_id',
  ];

   //Definimos la relación Many To One con la tabla 'users'
   public function user()
   {
      // Este método devuelve el objeto Usuario que ha creado el post
      // El segundo parámetro sirve para indicar el nombre del campo clave ajena que hace referencia 
      // a la tabla users en la tabla posts. Por defecto Eloquent considera que es user_id (nombretabla_id)
      // por lo que no sería necesario especificar este segundo parámetro
      return $this->belongsTo(User::class, 'user_id');
   }

   /**
   * Definimos la relación inversa con la tabla 'categories'
   */
   public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Definimos la relación One To Many con la tabla 'comment'
   public function comments()
   {
      // Este método devuelve el array de objetos con los comentarios asociadas a un usuario 
      return $this->hasMany(Comment::class);
   }

}
