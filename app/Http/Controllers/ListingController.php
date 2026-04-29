<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        $quotes = [
            "I am burdened with glorious purpose.",
            "Trust my rage.",
            "Freedom is life's great lie.",
            "I assure you, brother, the sun will shine on us again.",
            "You will never be a god.",
            "Kneel before me.",
            "Glorious purpose awaits.",
            "I am Loki of Asgard, and I am your rightful king.",
            "I have been falling… for 30 minutes!",
            "No one bad is ever truly bad. And no one good is ever truly good.",
            "We’re not doing Get Help.",
            "Love is a dagger."
        ];

        $randomQuote = $quotes[array_rand($quotes)];

        return view('listings.index', [
            'listings' => Listing::latest()
                ->filter(request(['tag', 'search', 'category']))
                ->paginate(4),
            'quote' => $randomQuote
        ]); 
    }

    //Show single listing
    public function show(Listing $listing){
    return view('listings.show', [
        'listing' => $listing
    ]);  

    }

    //Show create form
    public function create(){
        return view('listings.create');
    }

    //Store Listing Data
    public function store(Request $request) {
        
        $formFields = $request->validate([
            'source' => 'required',
            'title' => 'required',
            'category' => 'required',
            'origin' => 'required',
            'contact' => 'nullable|email',
            'website' => 'nullable|url',
            'tags' => 'required',
            'description' => 'required', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);


        // Image Upload
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

            $formFields['image'] = $file->storeAs('images', $filename, 'local');
        }

        $formFields['user_id'] = auth()->id();
        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    //Show Edit Form
    public function edit(Listing $listing) {

        if ($listing->user_id != auth()->id()) {
        abort(403, 'Unauthorized Action');
        }

        return view('listings.edit', ['listing' => $listing]);
    }

    //Update Listing Data
    public function update(Request $request, Listing $listing) {

    // Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'source' => 'required',
            'title' => 'required',
            'category' => 'required',
            'origin' => 'required',
            'contact' => 'nullable',
            'website' => 'nullable',
            'tags' => 'required',
            'description' => 'required', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        // Image Upload
        if($request->hasFile('image')){
            
            //Deletes old image
            if($listing->image){
                Storage::disk('local')->delete($listing->image);
            }

            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

            $formFields['image'] = $file->storeAs('images', $filename, 'local');
        }


        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }


    //Delete Listing
    public function destroy(Listing $listing){
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }        
        
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }
    
    //Manage Listings
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
