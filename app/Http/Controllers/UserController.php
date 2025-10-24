<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {
        $author = User::withCount('ratings')
        ->orderBy('ratings_count', 'desc')
        ->take(10)
        ->get();

        return view('best-author', ['title' => 'Best Author', 'authors' => $author]);
    }

    public function apiBestAuthor(Request $request) {
        $author = User::withCount('ratings')
        ->orderBy('ratings_count', 'desc')
        ->take(10)
        ->get();

        return response()->json([
            'status' => 'success',
            'data' => $author
        ]);
        
    }
}

