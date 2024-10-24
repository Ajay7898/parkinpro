<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Book,User,Author,Category};
use Auth;

class CategoryController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $categories = Category::get();
        return view('category.index', compact('categories'));
    } 

    public function create() 
    {
        return view('category.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required', 
        ]);
        Category::create($request->all());
        return redirect()->route('category.index');
    }

    public function edit($id) 
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $book = Category::findOrFail($id);
    
        $book->update([
            'name' => $request->name,
        ]);
    
        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }


    public function destroy($id)
    {
        $book = Category::where('id',$id)->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }

}
