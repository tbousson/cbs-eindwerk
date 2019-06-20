<?php

namespace App\Http\Controllers;

use App\Comic;
use App\Serie;
use Session;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index()
    {
        $series = Serie::all();
        $seriesTrashed = Serie::onlyTrashed()->get();
        
        return view('admin.v2.series.index', compact('series','seriesTrashed'));
    }
   
    public function create()
    {
        $serie = New Serie();
        return view('admin.v2.series.create', compact('serie'));
    }
  
    public function store(Request $request)
    {
        $serie=Serie::create($this->validateRequest());
        return redirect()->route('series.index')->with('success','Serie '.$serie->name.' has been created!');
    }
  
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $serie = Serie::findOrFail($id);
        return view('admin.v2.series.edit', compact('serie'));
    }
 
    public function update(Request $request, $id)
    {
        
        $serie = Serie::withTrashed()->findOrFail($id);
        
        
        if($serie->deleted_at)
        {
            $serie->restore();
            return redirect()->route('series.index')->with('success','Serie '.$serie->name.' has been restored!');
        }
        $this->validate($request, array(
            'name' => "required|min:2|unique:series,name,$serie->id",
        ));
        $serie->update($request->all());
        return redirect()->route('series.index')->with('success','Serie'.$serie->name.' has been updated!');
    }
 
    public function destroy($id)
    {
        $serie = Serie::findOrFail($id);
        $comics = Comic::where('serie_id',$serie->id)->get();
        $comicname="";
        if($comics->count()){
            foreach($comics as $comic ){
                $comicname=$comicname."[".$comic->title."] ";
                // $message[]=(object) array("action"=>"Relation","model"=>"comic","id"=>$comic->id,"name"=>$comic->title,'deleted by'=> $publisher->name);
                $comic->delete();
                
                
                
            }
            Session::flash("warning","Due to relations some Comics have been deleted! $comicname");
            }
        
        $deleting = $serie->name;
        $serie->delete();
        return redirect()->route('series.index')->with('error','Serie '.$deleting.' has been deleted!');
    }
    public function restore($id)
    {
        
        $serie = Serie::findOrFail($id);
        
        $serie->restore();
        return redirect()->route('series.index')->with('success','Serie '.$serie->name.' has been deleted!');
    }
        private function validateRequest(){
           
        return request()->validate([
            'name' => 'required|min:2|unique:series,name',
        ]);
        
    }
   
        
}
