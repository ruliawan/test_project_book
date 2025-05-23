<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('rating.index', compact('authors'));
    }

    public function getRating(Request $request)
    {
        $author_id = $request->author_id;
        $rating = Book::where('author_id', $author_id)->get();
        return response()->json($rating);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'author_id' => 'required|exists:author,author_id',
            'book_id' => 'required|exists:book,book_id',
            'rating' => 'required|numeric|min:1|max:10',
        ]);

        Rating::create([
            'book_id' => $validated['book_id'],
            'rating' => $validated['rating'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Rating submitted successfully',
            'redirect' => route('book'),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
