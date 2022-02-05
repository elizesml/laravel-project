<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\CustomerController;
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

// Homepage
Route::get('/', function () {
    return view('welcome');;
});

// ADMIN
Route::resource('/admin', CampaignController::class);
Route::put('/admin/{id}/generate', [VoucherController::class, 'create']);
Route::put('/admin/{id}/process', [VoucherController::class, 'store']);

// CUSTOMER API Routes
Route::get('/view', [CustomerController::class, 'viewAsCustomer'])->name('view_as');
Route::get('/user/{user_id}', [CustomerController::class, 'viewCampaigns'])->name('view_campaigns');
Route::get('/user/{user_id}/enter/{campaign_id}', [CustomerController::class, 'enter'])->name('enter_campaign');
Route::put('/user/{user_id}/{voucher_id}', [CustomerController::class, 'process'])->name('process');
