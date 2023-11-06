<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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
//     return view('welcome');
// });

Route::get('/dashboardx', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(HomeController::class)->group(function (){

    Route::get('/', 'index');
    Route::get('/home', 'redirect');
    Route::get('/showcart', 'showcart'); 
    Route::get('/orders', 'orders'); 
    Route::get('/deletecart/{id}', 'deletecart')->middleware('auth'); 
    
    Route::post('/addproduct/{id}', 'addproduct'); 
    Route::post('/checkout', 'checkout');

});
Route::middleware(['auth','admin'])->group(function (){
    
    Route::get('/dashboard',[AdminController::class, 'dashboard']);
    Route::get('/product/add',[AdminController::class, 'addProduct']);
    Route::get('/product/view',[AdminController::class, 'viewProduct']);
    Route::get('/product/update/{id}',[AdminController::class, 'editProduct']);
    Route::PUT('/product/update/{id}',[AdminController::class, 'updateProduct']);
    Route::get('/product/delete/{id}',[AdminController::class, 'deleteProduct']);
    Route::put('/product/status/{id}',[AdminController::class, 'statusProduct']);


    Route::get('/user/view',[AdminController::class, 'userview']);

    Route::post('/uploadproduct',[AdminController::class, 'uploadproduct']);
    Route::get('/user/show',[AdminController::class, 'usershow']);
    Route::get('/user/order/{id}',[AdminController::class, 'userorder']);
    Route::get('/user/delete/{id}',[AdminController::class, 'userdelete']);

    Route::get('/user/orders',[AdminController::class, 'allorder']);



});