<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('book.index');
    }

    public function data()
    {
        // $books = Book::query();
        $books = book::join('author', 'book.author_id', '=', 'author.author_id')
        ->join('book_category', 'book.book_category_id', '=', 'book_category.book_category_id')
        ->join('rating', 'book.book_id', '=', 'rating.book_id')
        ->select('book.book_id', 'book.title', 'book_category.category_name', 'author.name', DB::raw('AVG(rating.rating) as average_rating'), DB::raw('COUNT(rating.rating_id) as voter'))
        ->groupBy('book.book_id', 'author.author_id')
        ->orderBy('average_rating', 'desc');
        
        return DataTables::of($books)
            ->filterColumn('category_name', function($query, $keyword) {
                $query->whereRaw('category_name like ?', ["%{$keyword}%"]);
            })
            ->filterColumn('name', function($query, $keyword) {
                $query->whereRaw('name like ?', ["%{$keyword}%"]);
            })
            ->filterColumn('average_rating', function($query, $keyword) {
                $query->havingRaw('AVG(rating.rating) like ?', ["%{$keyword}%"]);
            })
            ->filterColumn('voter', function($query, $keyword) {
                $query->havingRaw('COUNT(rating.rating_id) like ?', ["%{$keyword}%"]);
            })
            ->filterColumn('title', function($query, $keyword) {
                $query->whereRaw('title like ?', ["%{$keyword}%"]);
            })
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
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
