<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use App\Models\Listing;
use Illuminate\Http\Request;

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
            "I am Loki of Asgard, and I am your rightful king."
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
   public function store(StoreListingRequest $request)
    {
        $data = $request->validated();

        // attach logged-in user
        $data['user_id'] = auth()->id();

        // image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Listing::create($data);

        return redirect()->route('listings.index')
            ->with('success', 'Listing created successfully');
    }

    //Show Edit Form
    public function edit(Listing $listing) {
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
            'website' => 'nullable|url',
            'tags' => 'required',
            'description' => 'required', 
            'image' => 'nullable|image|max:2048'
        ]);

        // Image Upload
        if($request->hasFile('image')){
            $formFields['image'] =
            $request->file('image')->store('images','public');
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
