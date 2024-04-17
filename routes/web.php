<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\DetailController;
use App\Http\Controllers\Front\LandingController;
use App\Http\Controllers\Front\PaymentController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Admin\ItemController as AdminItemController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

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

Route::name('front.')->group(function () {
  Route::get('/', [LandingController::class, 'index'])->name('index');
  Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('detail');

  Route::group(['middleware' => 'auth'], function () {
    Route::get('/checkout/{slug}', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/{slug}', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/{bookingId}', [PaymentController::class, 'index'])->name('payment');
    Route::post('/payment/{bookingId}', [PaymentController::class, 'update'])->name('payment.update');
  });
});

// Route::name('front.')->group(function () {
//     Route::get('/', [LandingController::class, 'index'])->name('index');
// });

Route::prefix('admin')->name('admin.')->middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified',
  'admin'
])->group(function () {
  Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
  Route::resource('brand', AdminBrandController::class);
  Route::resource('type', AdminTypeController::class);
  Route::resource('item', AdminItemController::class);
  Route::resource('booking', AdminBookingController::class);
  Route::resource('report', AdminReportController::class);
});
