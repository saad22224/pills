<?php

use App\Exports\invoisesExport;
use App\Http\Controllers\Controller;
use App\Http\Controllers\expensesController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\invoicesControlle;
use App\Http\Controllers\Invoices_ExportController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Livewire\SearchInvoices;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// cache
Route::get('/cache', function () {
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    // Artisan::call('optimize');
    return "Cache is cleared";
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');



// pills

Route::get('/add', [Controller::class, 'addpage'])->name('addpage.index');
// Route::get('/expenses' , [Controller::class , 'expensesPage'])->name('expensesPage.index');
Route::get('/income', [Controller::class, 'incomePage'])->name('incomePage.index');


// invoices
Route::middleware('auth')->group(function () {
    Route::resource('invoices', invoicesControlle::class);
});



// expenses
Route::middleware('auth')->group(function () {
    Route::resource('expenses', expensesController::class);
});

// incomes
Route::middleware('auth')->group(function () {
    Route::resource('income', IncomeController::class);
});
