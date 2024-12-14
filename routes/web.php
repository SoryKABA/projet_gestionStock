<?php

use App\Http\Controllers\AdminController\GenerateCodeBarreController;
use App\Http\Controllers\AdminController\UserController;
use App\Http\Controllers\AdminController\UserRoleController;
use App\Http\Controllers\AdminController\UsersCommunicateController;
use App\Http\Controllers\ArticleController\ArticleController;
use App\Http\Controllers\ArticleController\CategoryController;
use App\Http\Controllers\AuthController\AuthController;
use App\Http\Controllers\SellController\SellController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
Route::post('/code_barre', [GenerateCodeBarreController::class, 'codeBarreGenerate'])->name('articles');
Route::get('/code_barre/{articles}', [GenerateCodeBarreController::class, 'codeBarreArticle'])->name('article');
// Page des rôles
Route::get('/admin', [UserRoleController::class, 'index'])->name('userrole');
Route::get('/admin/rule', [UserRoleController::class, 'create'])->name('createrule');
Route::post('/admin/rule', [UserRoleController::class, 'store'])->name('storerule');
Route::delete('/admin/{rule}', [UserRoleController::class, 'destroy'])->name('suprole');

// Page des utilisateurs
Route::prefix('/admin/users')->middleware('auth')->name('user.')->controller(UserController::class)->group(function () {
    // Route::resource('user', [UserController::class]);
    Route::get('/', 'index')->name('index');
    Route::get('/{user}', 'passwordInit')->name('password_init');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/edit/{user}', 'edit')->name('edit');
    Route::post('/update/{user}', 'update')->name('update');
    Route::delete('/{user}', 'destroy')->name('delete');
});
Route::prefix('/admin')->middleware('auth')->name('admin.')->group(function () {
    Route::resource('articles', ArticleController::class)->except('show');
    Route::resource('sales', SellController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('userscommunicate', UsersCommunicateController::class)->except(['update', 'show']);
});
Route::prefix('/auth')->name('auth.')->controller(AuthController::class)->group(function () {
    Route::get('/dologin', 'dologin')->name('dologin');
    Route::post('/login', 'login')->name('login');
    Route::delete('/logout', 'logout')->name('logout');
});