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

// Tugas Jobsheet 2
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;

// Halaman Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Products (Route Prefix)
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage'])->name('products.foodBeverage');
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth'])->name('products.beautyHealth');
    Route::get('/home-care', [ProductController::class, 'homeCare'])->name('products.homeCare');
    Route::get('/baby-kid', [ProductController::class, 'babyKid'])->name('products.babyKid');
});

// Halaman User (Route Param)
Route::get('/user/{id}/name/{name}', [UserController::class, 'show']);

// Halaman Penjualan
Route::get('/sale', [SaleController::class, 'index'])->name('sales.index');