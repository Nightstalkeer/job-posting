<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Importing model here through namespace
use App\Models\Listing;


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

// Show create form
Route::get('/listings/create', [ListingController::class, 'create']);

//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']); //controller class used here

// Show that the database is connected or not
Route::get('/dbconn', function() {
    return view('dbconn');
});

