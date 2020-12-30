<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FacebookController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;



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
    //Route::get('user', [SiteController::class, 'user']);
    Route::get('search', [SiteController::class, 'search']);
    Route::post('apiaddcart', [SiteController::class, 'apiaddcart']);
    Route::post('apiorderproducts', [SiteController::class, 'apiorderproducts']);
    Route::post('apiremovecart', [SiteController::class, 'apiremovecart']);
    Route::post('apiaddfavo', [SiteController::class, 'apiaddfavo']);
    Route::get('cart', [SiteController::class, 'cart']);
    Route::get('profile', [SiteController::class, 'profile'])->name('profile')->middleware('auth');
    Route::post('profile', [SiteController::class, 'profile'])->middleware('web');
    Route::post('profilepassword', [SiteController::class, 'profilepassword'])->middleware('web');
    Route::get('checkout', [SiteController::class, 'checkout']);
    Route::post('checkout', [SiteController::class, 'checkout'])->middleware('web');

    Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
    Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
    Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create']);
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store']);
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

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

    $curcookie = Cookie::get('ACSESSID');
    $rand = Str::random(26);
    isset($curcookie) ? $cookie = $curcookie : $cookie = $rand;
    //Cookie::queue(Cookie::make('ACSESSID', $cookie, 525600));

    $curcookiefav = Cookie::get('ACFAVOSESSID');
    $randfav = Str::random(26);
    isset($curcookiefav) ? $cookiefav = $curcookiefav : $cookiefav = $randfav;
    //Cookie::queue(Cookie::make('ACFAVOSESSID', $cookiefav, 525600));
    
    $view->with('shop', \App\Shop::select('id', 'name', 'image','slug','created_at')->get())
    ->with('allcart', \App\Cart::with(['products'])->where('session_id', $cookie)->get())
    ->with('allfavo', \App\Favourite::with(['products'])->where('session_id', $cookiefav)->get());
});


// Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
// Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

// Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
// Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


