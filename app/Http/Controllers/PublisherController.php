<?php

namespace App\Http\Controllers;

use App\Publisher;
use App\Comic;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;

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
        $publisher=Publisher::create($this->validateRequest());
        return redirect()->route('publishers.index')->with('success','Publisher '.$publisher->name.' has been created!');
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
        return redirect()->route('publishers.index')->with('success','Publisher '.$publisher->name.' has been updated!');
    }
 
    public function destroy(Publisher $publisher)
    {
        $comicname="";
        $comics = Comic::where('publisher_id',$publisher->id)->get();
        if($comics->count()){
        foreach($comics as $comic ){
            $comicname=$comicname."[".$comic->title."] ";
            // $message[]=(object) array("action"=>"Relation","model"=>"comic","id"=>$comic->id,"name"=>$comic->title,'deleted by'=> $publisher->name);
            $comic->delete();
            
            
            
        }
        Session::flash("warning","Due to relations some Comics have been deleted! $comicname");
        }
        // if($message){
        // $data = json_encode($message);
        // }
        $publisher->delete();

        // $delete[]=(object) array("action"=>"Delete","model"=>"publisher","id"=>$publisher->id,"name"=>$publisher->name,'deleted by'=> 'users');
        // $delete=json_encode($delete);
        // Storage::append('public/databaselog.txt',$delete);
        // Storage::append('public/databaselog.txt',$data);

        return redirect()->route('publishers.index')->with('error',"Publisher $publisher->name has been deleted!");
    }
        private function validateRequest(){
           
        return request()->validate([
            'name' => 'required|min:2|unique:publishers,name',
        ]);
        
    }

}
