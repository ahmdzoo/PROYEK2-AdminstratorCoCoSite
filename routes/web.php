<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('admin');
});

// Admin Routes 
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/adminProducts', [AdminController::class, 'products']);
Route::get('/AddNewProduct', [AdminController::class, 'showAddProductForm']);
Route::get('/deleteProduct/{id}', [AdminController::class, 'deleteProduct']);
Route::post('/AddNewProduct', [AdminController::class, 'addNewProduct']);
Route::post('/UpdateProduct', [AdminController::class, 'UpdateProduct']);
