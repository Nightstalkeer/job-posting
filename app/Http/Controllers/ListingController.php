<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Barryvdh\Reflection\DocBlock\Tag;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all listing
    public function index() {
        // dd(request('tag'));
        return view('listings.index', [
            // 'heading' => 'Lastest Listing',
            'listings' => Listing::latest()->filter(request(['tag']))->get()
        ]);
    }

    // show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing // this approach will automatically detect that the item has exist or not
        ]);
    }
}
