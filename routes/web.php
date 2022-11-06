<?php

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

Route::get('/', function () {
    return view('listings', [
        'heading' => 'Lastest Listing',
        'listings' => Listing::all()
    ]);
});

Route::get('/listings/{id}', function($id) {
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});

Route::get('/dbconn', function() {
    return view('dbconn');
});

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