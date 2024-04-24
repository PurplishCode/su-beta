<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\KomentarFotoController;
use App\Http\Controllers\LikeFotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Models\Album;
use Faker\Guesser\Name;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   
    return view('welcome');
});
Route::get('/home', [SessionController::class, 'home'])->name('home.view');

Route::middleware(['auth'])->group(function(){
    Route::get('logout', [SessionController::class, 'logout'])->name('logout');

Route::resource('/album-foto', AlbumController::class);
Route::resource('/gallery-foto', FotoController::class);
Route::get('/komentar-foto/{komentar_foto}', [KomentarFotoController::class, 'edit'])->name('komentar.view');
Route::put('/komentar-fotos/{komentar_foto}', [KomentarFotoController::class, 'update'])->name('edit.komentar');
Route::delete('/komentar-foto/{komentar_foto}', [KomentarFotoController::class, 'destroy'])->name('hapus.komentar');
Route::post('/like-foto/{like_foto}', [LikeFotoController::class, 'store'])->name('post.like');
Route::post('/komentar-foto/{komentar_foto}', [KomentarFotoController::class, 'store'])->name('post.komentar');

Route::resource('/profile', ProfileController::class);
});


Route::middleware(['guest'])->group(function(){

Route::get('/login', [SessionController::class, 'login_view'])->name('login');
Route::post('login', [SessionController::class, 'post_login'])->name('login.post');
Route::get('/register', function(){
    return view('auth.register');
})->name('register.view');
Route::post('register', [SessionController::class, 'register'])->name('register.post');



});

Route::get('/about-us', function(){
    return view('home.about-us');
})->name('about-us.view');