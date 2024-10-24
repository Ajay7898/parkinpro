<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Book,User,Author,Category};
use Auth;

class AdminController extends Controller 
{
    public function index()
    {
        $books = Book::with(['author', 'category'])->get();
        return view('admin.dashboard', compact('books'));
    } 

    public function create() 
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.create', compact('authors', 'categories'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'title' => 'required', 
            'description' => 'required',
            'author_id' => 'required', 
            'category_id' => 'required'
        ]);
        Book::create($request->all());
        return redirect()->route('home.admin');
    }

    public function edit($id) 
    {
        $authors = Author::all();
        $categories = Category::all(); 
        $book = Book::with('author')->with('category')->find($id);
        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required', 
            'description' => 'required',
            'author_id' => 'required', 
            'category_id' => 'required'
        ]);

        $book = Book::findOrFail($id);
    
        $book->update([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);
    
        return redirect()->route('home.admin')->with('success', 'Book updated successfully.');
    }


    public function destroy($id)
    {
        $book = Book::where('id',$id)->delete();
        return redirect()->route('home.admin')->with('success', 'Book deleted successfully.');
    }
}
