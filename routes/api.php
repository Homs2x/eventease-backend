<?php

use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventScheduleController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout',  [OrganizerController::class,'logout']);
    Route::post('/admin-logout',  [AdminController::class,'logout']);
    Route::get('/organizer/show', [OrganizerController::class,'index']);    
    

});

Route::controller(VenueController::class)->group(function(){
    Route::get('/venue',        'index');
    Route::put('/venue/{id}',    'update');

});
Route::controller(ResourceController::class)->group(function(){
    Route::get('/resource',        'index');
    Route::put('/resource/{id}',    'update');

    Route::controller(RequestController::class)->group(function(){
        Route::get('/request',        'index');
        Route::post('/request',        'store');
        Route::put('/request/{id}',    'update');
        Route::delete('/request/{id}', 'destroy');
    });
    
    Route::controller(EventController::class)->group(function(){
        Route::get('/event',        'index');
        Route::post('/event',        'store');
        Route::put('/event/{id}',    'update');
        Route::delete('/event/{id}', 'destroy');
    });
    
    Route::controller(EventScheduleController::class)->group(function(){
        Route::get('/eventschedule',        'index');
        Route::post('/eventschedule',        'store');
        Route::put('/eventschedule/{id}',    'update');
        Route::delete('/eventschedule/{id}', 'destroy');
    });

});

//PUBLIC APIS

Route::controller(OrganizerController::class)->group(function(){
    Route::post('/login',          'login');

});

Route::controller(AdminController::class)->group(function(){
    Route::post('/admin-login',          'login');

});

