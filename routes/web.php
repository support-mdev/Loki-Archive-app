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
Route::get('/', [ListingController::class, 'index']);

//Modify Data Auth
Route::middleware('auth')->group(function () {
    Route::get('/listings/create', [ListingController::class, 'create']);
    Route::post('/listings', [ListingController::class, 'store']);
    Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);
    Route::put('/listings/{listing}', [ListingController::class, 'update']);
    Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);
    Route::get('/listings/manage', [ListingController::class, 'manage']);
});

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
