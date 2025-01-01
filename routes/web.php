<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [AdminController::class, 'home']);
Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/create_field', [AdminController::class, 'create_field']);
Route::post('/add_field', [AdminController::class, 'add_field']);
Route::get('/view_field', [AdminController::class, 'view_field']);


Route::get('/basket_field', [AdminController::class, 'basket_field']);

Route::get('/delete_field/{id}', [AdminController::class, 'delete_field']);
Route::get('/update_field/{id}', [AdminController::class, 'update_field']);
Route::post('/edit_field/{id}', [AdminController::class, 'edit_field']);

Route::get('/field_details/{id}', [HomeController::class, 'field_details']);

Route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);

Route::get('/bookings', [AdminController::class, 'bookings']);
Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking']);
Route::get('/approve_booking/{id}', [AdminController::class, 'approve_booking']);
Route::get('/reject_booking/{id}', [AdminController::class, 'reject_booking']);

Route::get('/view_gallery', [AdminController::class, 'view_gallery']);
Route::post('/upload_gallery', [AdminController::class, 'upload_gallery']);
Route::get('/delete_gallery/{id}', [AdminController::class, 'delete_gallery']);

Route::post('/contact', [HomeController::class, 'contact']);
Route::get('/message', [AdminController::class, 'message']);


// Rute untuk halaman checkout
Route::post('/checkout/{field_id}', [HomeController::class, 'checkout'])->name('checkout');

// Rute untuk halaman sukses setelah pembayaran berhasil
// Rute untuk menampilkan tiket
Route::get('/checkout/success/{field_id}/{id}', [HomeController::class, 'success'])->name('checkout-success');

// Rute untuk mengunduh tiket
Route::post('/checkout/success/{field_id}/{id}/unduh', [HomeController::class, 'unduhTiket'])->name('checkout-success-unduh');



// Rute untuk memfinalisasi pemesanan
Route::post('/finalize-booking', [HomeController::class, 'finalizeBooking'])->name('finalize_booking');
