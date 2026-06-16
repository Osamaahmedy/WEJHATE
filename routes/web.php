<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('/hotels/{hotel}', [HotelController::class, 'show'])->name('hotels.show');

Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');

Route::middleware('auth')->group(function () {
    Route::post('/hotels/{hotel}/book', [HotelController::class, 'book'])->name('hotels.book');
    Route::post('/drivers/{driver}/book', [DriverController::class, 'bookRide'])->name('drivers.book_ride');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    Route::get('/dashboard', function () {
        $user = auth()->user();
        $hotelBookings = $user->bookings()->with('hotel')->latest()->take(5)->get();
        $rides = $user->rides()->with('driver')->latest()->take(5)->get();
        $cartCount = $user->cartItems()->count();
        return view('dashboard', compact('hotelBookings', 'rides', 'cartCount'));
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/bookings', [ProfileController::class, 'bookings'])->name('profile.bookings');
});

require __DIR__.'/auth.php';
