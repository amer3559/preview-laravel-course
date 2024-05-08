<?php

use App\Http\Controllers\OperationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('pages.home');
});

//Header
//Route::get('/tickets', function () {
//    return view('pages.tickets.index');
//})->name("tickets");

//Route::get('/operation-tickets', function () {
//    return view('pages.operations.index');
//})->name("operation.tickets");

//Route::get('/ticket-cases', function () {
//    return view('pages.ticketCases.index');
//})->name("ticketCases");

// Users
Route::group(['as' => 'users.', 'prefix' => 'users'], function () {

    Route::get('/', [UserController::class, 'index'])->name("index");

    Route::get('/create', [UserController::class, 'create'])->name("create");

    Route::get('/show/{id?}', [UserController::class, 'show'])->name('show');

    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');

    Route::post('/store', [UserController::class, 'store'])->name('store');

    Route::post('/update/{id}', [UserController::class, 'update'])->name('update');

    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
});

// tickets
Route::group(['as' => 'tickets.', 'prefix' => 'tickets'], function () {

    Route::get('/', [TicketController::class, 'index'])->name("index");

    Route::get('/create', [TicketController::class, 'create'])->name("create");

    Route::get('/edit/{id}', [TicketController::class, 'edit'])->name('edit');

    Route::post('/store', [TicketController::class, 'store'])->name('store');

    Route::post('/update/{id}', [TicketController::class, 'update'])->name('update');

    Route::delete('/destroy/{id}', [TicketController::class, 'destroy'])->name('destroy');
});
// operations
Route::group(['as' => 'operations.', 'prefix' => 'operations'], function () {

    Route::get('/', [OperationController::class, 'getRunningTickets'])
        ->name("getRunningTickets");

    Route::post('/finish/{id}', [OperationController::class, 'finishRunningTicket'])->name('finish');

    Route::get('/finished', [OperationController::class, 'getFinishedTickets'])
        ->name("getFinishedTickets");

    Route::post('/import-table', [OperationController::class, 'importTable'])->name('importTable');

    Route::get('/export-table', [OperationController::class, 'exportTable'])->name('exportTable');
});
