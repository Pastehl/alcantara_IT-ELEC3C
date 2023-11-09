<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashBoardController;


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
Route::post('addCategory', [CategoryController::class,'addCategory'])->name('storeCategory');
