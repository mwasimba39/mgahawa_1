<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->role == 'owner') {
        return redirect()->route('owner.home');
    } elseif (Auth::check() && Auth::user()->role == 'customer') {
        return redirect()->route('customer.home');
    }
    return redirect()->route('login');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';






// owner routes
Route::get('/owner/home', [OwnerController::class, 'index'])->name('owner.home')->middleware('auth');
Route::get('/addfood', [FoodController::class, 'addfood'])->name('addfood');
Route::post('/addfood', [FoodController::class, 'storefood'])->name('storefood');
Route::get('/availablefood', [FoodController::class, 'foodavailable'])->name('owner.foodavailable');
Route::get('/owner/home', [OwnerController::class, 'total'])->name('owner.home');
Route::get('/owner/{id}/editfood', [FoodController::class, 'editfood'])->name('owner.edit');
Route::put('/owner/{id}', [FoodController::class, 'updatefood'])->name('owner.update');
Route::delete('/owner/{id}', [FoodController::class, 'deletefood'])->name('owner.delete');


//customer routes

Route::get('/customer/home', [CustomerController::class, 'index','total'])->name('customer.home')->middleware('auth');
Route::get('/customer/home', [FoodController::class, 'showMenu'])->name('customer.home');
Route::get('/order/create/{food_id}', [OrderController::class, 'createorder'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');