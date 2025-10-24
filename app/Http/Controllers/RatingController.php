<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RatingController extends Controller
{
    public function index(Request $request) {
        $author = User::all();

        $authorBooks = [];
        if ($request->filled('author')) {
            $authorBooks = Book::where('author_id', $request->author)->get();
        }

        return view('rating', [
            'title' => 'Input rating', 
            'authors' => $author,
            'books' => $authorBooks,
            'selectedAuthor' => $request->author
        ]);
    }

    public function inputRating(Request $request) {
        $request->validate([
            'author' => ['required', 'integer', Rule::exists('users', 'id')],

            'book' => ['required', 'integer', Rule::exists('books', 'id')->where(function ($query) use ($request) {
                if ($request->filled('author')) {
                    $query->where('author_id', $request->author);
                }
            })],

            'rating' => ['required', 'integer', 'min:1', 'max:10']
        ]);

         Rating::create([
            'author_id' => $request->author,
            'book_id'   => $request->book,
            'rating'    => $request->rating,
        ]);

        
        return redirect('/rating')->with('success', 'Rating berhasil disimpan!');

    }

    public function apiRating(Request $request) {
        $request->validate([
            'author' => ['required', 'integer', Rule::exists('users', 'id')],

            'book' => ['required', 'integer', Rule::exists('books', 'id')->where(function ($query) use ($request) {
                if ($request->filled('author')) {
                    $query->where('author_id', $request->author);
                }
            })],

            'rating' => ['required', 'integer', 'min:1', 'max:10']
        ]);

         $rating = Rating::create([
            'author_id' => $request->author,
            'book_id'   => $request->book,
            'rating'    => $request->rating,
        ]);

        
        return response()->json([
           'status' => 'success',
           'message' => 'Rating berhasil disimpan',
           'data' => $rating 
        ], 201);

    }
    
}

