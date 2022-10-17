<?php

use App\Models\order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\homeController;
use App\Http\Controllers\admin\foodController;
use App\Http\Controllers\user\FoodsController;
use App\Http\Controllers\user\OrderController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\adminhomeController;
use App\Http\Controllers\admin\CategorieController;
use App\Http\Controllers\user\categoriesController;
use App\Http\Controllers\admin\manageadminController;
use App\Http\Controllers\livreur\livreurOrdersController;
use App\Http\Controllers\user\homeController as UserHomeController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// ADMIN ROUTES (start here)
Route::prefix('admin')->middleware(['IsAdmin'])->group(function(){
    Route::get('/', [adminHomeController::class, 'index'])->name('admin.home');
    Route::resource('/manage', manageadminController::class);
    Route::resource('/categorie', CategorieController::class);
    Route::resource('/food', foodController::class);
    Route::resource('/manage_order', OrdersController::class);
    Route::get('/returned_orders', [OrdersController::class,'returned_orders'])->name('returned_orders');
    Route::get('/orders/onroad/{id}', [OrdersController::class,'onroad'])->name('onroad');
    Route::get('/orders/received/{id}', [OrdersController::class,'received'])->name('received');
    Route::get('/settings', [adminHomeController::class, 'profile'])->name('profile');
    Route::get('/change_pass/{id}', [adminHomeController::class, 'edit_pass'])->name('admin.change_pass');
    Route::put('/manage_pass/{id}', [adminHomeController::class, 'update_password'])->name('admin.pass');
    Route::get('/readed_messages', [adminHomeController::class, 'readed_messages'])->name('readed_messages');
    Route::get('/unreaded_messages', [adminHomeController::class, 'unreaded_messages']);
    Route::get('/read_message/{id}', [adminHomeController::class, 'show_message'])->name('read_message');
});
// ADMIN ROUTES (ends here)

// LIVREUR ROUTES (starts here)
Route::prefix('livreur')->middleware(['livreur'])->group(function(){
        Route::get('/', function () {
            return view('livreur.home');
        })->name('livreur.home');
        Route::resource('/orders', livreurOrdersController::class);
        Route::get('/livreur_request', [livreurOrdersController::class , 'request'])->name('livreur_orders_request');
        Route::get('/accepte_request/{id}', [livreurOrdersController::class , 'confirm_request'])->name('livreur_accepte_request');
        Route::get('/refuse_request/{id}', [livreurOrdersController::class , 'refuse_request'])->name('livreur_refuse_order');
        Route::get('/return_order/{id}', [livreurOrdersController::class , 'return_order'])->name('livreur_return_order');
});
// LIVREUR ROUTES (ends here)



// USER ROUTES (starts here)
    Route::get('/', [homeController::class,'index'])->name('user.home');
    Route::get('/all_categories', [categoriesController::class,'index'])->name('user.categories');
    Route::get('/speacial_food/{id}', [FoodsController::class,'speacial_food'])->name('user.spacial_food');
    Route::get('/all_foods', [FoodsController::class,'index'])->name('user.foods');
    Route::get('/search', [FoodsController::class,'search'])->name('user.search_foods');
    Route::resource('/add_order', OrderController::class)->middleware('auth');
    Route::get('/new_order/{id}', [OrderController::class,'add_order'])->middleware('auth')->name("new_order");
    Route::get('/message', [homeController::class,'message'])->name('message');
    Route::post('/send_message', [homeController::class,'send_message'])->name('send_message');
// USER ROUTES (ends here)
