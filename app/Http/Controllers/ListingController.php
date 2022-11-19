<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{
    // Show all listing
    public function index() {
        // dd(request('tag'));
        return view('listings.index', [
            // 'heading' => 'Lastest Listing',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(4) // paginate or simplePaginate used for multiple pages
        ]);
    }

    // show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing // this approach will automatically detect that the item has exist or not
        ]);
    }

    // show create form
    public function create() {
        return view('listings.create');
    }

    // Store Listing data
    public function store(Request $request) {
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        
        Listing::create($formFields);
        
        // This is another way to show flash message...
        // Session::flash('message', 'Listing Created');

        
        return redirect('/')->with('message', 'Listing created successfully!');
    }

    // Show Edit Form
    public function edit(Listing $listing) {
        // dd($listing);
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update Listing
    public function update(Request $request, Listing $listing) {
        $formfields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formfields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formfields);

        return back()->with('message', 'Listing updated successfully!');
    }

    // Delete Listing
    public function destroy(Listing $listing) {
        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted Successfully');
    }
}
