<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request) {
        $query = Book::withAvg('rating', 'rating')   // ambil rata-rata rating
        ->orderBy('rating_avg_rating', 'desc');   // urutkan dari tertinggi ke rendah
    
        // pencarian berdasarkan judul buku atau author
        if ($request->filled('keyword')) {
            $query->where('book name', 'like', '%' . $request->keyword . '%')
            ->orWhereHas('author', function ($a) use ($request){
                $a->where('name', 'like', '%' . $request->keyword . '%');
            });
        }
        $book = $query->paginate(10);
        return view('home', ['title' => 'Home', 'books' => $book]);
    }

    public function apiBook(Request $request) {
        $books = Book::withAvg('rating', 'rating')   // ambil rata-rata rating
        ->orderBy('rating_avg_rating', 'desc')->paginate(10);

        return response()->json([
            'status' => 'success',
            'data' => $books
        ]);
    }
}
