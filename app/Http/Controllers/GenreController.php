<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genres.index', compact('genres'));
    }
   
    public function create()
    {
        $genre = New Genre();
        return view('admin.genres.create', compact('genre'));
    }
  
    public function store(Request $request)
    {
        Genre::create($this->validateRequest());
        return redirect()->route('genres.index')->with('success','Genre has been created!');
    }
  
    public function show($id)
    {
        //
    }
    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'));
    }
 
    public function update(Request $request, Genre $genre)
    {
        $this->validate($request, array(
            'name' => "required|min:2|unique:genres,name,$genre->id",
        ));
        $genre->update($request->all());
        return redirect()->route('genres.index')->with('success','Genre has been updated!');
    }
 
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index')->with('error','Genre has been deleted!');
    }
        private function validateRequest(){
           
        return request()->validate([
            'name' => 'required|min:2|unique:genres,name',
        ]);
        
    }

}
