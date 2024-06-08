<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Redirect root URL to /admin
Route::get('/', function () {
    return redirect('/admin');
});

// Rute otentikasi
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/adminProducts', [AdminController::class, 'products']);
    Route::get('/AddNewProduct', [AdminController::class, 'showAddProductForm']);
    Route::post('/AddNewProduct', [AdminController::class, 'addNewProduct']);
    Route::post('/UpdateProduct', [AdminController::class, 'updateProduct']);
    Route::get('/deleteProduct/{id}', [AdminController::class, 'deleteProduct']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
