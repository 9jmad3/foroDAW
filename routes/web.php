<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Coin;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route("login");
});

Route::get('/dashboard', function () {


        /**
 * Requires curl enabled in php.ini
 **/

    // $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
    // $parameters = [
    // 'start' => '1',
    // 'limit' => '15',
    // 'convert' => 'USD'
    // ];

    // $headers = [
    // 'Accepts: application/json',
    // 'X-CMC_PRO_API_KEY: f41dc760-0d63-4ec6-a026-e3b05dd3c42a'
    // ];
    // $qs = http_build_query($parameters); // query string encode the parameters
    // $request = "{$url}?{$qs}"; // create the request URL


    // $curl = curl_init(); // Get cURL resource
    // // Set cURL options
    // curl_setopt_array($curl, array(
    // CURLOPT_URL => $request,            // set the request URL
    // CURLOPT_HTTPHEADER => $headers,     // set the headers 
    // CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
    // ));

    // $response = curl_exec($curl); // Send the request, save the response
    // $data = json_decode($response,true); // print json decoded response
    // $data = $data['data'];
    // curl_close($curl); // Close request

    // for ($i=0; $i < count($data); $i++) { 
    //     $coin = Coin::updateOrCreate(
    //         ['symbol' => $data[$i]["symbol"],],
    //         [
    //             'name' => $data[$i]["name"],
    //             'price' => $data[$i]["quote"]["USD"]["price"],
    //         ]
    //     );
    // }

    $coins = Coin::get();

    // Recuperamos los posts.
    $posts = Post::orderBy('updated_at','desc')->paginate(10);
    
    return view('dashboard', compact('posts','coins'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/user/configuracion', [UserController::class,'edit'])->middleware(['auth'])->name('user.edit');
Route::get('/user/mispost', [UserController::class,'startedPost'])->middleware(['auth'])->name('user.startedpost');
Route::get('/user/postcomentados', [UserController::class,'commentPost'])->middleware(['auth'])->name('user.commentpost');
Route::get('/posts/cryptomonedas', [PostController::class,'indexCriptomonedas'])->middleware(['auth'])->name('cryptomonedas.index');
Route::get('/posts/bolsa', [PostController::class,'indexBolsa'])->middleware(['auth'])->name('bolsa.index');
Route::get('/posts/banca', [PostController::class,'indexBanca'])->middleware(['auth'])->name('banca.index');
Route::get('/posts/actualidad', [PostController::class,'indexActualidad'])->middleware(['auth'])->name('actualidad.index');
Route::get('/posts/inversion', [PostController::class,'indexInversion'])->middleware(['auth'])->name('inversion.index');
Route::get('/posts/index/{id}/{status?}', [PostController::class,'index'])->middleware(['auth'])->name('post.index');
Route::get('/posts/create', [PostController::class,'create'])->middleware(['auth'])->name('post.create');
Route::get('/posts/edit/{post}', [PostController::class,'edit'])->middleware(['auth'])->name('post.edit');
Route::get('user/avatar/{filename}', [UserController::class,'getImage'])->middleware(['auth'])->name('user.avatar');
Route::get('/user/destroy', [UserController::class,'destroy'])->middleware(['auth'])->name('user.destroy');

Route::post('/user/update', [UserController::class,'update'])->middleware(['auth'])->name('user.update');
Route::post('/posts/update/{post}', [PostController::class,'update'])->middleware(['auth'])->name('post.update');
Route::post('/posts/store', [PostController::class,'store'])->middleware(['auth'])->name('post.store');
Route::post('/comment', [CommentController::class,'store'])->middleware(['auth'])->name('comment.store');
Route::post('/comment/delete', [CommentController::class,'delete'])->middleware(['auth'])->name('comment.delete');
Route::post('/post/delete', [PostController::class,'delete'])->middleware(['auth'])->name('post.delete');
Route::get('/post/customIndex', [PostController::class,'customIndex'])->middleware(['auth'])->name('post.customindex');
