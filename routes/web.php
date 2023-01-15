<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// naming conventions
// index =show all listings
// show = a single listing
// create = show form to create new listing
// store = store new listing
// edit = show form to edit existing listing
// update = update listing
// destroy = delete listing

Route::get('/', [ListingController::class, 'index']);
//post Listing
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
// store Listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
// ListingEdit  Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
// update Listing form
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
// delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
// manage Listing
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');
// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


// Show Register/create Form
Route::get('/register', [UserController::class,'create'])->middleware('guest');
//create new user
Route::post('/users', [UserController::class, 'store']);
// Log out user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
// show Log in form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);