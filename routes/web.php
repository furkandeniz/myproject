<?php

use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\UsersController;
use UniSharp\LaravelFilemanager\Lfm;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/admin', function(){
    return view('admin.home');
})->name('admin');

Route::get('/register', function(){
    return view('admin.register');
})->name('register');

Route::get('/login', function(){
    return view('admin.login');
})->name('login');

Route::get('/forgot-password', function(){
    return view('admin.password');
})->name('password');


Route::middleware('AdminLoginControl')->post('/login-control', [AdminLoginController::class, 'login'])->name('login-control');

Route::post('/register-user', [AdminRegisterController::class, 'create'])->name('register-user');

Route::get('/users',[UsersController::class, 'index'])->name('users');

Route::get('/user-update/{id}',[UsersController::class, 'update'])->name('user-update');

Route::post('/update-post',[UsersController::class, 'updateUser'])->name('user-update-post');

Route::get('/user-delete/{id}',[UsersController::class, 'delete'])->name('user-delete');

Route::get('/user-add',function(){
    return view('admin.user-add');
})->name('user-add');

Route::post('/user-add-post', [UsersController::class, 'add'])->name('user-add-post');

Route::post('/user-delete-post', [UsersController::class, 'deletePost'])->name('user-delete-post');

Route::get('/role', [RolesController::class, 'index'])->name('role');

Route::get('/role-add', function(){
    return view('admin.role-add');
})->name('role-add');

Route::post('/role-add-post', [RolesController::class, 'save'])->name('role-add-post');

Route::get('/role-delete/{id}', [RolesController::class, 'delete'])->name('role-delete');

Route::get('role-update/{id}',[RolesController::class, 'save'])->name('role-update');

Route::post('/role-update-post', [RolesController::class, 'roleUpdatePost'])->name('role-update-post');

Route::get('/page-create',function(){
    return view('admin.page-create');
})->name('page-create');

Route::get('/deneme',function(){
    return view('admin.page-create');
})->name('deneme');

Route::group(['prefix' => 'laravel-filemanager'], function () {
    Lfm::routes();
});

Route::any('{query}',
    function() { return view('admin.404'); })
    ->where('query', '.*');

