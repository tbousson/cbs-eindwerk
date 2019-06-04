<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index()
    {
        $series = Serie::all();
        return view('admin.series.index', compact('series'));
    }
   
    public function create()
    {
        $serie = New Serie();
        return view('admin.series.create', compact('serie'));
    }
  
    public function store(Request $request)
    {
        Serie::create($this->validateRequest());
        return redirect()->route('series.index')->with('success','Serie has been created!');
    }
  
    public function show($id)
    {
        //
    }
    public function edit(Serie $serie)
    {
        return view('admin.series.edit', compact('serie'));
    }
 
    public function update(Request $request, Serie $serie)
    {
        $this->validate($request, array(
            'name' => "required|min:2|unique:series,name,$serie->id",
        ));
        $serie->update($request->all());
        return redirect()->route('series.index')->with('success','Serie has been updated!');
    }
 
    public function destroy(Serie $serie)
    {
        $serie->delete();
        return redirect()->route('series.index')->with('error','Serie has been deleted!');
    }
        private function validateRequest(){
           
        return request()->validate([
            'name' => 'required|min:2|unique:series,name',
        ]);
        
    }
}
