<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\TransactionController;

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



// --  Customer View --
Route::get('/customer-index', [CustomerController::class, 'index']);

//login UI
Route::get('/', [CustomerController::class, 'loginForm'])->name('loginForm');

//sign up (storing new customer data)
Route::get('/register', [CustomerController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [CustomerController::class, 'store'])->name('customer.store');

//show wallets that user has
Route::get('/wallets-{id}', [CustomerController::class, 'showWallets'])->name('customer.wallet');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'showDashboard'])->name('showDashboard');
    Route::get('/wallet_form', [WalletController::class, 'walletForm'])->name('walletForm');
    Route::post('/add_wallet', [WalletController::class, 'store'])->name('wallet.store');
    Route::get('wallet_details-{customer_id}-{wallet_id}', [WalletController::class, 'showDetails'])->name('walletDetails');
    //store new transactions
    Route::post('/transactions_store', [TransactionController::class, 'store'])->name('transaction.store');
});

//showing a wallet details
Route::get('customer_detail-{id}', [CustomerController::class, 'showWalletDetails'])->name('customer.detail'); 
// Route::get('/{id}', [CustomerController::class, 'showWalletDetails']);

//login 
Route::post('customer_login', [CustomerController::class, 'login'])->name('customer.login');

//logout
Route::post('customer_logout', [CustomerController::class, 'logout'])->name('customer.logout');





