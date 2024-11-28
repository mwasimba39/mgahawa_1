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


// Route for the customer's home
Route::get('/customer/home', [CustomerController::class, 'index'])->name('customer.home');

Route::get('/customer/home', [CustomerController::class, 'index'])->name('customer.home');

// If you want to show the menu within the CustomerController, you can do so like this:
// Alternatively, you can call the showMenu method in the CustomerController if you want to handle everything in one controller
Route::get('/customer/menu', [FoodController::class, 'showMenu'])->name('customer.menu')->middleware('auth');

Route::get('/order/create/{food_id}', [OrderController::class, 'createOrder'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

Route::get('/customer/orders', [OrderController::class, 'showOrders'])->name('customer.orders')->middleware('auth');