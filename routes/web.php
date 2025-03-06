<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\WelcomeController;

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

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/world', function () {
    return 'World';
});

Route::get('/', function () {
    return ('Selamat Datang');
});

Route::get('/about', function () {
    return ('2341760112 - Titania Aurellia Putri Dwiendra');
});

Route::get('/user/{name}', function ($name) {
    return 'Nama saya '.$name;
});

Route::get('/posts/{post}/comments/{comment}', function
($postId, $commentId) {
return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
});

Route::get('/articles/{id}', function ($id) {
    return ('Halaman Artikel dengan ID '.$id);
});

Route::get('/user/{name?}', function ($name=null) {
return 'Nama saya '.$name;
});

Route::get('/user/{name?}', function ($name='John') {
    return 'Nama saya '.$name;
});

// Route Name
Route::get('/user/profile', function () {
    //
})->name('profile');

// Route::get(
//     '/user/profile',
//     [UserProfileController::class, 'show']
// )->name('profile');
    
// // Generating URLs...
// $url = route('profile');

// // Generating Redirects...
// return redirect()->route('profile');

// Route Group
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
    // Uses first & second middleware...
});

Route::get('/user/profile', function () {
    // Uses first & second middleware...
    });
});

Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
    //
    });
});

// Route::middleware('auth')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
// });

// Route Prefixes
// Route::prefix('admin')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
// });

// Redirect Routes
Route::redirect('/here', '/there');

// View Routes
Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

// Praktikum 2
Route::get('/hello', ['WelcomeController::class', 'hello']);

Route::get('/', ['PageController::class', 'index']);
Route::get('page/about', ['PageController::class', 'about']);
Route::get('page/articles/{id}', ['PageController::class', 'articles']);

Route::get('/', ['HomeController::class', 'index']);
Route::get('/about', ['AboutController::class', 'index']);
Route::get('/article/{id}', ['ArticleController::class', 'articles']);

use App\Http\Controllers\PhotoController; 
Route::resource('photos', PhotoController::class);

Route::resource('photos', PhotoController::class)->only([  'index', 'show' 
]); 
Route::resource('photos', PhotoController::class)->except([  'create', 'store', 'update', 'destroy' 
]);

// Praktikum 3
// Route::get('/greeting', function () { 
//     return view('hello', ['name' => 'Titania Aurellia']); 
// });

// Route::get('/greeting', function () { 
//     return view('blog.hello', ['name' => 'Titania Aurellia']); 
// });

Route::get('/greeting', [WelcomeController::class,  'greeting']);