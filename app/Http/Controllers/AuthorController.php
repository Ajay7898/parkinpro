<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Book,User,Author,Category};
use Auth;

class AuthorController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $authors = Author::get();
        return view('author.index', compact('authors'));
    } 

    public function create() 
    {
        return view('author.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required', 
        ]);
        Author::create($request->all());
        return redirect()->route('author.index');
    }

    public function edit($id) 
    {
        $author = Author::find($id);
        return view('author.edit', compact('author'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $book = Author::findOrFail($id);
    
        $book->update([
            'name' => $request->name,
        ]);
    
        return redirect()->route('author.index')->with('success', 'Author updated successfully.');
    }


    public function destroy($id)
    {
        $book = Author::where('id',$id)->delete();
        return redirect()->route('author.index')->with('success', 'Author deleted successfully.');
    }
}
