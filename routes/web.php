<?php

// use Illuminate\Http\Request;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/hello', function() {
//     return response('<h1>Hello World</h1>', 200)
//     ->header('Content-type', 'text/plain')
//     ->header('foo', 'bar');
// });


// Route::get('/posts/{id}', function($id){
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function(Request $request){
//      return $request->name . ' ' . $request->city;
// });

// All Listings
Route::get('/', [ListingController::class, 'index'])->name('listings.index');

//Show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);

//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

//Submit Edit Form
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//Delete 
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single Listings
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Show Register/Create Form
Route::get('/register', [UserController::class, 'create']);

//Create New User
Route::post('/users', [UserController::class, 'store']);

//Log User Out
Route::post('/logout', [UserController::class, 'logout']);

//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login');

//Login User
Route::post('/login', [UserController::class, 'authenticate']);
