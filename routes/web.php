<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

Route::get('/', [HomeController::class, 'welcome'])
    ->name('welcome')
    ->middleware('preventTeamITAndAdmin');

Route::get('/tickets', [UserController::class, 'showTickets'])
    ->name('tickets')
    ->middleware('preventTeamITAndAdmin');

// Kelompok Rute untuk User
Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    // Dashboard User
    Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('dashboard');

    // Rute Pemesanan dan Transaksi
    Route::get('/order/{productId}', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/transaksi/{order}', [OrderController::class, 'showtransaksiForm'])->name('transaction.show');
    Route::post('/transaksi', [OrderController::class, 'processtransaksi'])->name('transaksi.process');

    Route::get('/history', [OrderController::class, 'userHistory'])->name('orders.history');

    Route::get('/ticket/{order}', [OrderController::class, 'showTicketDetail'])->name('ticket.detail');

    Route::get('/ticket/view/{order}', [OrderController::class, 'viewTicket'])->name('ticket.view');

    Route::get('/my-tickets', [OrderController::class, 'myTicket'])->name('orders.myTicket');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products/save', [ProductController::class, 'save'])->name('admin.products.save');
    Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/edit/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::get('/admin/products/delete/{id}', [ProductController::class, 'delete'])->name('admin.products.delete');
});

Route::middleware(['auth', 'verified', 'role:teamIT'])->group(function () {
    Route::get('/team', [TeamController::class, 'index'])->name('team');
    Route::get('/teamGlobal', [TeamController::class, 'global'])->name('team.global');
    Route::post('/team/{user}/update-role', [TeamController::class, 'updateRole'])->name('team.update-role');
});

require __DIR__ . '/auth.php';
