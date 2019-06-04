<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('admin.authors.index', compact('authors'));
    }
   
    public function create()
    {
        $author = New Author();
        return view('admin.authors.create', compact('author'));
    }
  
    public function store(Request $request)
    {
        Author::create($this->validateRequest());
        return redirect()->route('authors.index')->with('success','Author has been created!');
    }
  
    public function show($id)
    {
        //
    }
    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }
 
    public function update(Request $request, Author $author)
    {
        $this->validate($request, array(
            'name' => "required|min:2|unique:authors,name,$author->id",
        ));
        $author->update($request->all());
        return redirect()->route('authors.index')->with('success','Author has been updated!');
    }
 
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('error','Author has been deleted!');
    }
        private function validateRequest(){
           
        return request()->validate([
            'name' => 'required|min:2|unique:authors,name',
        ]);
        
    }

}
