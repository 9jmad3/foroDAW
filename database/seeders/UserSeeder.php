<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jose Manuel',
            'role' => 1,
            'surname' => 'Alejadro Dominguez',
            'nick' => 'jaledom',
            'image' => 'jose.png',
            'email' => 'josuelva@gmail.com',
            'password' => Hash::make('aaaaaaaa'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('users')->insert([
            'name' => 'Cristina',
            'role' => 1,
            'surname' => 'Diaz',
            'nick' => 'cridm',
            'image' => 'cristina.png',
            'email' => 'cridiazm@gmail.com',
            'password' => Hash::make('aaaaaaaa'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('users')->insert([
            'name' => 'Elvira',
            'role' => 1,
            'nick' => 'virucha',
            'surname' => 'Dominguez',
            'image' => 'elvira.png',
            'email' => 'virucha@gmail.com',
            'password' => Hash::make('aaaaaaaa'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('users')->insert([
            'name' => 'Alejandro',
            'role' => 1,
            'surname' => 'Romero',
            'nick' => 'malagüiita',
            'image' => 'alejandro.png',
            'email' => 'alejandromalaguita@gmail.com',
            'password' => Hash::make('aaaaaaaa'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('users')->insert([
            'name' => 'Irene',
            'role' => 1,
            'surname' => 'Marquez',
            'nick' => 'Shiro',
            'image' => 'irene.png',
            'email' => 'shiro@gmail.com',
            'password' => Hash::make('aaaaaaaa'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('users')->insert([
            'name' => 'Lucia',
            'role' => 1,
            'surname' => 'Perez',
            'nick' => 'Luper',
            'image' => 'lucia.png',
            'email' => 'LuciaPerez@gmail.com',
            'password' => Hash::make('aaaaaaaa'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('users')->insert([
            'name' => 'Cristina',
            'role' => 1,
            'surname' => 'Romero',
            'nick' => 'crirom',
            'image' => 'crirom.png',
            'email' => 'crirom@gmail.com',
            'password' => Hash::make('aaaaaaaa'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('users')->insert([
            'name' => 'Sergio',
            'role' => 1,
            'surname' => 'Gomez',
            'nick' => 'Sergito',
            'image' => 'sergio.png',
            'email' => 'sergito@gmail.com',
            'password' => Hash::make('aaaaaaaa'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('users')->insert([
            'name' => 'Laura',
            'role' => 1,
            'surname' => 'Garcia',
            'nick' => 'Laumeri',
            'image' => 'laura.png',
            'email' => 'lauramerida@gmail.com',
            'password' => Hash::make('aaaaaaaa'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('users')->insert([
            'name' => 'Juanfran',
            'role' => 1,
            'surname' => 'Santos',
            'nick' => 'AFN',
            'image' => 'juanfran.png',
            'email' => 'afn@gmail.com',
            'password' => Hash::make('aaaaaaaa'),
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
         ]);
    }
}
