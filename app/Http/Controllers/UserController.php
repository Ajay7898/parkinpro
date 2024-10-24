<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Book};
use Auth;

class UserController extends Controller 
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $books = Book::with(['author', 'category'])
            ->when($query, function ($queryBuilder) use ($query) 
            {
                return $queryBuilder->where('title', 'like', '%' . $query . '%')
                    ->orWhereHas('author', function ($queryBuilder) use ($query) 
                    {
                        $queryBuilder->where('name', 'like', '%' . $query . '%');
                    })
                    ->orWhereHas('category', function ($queryBuilder) use ($query) 
                    {
                        $queryBuilder->where('name', 'like', '%' . $query . '%');
                    });
            })
            ->get();
        return view('user.dashboard',compact('books','query')); 
    }

    public function borrow($bookId)
    {
        $book = Book::findOrFail($bookId);
        $user = Auth::user();

        $user->books()->attach($book->id);

        return redirect()->back()->with('success', 'Book borrowed successfully');
    }

    public function return($bookId)
    {
        $user = Auth::user();
        $user->books()->updateExistingPivot($bookId, ['returned_at' => now()]);

        return redirect()->back()->with('success', 'Book returned successfully');
    }

    public function booksByAuthour($authorId)
    {
        $books = Book::where('author_id', $authorId)->with('author', 'category')->get();
        return view('author.author_books', compact('books'));
    }

    public function booksByCategory($categoryId)
    {
        $books = Book::where('category_id', $categoryId)->with('author', 'category')->get();
        return view('category.category_books', compact('books'));
    }

        public function borrowedBooks()
    {
        $user = Auth::user();
        $books = $user->books()->with('author', 'category')->get();
        return view('user.books_borrowed', compact('books'));
    }

    public function borrowingHistory($bookId)
    {
        $book = Book::with('users')->findOrFail($bookId);
        return view('books.borrowed_history', compact('book'));
    }
}
