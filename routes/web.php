<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;

// Rute publice
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/produse', [PublicController::class, 'products'])->name('products');
Route::get('/servicii', [PublicController::class, 'services'])->name('services');
Route::get('/proces', [PublicController::class, 'process'])->name('process');
Route::get('/despre', [PublicController::class, 'about'])->name('about');
Route::get('/confidentialitate', [PublicController::class, 'privacy'])->name('privacy');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [PublicController::class, 'contactStore'])->middleware('auth')->name('contact.store');

// Comenzi client (doar logati)
Route::middleware(['auth'])->group(function () {
    Route::get('/comenzile-mele', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/comanda/{product}', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/comanda/{product}', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/comanda/{order}/editeaza', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/comanda/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/comanda/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
});

// Dashboard - redirectioneaza in functie de rol
Route::get('/dashboard', function () {
    return auth()->user()->isAdmin()
        ? redirect()->route('admin.dashboard')
        : redirect()->route('orders.index');
})->middleware('auth')->name('dashboard');

// Rute admin (protejate)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class)->except(['show']);
    Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::patch('orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.status');
    Route::delete('orders/{order}', [AdminOrderController::class, 'destroy'])->name('orders.destroy');
    Route::get('users', [AdminUserController::class, 'index'])->name('users.index');
    Route::patch('users/{user}/role', [AdminUserController::class, 'toggleRole'])->name('users.role');
    Route::get('messages', [AdminMessageController::class, 'index'])->name('messages.index');
    Route::patch('messages/{message}/read', [AdminMessageController::class, 'toggleRead'])->name('messages.read');
    Route::delete('messages/{message}', [AdminMessageController::class, 'destroy'])->name('messages.destroy');
});

require __DIR__.'/auth.php';
