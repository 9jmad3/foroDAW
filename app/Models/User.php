<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'role',
        'surname',
        'email',
        'nick',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Establecemos la tabla asociada al modelo para mayor seguridad.
    protected $table = 'users';

    //Definimos la relación One To Many con la tabla 'post'
   public function posts()
   {
      // Este método devuelve el array de objetos con los posts asociados a un usuario 
      return $this->hasMany(Post::class);
   }

   //Definimos la relación One To Many con la tabla 'comment'
   public function comments()
   {
      // Este método devuelve el array de objetos con los comentarios asociadas a un usuario 
      return $this->hasMany(Comment::class);
   }

   /**
   *
   */
   public function commentsPosts(){
     return $this->belongsToMany(Post::class, 'comments', 'user_id', 'post_id');
   }
}
