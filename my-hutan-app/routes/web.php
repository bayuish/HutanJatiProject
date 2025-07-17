<?php

use Illuminate\Support\Facades\Route;

// Route for the main cashier menu page
Route::get('/menu', function () {
    return view('pages.menu.index');
})->name('menu.index');

// Route for the dashboard page (can be a simple page for now)
Route::get('/dashboard', function () {
    return view('pages.dashboard.index'); // Make sure you put some content in resources/views/pages/dashboard/index.blade.php
})->name('dashboard');

// Routes for other sidebar items (you can create simple views for them for now)
Route::get('/stock', function () { return view('placeholder', ['title' => 'Stock']); })->name('stock.index');
Route::get('/tables', function () { return view('placeholder', ['title' => 'Tables']); })->name('tables.index');
Route::get('/history', function () { return view('placeholder', ['title' => 'History']); })->name('history.index');
Route::get('/settings', function () { return view('placeholder', ['title' => 'Settings']); })->name('settings.index');


// Redirect root to the menu page or dashboard
Route::get('/', function () {
    return redirect()->route('menu.index');
});

// Create a simple placeholder view for other pages (optional)
// resources/views/placeholder.blade.php
// <x-layout.app><h1 class="text-center mt-5">{{ $title ?? 'Page' }} Under Construction</h1></x-layout.app>