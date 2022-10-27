<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [postController::class, 'index']);

Route::get('/home', [postController::class, 'index']);

Route::get('/posts/{post}', [postController::class, 'show']);

Route::get('/posts', [postController::class, 'filter']);

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');

Route::get('/admin/posts/create', [postController::class, 'create'])->middleware('auth');

Route::get('/admin/posts/', [postController::class, 'list'])->middleware('auth');

Route::post('/admin/posts', [postController::class, 'store'])->middleware('auth');

Route::get('/admin/posts/{post}/edit', [postController::class, 'edit'])->middleware('auth');

Route::delete('/admin/posts/{post}', [postController::class, 'destroy'])->middleware('auth');

Route::put('/admin/posts/{post}', [postController::class, 'update'])->middleware('auth');

Route::get('admin/register', [UserController::class, 'create'])->middleware('guest');

Route::post('admin/users', [UserController::class, 'store']);

Route::post('admin/logout', [UserController::class, 'logout']);

Route::get('admin/login', [UserController::class, 'login'])->name('login');

Route::post('admin/users/authenticate', [UserController::class, 'authenticate']);

Route::post('admin/comments', [CommentController::class, 'store']);

Route::delete('admin/comments/{comment}', [CommentController::class, 'destroy']);

Route::get('/posts/categories/{category}', function ($category) {
    return view('categories', [
        'posts'=>Post::join('categories', 'posts.category_id', '=', 'categories.id')->where('posts.category_id', '=', $category)->get(['posts.*', 'categories.title as category_title']),
    ]);
});

Route::post('categories', [CategoryController::class, 'store']);

Route::get('admin/categories', [CategoryController::class, 'index'])->middleware('auth');

Route::get('admin/categories/add', [CategoryController::class, 'create'])->middleware('auth');

Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->middleware('auth');

Route::get('test', [CategoryController::class, 'test']);





// Route::get('/hello', function () {
//     return response('<h1>Hello World</h1>', 200)
//         ->header('Content-Type', 'text/html')
//         ->header('Foo', 'bar');
// });

// Route::get('/posts/{id}', function ($id) {
//    return response('Post ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function(Request $request) {
//     return($request->name . '');
// });
