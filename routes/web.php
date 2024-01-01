<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('frontend.master');
// });

Route::get('/', [FrontEndController::class, 'home'])->name('frontend.home');
Route::get('/login', [LoginController::class, 'index'])->name('frontend.login');
Route::get('/register', [RegisterController::class, 'index'])->name('frontend.register');
Route::post('/register/create', [AuthController::class, 'register'])->name('frontend.register.create');
Route::post('/login/auth', [AuthController::class, 'login'])->name('frontend.login.auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('frontend.logout');

Route::get('/admin/login', [LoginAdminController::class, 'index'])->name('backend.login');
Route::post('/admin/login/auth', [LoginAdminController::class, 'login'])->name('backend.login.auth');

Route::middleware('auth.admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::put('/user/approved/{id}/{type}', [UserController::class, 'approve'])->name('user.approve');
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/create/store', [ProductController::class, 'store'])->name('product.store');
    Route::put('/product/edit/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::put('/product/activation/{id}/{type}', [ProductController::class, 'activation'])->name('product.activation');
    Route::put('/product/highlight/{id}', [ProductController::class, 'highlight'])->name('product.highlight');

    Route::get('/logout', [LoginAdminController::class, 'logout'])->name('backend.logout');
});
