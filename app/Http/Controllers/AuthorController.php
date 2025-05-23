<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('author.index');
    }

    public function data()
    {
        $authors = Author::join('book', 'author.author_id', '=', 'book.author_id')
        ->join('rating', 'book.book_id', '=', 'rating.book_id')
        ->select('name', DB::raw('COUNT(rating.rating_id) as total_voter'))
        ->where('rating.rating', '>', 5)
        ->groupBy('author.author_id', 'name')
        ->orderBy('total_voter', 'desc')
        ->limit(10);
        
        return DataTables::of($authors)
            ->addIndexColumn()
            ->make(true);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
}
