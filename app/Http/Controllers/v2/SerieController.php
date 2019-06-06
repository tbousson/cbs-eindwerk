<?php

namespace App\Http\Controllers\v2;

use App\Comic;
use App\Serie;
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
        Serie::create($this->validateRequest());
        return redirect()->route('series.index')->with('success','Serie has been created!');
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
        return redirect()->route('series.index')->with('success','Serie has been updated!');
    }
 
    public function destroy($id)
    {
        $serie = Serie::findOrFail($id);
        $comicmessages = Comic::where('serie_id',$serie->id)->get();
        
        foreach($comicmessages as $comic){
            response()->json(['error'=>'Comic '.$comic->title.' has been  deleted!']);
        }
        $comics = Comic::where('serie_id',$serie->id)->delete();
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
