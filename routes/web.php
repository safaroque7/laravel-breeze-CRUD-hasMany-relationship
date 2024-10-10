<?php

use App\Models\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    
    return view('dashboard');
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

    // get all active clients
    Route::get('/all-active-clients', [ClientController::class, 'getActiveClients'])->name('all-active-clients');

    // get all inactive clients
    Route::get('/all-inactive-clients', [ClientController::class, 'getInactiveClients'])->name('all-inactive-clients');

    

    // get all inactive clients email
    Route::get('/all-inactive-clients-email', [ClientController::class, 'getInactiveClientsEmails'])->name('all-inactive-clients-email');

    // get all active clients email
    Route::get('/all-active-clients-email', [ClientController::class, 'getActiveClientsEmails'])->name('all-active-clients-email');

    // Facebook Review Left
    Route::get('/facebook-review-left', [ClientController::class, 'getFacebookReviewLeft'])->name('facebook-review-left');
    
    // Facebook Review Left Phone Number
    Route::get('/facebook-review-left-phone', [ClientController::class, 'getFacebookReviewLeftPhone'])->name('facebook-review-left-phone');

    // Google Review Left email
    Route::get('/google-review-left-email', [ClientController::class, 'getGoogleReviewLeftEmail'])->name('google-review-left-email');

    // Google Review Left phone
    Route::get('/google-review-left-phone', [ClientController::class, 'getGoogleReviewLeftPhone'])->name('google-review-left-phone');

    // Add New Service
    Route::get('/add-new-service', [ServiceController::class, 'getAddNewService'])->name('add-new-service');

    //For storing the new service
    Route::post('/store-new-service', [ServiceController::class, 'getStoreNewService'])->name('store-new-service');

     //For editing the new service
     Route::get('/edit-service-item/{id}', [ServiceController::class, 'editServiceItem'])->name('edit-service-item');

     //For updating the new service
     Route::post('/update-service-item/{id}', [ServiceController::class, 'updateServiceItem'])->name('update-service-item');

     //For updating the new service
     Route::get('/delete-service-item/{id}', [ServiceController::class, 'destory'])->name('delete-service-item');
});