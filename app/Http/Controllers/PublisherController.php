<?php

namespace App\Http\Controllers;

use App\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();
        return view('admin.publishers.index', compact('publishers'));
    }
   
    public function create()
    {
        $publisher = New Publisher();
        return view('admin.publishers.create', compact('publisher'));
    }
  
    public function store(Request $request)
    {
        Publisher::create($this->validateRequest());
        return redirect()->route('publishers.index')->with('success','Publisher has been created!');
    }
  
    public function show($id)
    {
        //
    }
    public function edit(Publisher $publisher)
    {
        return view('admin.publishers.edit', compact('publisher'));
    }
 
    public function update(Request $request, Publisher $publisher)
    {
        $this->validate($request, array(
            'name' => "required|min:2|unique:publishers,name,$publisher->id",
        ));
        $publisher->update($request->all());
        return redirect()->route('publishers.index')->with('success','Publisher has been updated!');
    }
 
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->route('publishers.index')->with('error','Publisher has been deleted!');
    }
        private function validateRequest(){
           
        return request()->validate([
            'name' => 'required|min:2|unique:publishers,name',
        ]);
        
    }

}
