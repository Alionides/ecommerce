<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FacebookController;

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
// Route::get('/', function () {
//     return view('welcome');
// });
//Route::get('/', [SiteController::class, 'index']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::prefix('{lang?}')->middleware('locale')->group(function () {
    Route::get('/', [SiteController::class, 'index'])->name('homepage');
    Route::get('user', [SiteController::class, 'user']);

    Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
    Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
    Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
    

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        //return view('dashboard');
       return redirect()->route('homepage');
    })->name('dashboard');
   
    Route::get('product/{slug}', [SiteController::class, 'productdetail'])
    ->where('slug', '[0-9A-Za-z\-]+');
    Route::get('shop/{slug}', [SiteController::class, 'shop'])
    ->where('slug', '[0-9A-Za-z\-]+');
    Route::get('shop', [SiteController::class, 'index'])
    ->where('slug', '[0-9A-Za-z\-]+');
    Route::get('{cat}/{subcat}/{subsubcat}',  [SiteController::class, 'category'])->where('subcat', '[A-Za-z-]+');
    Route::get('{cat}/{subcat}',  [SiteController::class, 'category'])->where('subcat', '[A-Za-z-]+');
    Route::get('{cat}',  [SiteController::class, 'category'])->where('cat', '[A-Za-z-]+');
    
    //Route::get('/', 'SiteController@index');
    // Route::get('about', 'SiteController@about');
    // Route::get('contact', 'SiteController@contact');
    // Route::get('blog', 'SiteController@blog');
    // Route::get('blog/{id}/{slug}', 'SiteController@blogdetail');
    // Route::get('whatwedo', 'SiteController@whatwedo');
    // Route::get('whatwedo/{id}/{slug}', 'SiteController@whatwedodetail');
    // Route::get('portfolio', 'SiteController@portfolio');    
    // Route::get('portfolio/{id}/{slug}', 'SiteController@portfoliodetail');
    // Route::get('sehife/{id}/{slug}', 'SiteController@sehife');
    // Route::get('məhsullar', 'SiteController@products');
    // Route::get('xəbərlər', 'SiteController@news');
    // Route::get('xəbər/{id}/{slug}', 'SiteController@newsdetail');
    // Route::post('contact', 'ContactController@store');
});

View::composer('layouts.app', function ($view) {
    $ln = App::getLocale();
    //     $view->with('news', \App\News::select('id','title_az','title_'.$ln.' as title', 'image', 'desc_'.$ln.' as text','created_at')->take(2)
    //     ->get())->with('sehife', \App\Sehife::select('id','slug','link','title_az','title_'.$ln.' as title', 'image', 'desc_'.$ln.' as text')->orderBy('sort', 'asc')->get()
    // );
    $view->with('shop', \App\Shop::select('id', 'name', 'image','slug','created_at')->get());
});


// Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
// Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

// Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
// Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


