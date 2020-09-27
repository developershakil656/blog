<?php
// khrrifat0195@


use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Console\MiddlewareMakeCommand;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

//authintication route
Auth::routes(['verify' => true]);


// fontend routes are here
Route::get('/', 'HomeController@home')->name('home');
Route::get('single-post/{id}', 'HomeController@single_post')->name('single-post');
Route::get('single-category/{id}', 'HomeController@single_category')->name('single-category');
Route::get('about', 'HomeController@about')->name('about');
Route::get('contact', 'HomeController@contact')->name('contact');
Route::post('submited', 'HomeController@contact_submit')->name('contact_submit');


Route::middleware(['auth','login'])->group(function () {

    Route::middleware(['verified'])->group(function () {
        Route::get('/dashbord', 'admin\AdminController@home')->name('adminHome');

        Route::resource('user', 'admin\UserController')->middleware('user_role');

        Route::prefix('category')->group(function () {
            //category routes
            Route::get('/add-category', 'admin\CategoryController@add')->name('add-category');
            Route::get('/manage-category', 'admin\CategoryController@manage')->name('manage-category');
            Route::post('/save-category', 'admin\CategoryController@save')->name('save-category');
            Route::get('/category-status/{id}/{status}', 'admin\CategoryController@change_status')->name('category-status');
            Route::get('/edit-category/{id}', 'admin\CategoryController@edit')->name('edit-category');
            Route::post('/update-category', 'admin\CategoryController@update')->name('update-category');
            Route::get('/delete-category/{id}', 'admin\CategoryController@delete')->name('delete-category');
        });

        Route::prefix('post')->group(function () {
            //post routes
            Route::get('/add-post', 'admin\PostController@add')->name('add-post');
            Route::post('/save-post', 'admin\PostController@save')->name('save-post');
            Route::get('/edit-post/{id}', 'admin\PostController@edit')->name('edit-post');
            Route::post('/update-post', 'admin\PostController@update')->name('update-post');
            Route::get('/manage-post', 'admin\PostController@manage')->name('manage-post');
            Route::get('/delete-post/{id}', 'admin\PostController@delete')->name('delete-post');
        });
    });
});

Route::get('login/google', 'GoogleLoginController@redirectToProvider');
Route::get('auth/callback/google', 'GoogleLoginController@handleProviderCallback');
Route::get('google/logout', 'GoogleLoginController@logout');


// Route::get('addme',function(){
//     $user= new User();
//     $user->name='admin';
//     $user->user_role='admin';
//     $user->password=bcrypt('admin123');
//     $user->email='admin@gmail.com';
//     $user->save();
// });


Auth::routes();

