<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\BrandController;



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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $users = DB::table('users')->select('id','name','email','created_at')->get();
        return view('dashboard', compact('users'));
    })->name('dashboard');
});


// Route::get('/category', function () {
//     return view('admin.category.category');
// })->name('AllCat');

// Category routes
Route::get('/all/category', [CategoryController::class,'viewCategory'])->name('AllCat');
Route::get('/addCategory', [CategoryController::class,'createCategoryPage'])->name('addCategory');
Route::get('/editCategory/{categoryId}', [CategoryController::class,'editCategoryPage'])->name('editCategory');

Route::get('/RemoveCat/{categoryId}', [CategoryController::class,'RemoveCat'])->name('RemoveCat');
Route::get('/RestoreCat/{categoryId}', [CategoryController::class,'RestoreCat'])->name('RestoreCat');
Route::get('/DeleteCat/{categoryId}', [CategoryController::class,'DeleteCat'])->name('DeleteCat');


Route::post('addCategory', [CategoryController::class,'addCategory'])->name('storeCategory');
Route::post('updateCategory/{id}', [CategoryController::class,'updateCategory'])->name('updateCategory');


//Brand
Route::get('/all/brand',[BrandController::class,'AllBrand'])->name('brand');
Route::get('/addBrand',[BrandController::class,'createBrandPage'])->name('addBrand');
Route::get('/updateBrand/{id}',[BrandController::class,'update'])->name('updateBrand');
Route::post('/storeBrand', [BrandController::class, 'AddBrand'])->name('storeBrand');

