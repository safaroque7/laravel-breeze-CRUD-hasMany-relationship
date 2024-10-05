<?php

use App\Models\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $allClients = Client::count();
    return view('dashboard', [
        'allClients' => $allClients,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/add-new-client', [ClientController::class, 'index'])->name('add-new-client');
    Route::get('/all-clients', [ClientController::class, 'allClientsIndex'])->name('all-clients');
    Route::post('/store-client', [ClientController::class, 'storeClient'])->name('store-client');
    Route::get('/single-client-info/{id}', [ClientController::class, 'singleClientInfo'])->name('single-client-info');
    Route::get('/edit-single-client-info/{id}', [ClientController::class, 'editSingleClientInfo'])->name('edit-single-client-info');
    Route::post('/update-single-client-info/{id}', [ClientController::class, 'updateClient'])->name('update-single-client-info');
    Route::get('/delete-single-client-info/{id}', [ClientController::class, 'delete'])->name('delete-single-client-info');
});