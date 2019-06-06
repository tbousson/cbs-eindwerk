<?php

namespace App\Http\Controllers\v2;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        $authorsTrashed = Author::onlyTrashed()->get();
        return view('admin.v2.authors.index', compact('authors','authorsTrashed'));
    }
   
    public function create()
    {
        $author = New Author();
        return view('admin.v2.authors.create', compact('author'));
    }
  
    public function store(Request $request)
    {
        Author::create($this->validateRequest());
        return redirect()->route('authors.index')->with('success','Author '.$author->name.' has been created!');
    }
  
    public function show($id)
    {
        //
    }
    public function edit(Author $author)
    {
        return view('admin.v2.authors.edit', compact('author'));
    }
 
    public function update(Request $request, $id)
    {
        $author = Author::withTrashed()->findOrFail($id);
        
        
        if($author->deleted_at)
        {
            $author->restore();
            return redirect()->route('authors.index')->with('success','Author '.$author->name.' has been restored!');
        }
        $this->validate($request, array(
            'name' => "required|min:2|unique:authors,name,$author->id",
        ));
        $author->update($request->all());
        return redirect()->route('authors.index')->with('success','Author '.$author->name.' has been updated!');
    }
 
    public function destroy(Author $author)
    {
        $deleting = $author->name;
        $author->delete();
        return redirect()->route('authors.index')->with('error','Author '.$deleting.' has been deleted!');
    }
        private function validateRequest(){
           
        return request()->validate([
            'name' => 'required|min:2|unique:authors,name',
        ]);
        
    }

}
