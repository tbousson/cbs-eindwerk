<?php

namespace App\Http\Controllers\v2;

use App\Publisher;
use App\Comic;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();
        $publishersTrashed = Publisher::onlyTrashed()->get();
        return view('admin.v2.publishers.index', compact('publishers','publishersTrashed'));
    }
   
    public function create()
    {
        $publisher = New Publisher();
        return view('admin.v2.publishers.create', compact('publisher'));
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
        return view('admin.v2.publishers.edit', compact('publisher'));
    }
 
    public function update(Request $request, $id)
    {
        $publisher = Publisher::withTrashed()->findOrFail($id);
        
        
        if($publisher->deleted_at)
        {
            $publisher->restore();
            return redirect()->route('publishers.index')->with('success','Publisher '.$publisher->name.' has been restored!');
        }
        $this->validate($request, array(
            'name' => "required|min:2|unique:publishers,name,$publisher->id",
        ));
        $publisher->update($request->all());
        return redirect()->route('publishers.index')->with('success','Publisher has been updated!');
    }
 
    public function destroy(Publisher $publisher)
    {
        $comics = Comic::where('publisher_id',$publisher->id)->delete();
        
        $publisher->delete();
        return redirect()->route('publishers.index')->with('error','Publisher has been deleted!');
    }
        private function validateRequest(){
           
        return request()->validate([
            'name' => 'required|min:2|unique:publishers,name',
        ]);
        
    }

}
