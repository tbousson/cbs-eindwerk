<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $genresTrashed = Genre::onlyTrashed()->get();
        return view('admin.v2.genres.index', compact('genres','genresTrashed'));
    }
   
    public function create()
    {
        $genre = New Genre();
        return view('admin.v2.genres.create', compact('genre'));
    }
  
    public function store(Request $request)
    {
        $genre = Genre::create($this->validateRequest());
        return redirect()->route('genres.index')->with('success','Genre '.$genre->name.' has been created!');
    }
  
    public function show($id)
    {
        //
    }
    public function edit(Genre $genre)
    {
        return view('admin.v2.genres.edit', compact('genre'));
    }
 
    public function update(Request $request, $id)
    {
        $genre = Genre::withTrashed()->findOrFail($id);
        
        
        if($genre->deleted_at)
        {
            $genre->restore();
            return redirect()->route('genres.index')->with('success','Genre '.$genre->name.' has been restored!');
        }
        $this->validate($request, array(
            'name' => "required|min:2|unique:genres,name,$genre->id",
        ));
        $genre->update($request->all());
        return redirect()->route('genres.index')->with('success','Genre '.$genre->name.' has been updated!');
    }
 
    public function destroy(Genre $genre)
    {
        $deleting = $genre->name;
        $genre->delete();
        return redirect()->route('genres.index')->with('error','Genre '.$deleting.' has been deleted!');
    }
        private function validateRequest(){
           
        return request()->validate([
            'name' => 'required|min:2|unique:genres,name',
        ]);
        
    }

}
