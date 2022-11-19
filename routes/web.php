<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Importing model here through namespace
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


// Route::get('/hello', function() {
//     return response('<h1>Hello World<h1>', 200)
//         ->header('Content-Type', 'text/plain')
//         ->header('foo', 'bar');
// });

// // WildCard setup

// Route::get('/post/{id}', function($id){ 
//     // ddd($id); // Used for Debugging // Die Dump Helpers
//     return response('Post'.$id, 200);
// })->where('id', '[0-9]+');

// // Request & query params

// Route::get('/search', function(Request $request) {
//     return ($request->name.' '.$request->city);
// });


// Common Resources Routes:
// index - Show all listings
// show - Show single listings
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing




//All Listings
Route::get('/', [ListingController::class, 'index']); //controller class used here

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']); //controller class used here

// Show that the database is connected or not
Route::get('/dbconn', function() {
    return view('dbconn');
});

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log in User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
