<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Middleware\isAdmin;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    $lastPostId = Post::latest('id')->value('id'); // Mendapatkan id dari postingan terakhir

    $post = Post::whereNotIn('id', [$lastPostId])->get(); // Mengambil semua data kecuali data dengan id terakhir

    return view('home', [
        'title' => 'Home',
        'posts' => Post::all(),
        'post' => $post
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About'
    ]);
});

Route::get('/blog', [PostController::class, 'index']);
    
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all(),
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth'); 

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth'); 
// Route::resource('/dashboard/posts/{posts:slug}', DashboardPostController::class)->middleware('auth');


// Gates Authorization
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/categories', [AdminCategoryController::class, 'index']);
});


