<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('kategori-berita', [App\Http\Controllers\KategoriBeritaController::class, 'index'])->name('kategori-berita.index');
Route::get('paket-internet', [App\Http\Controllers\PaketController::class, 'index'])->name('paket.index');

Route::get('paket-data-center', [App\Http\Controllers\HomeController::class, 'dacen'])->name('paket.dacen');

Route::get('hubungi-kami', [App\Http\Controllers\HomeController::class, 'hubungi'])->name('home.hubungi');
Route::get('sarat-dan-ketentuan', [App\Http\Controllers\HomeController::class, 'sdank'])->name('home.sdank');
Route::get('metode-pembayaran', [App\Http\Controllers\HomeController::class, 'metode'])->name('home.metode');

Route::resource('karir', App\Http\Controllers\KarirController::class);
Route::resource('promo', App\Http\Controllers\PromoController::class);
Route::resource('news', App\Http\Controllers\BeritaController::class);
Route::resource('carousel', App\Http\Controllers\CarouselController::class);
Route::resource('tentang-kami', App\Http\Controllers\TentangKamiController::class);
Route::resource('faq', App\Http\Controllers\FaqController::class);

// Route::get('kebijakan-privasi', [App\Http\Controllers\HomeController::class, 'kebijakan'])->name('home.kebijakan');
