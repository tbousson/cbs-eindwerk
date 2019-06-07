<?php

namespace App\Http\Controllers\v2;

use App\Comic;
use App\Author;
use App\Serie;
use App\Publisher;
use App\Genre;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Session;
class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::with('Author','Serie','Publisher','Genres')->get();
        $comicsTrashed = Comic::onlyTrashed()->with('Author','Serie','Publisher','Genres')->get();
        
        return view ('admin.v2.comics.index',compact('comics','comicsTrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comic = New Comic();
        $authors = Author::all();
        $series = Serie::all();
        $publishers = Publisher::all();
        $genres = Genre::all();
        return view('admin.v2.comics.create', compact('comic','authors','series','publishers','genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request, array(
            'title' => "required|min:5|unique:comics,title",
            'description'=>'required',
            'price'=>'required|numeric',
            'author_id'=>'required',
            'serie_id'=>'required',
            'publisher_id'=>'required',
            'publishyear' =>'required|max:2100|numeric',
            'stock' => 'required|numeric'
            
        ));
        
        $input = $request->all();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();//samenstelling bestandsnaam
            
            $file->storeAs('',$name,'photos');
            
            $image = "/storage/photos/".$name;

            $thumbnail = Image::make($file)->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();})->stream();
                
            $tname = 'thumbnail_'.$name;
            $tpath= '/storage/thumbnails/'.$tname;
            Storage::disk('thumbnails')->put($tname,$thumbnail);
            $photo= Photo::create([
                'url' => $image,
                'thumbnail' => $tpath
            ])->id;
            
            $input['photo_id'] = $photo;
            
        }
            
            
            
           

        
        $id = Comic::create($input)->id;
        $comic = Comic::findOrFail($id);
        $comic->genres()->attach($request->genres);
        return redirect()->route('comics.index')->with('success','Comic '.$comic->title.' has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        
        $authors = Author::all();
        $series = Serie::all();
        $publishers = Publisher::all();
        $genres = Genre::all();
        return view('admin.v2.comics.edit', compact('comic','authors','series','publishers','genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comic = Comic::withTrashed()->findOrFail($id);
        if($comic->deleted_at)
        {
            $message = [];
            $publisher= Publisher::withTrashed()->findOrFail($comic->publisher_id);
            $author= Author::withTrashed()->findOrFail($comic->author_id);
            $serie= Serie::withTrashed()->findOrFail($comic->serie_id);
            $pubrestore = $authrestore = $serrestore="";
            if($publisher->deleted_at || $author->deleted_at || $serie->deleted_at){
               if($publisher->deleted_at){
                   $pubrestore='Publisher: ['.$publisher->name.']  ';
                    $publisher->restore();   
               }
               if($author->deleted_at){
                $authrestore='Author: ['.$author->name.']  ';
                $author->restore();
                }
                if($serie->deleted_at){
                    $serrestore='Serie: ['.$serie->name.']  ';
                    $serie->restore();
                }
                $msg='Due to relations following have been restored...'.$pubrestore.$authrestore.$serrestore;
             Session::flash("warning",$msg);
            }
            $comic->restore();
            








            return redirect()->route('comics.index')->with('success','Comic '.$comic->title.' has been restored!');
        }
        $this->validate($request, array(
            'title' => "required|min:5|unique:comics,title,$comic->id",
            'description'=>'required',
            'price'=>'required|numeric',
            'author_id'=>'required',
            'serie_id'=>'required',
            'publisher_id'=>'required',
            'publishyear' =>'required|max:2100|numeric',
            'stock' => 'required|numeric'
            
       
        ));
        
        $input = $request->all();
        if($comic->photo_id === 0){
            if($file = $request->file('photo')){
                $name = time() . $file->getClientOriginalName();//samenstelling bestandsnaam
                $file->storeAs('',$name,'photos');
                $image = "/storage/photos/".$name;
                
                $thumbnail = Image::make($file)->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();})->stream();
                    
                $tname = 'thumbnail_'.$name;
                $tpath= '/storage/thumbnails/'.$tname;
                Storage::disk('thumbnails')->put($tname,$thumbnail);
                $photo= Photo::create([
                    'name' => $name,
                    'url' => $image,
                    'thumbnail' => $tpath
                ])->id;
                
                $input['photo_id'] = $photo;
        }
    }   
        elseif($file = $request->file('photo')){




            $name = time() . $file->getClientOriginalName();//samenstelling bestandsnaam
            
            $file->storeAs('',$name,'photos');
            
            $image = "storage/photos/".$name;
            
            $thumbnail = Image::make($file)->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();})->stream();
                $tname = 'thumbnail_'.$name;
            $tpath= "storage/thumbnails/".$tname;
            Storage::disk('thumbnails')->put($tname,$thumbnail);
            $photo = Photo::findOrFail($comic->photo_id);
            $oldphoto = $photo->name;
            $oldthumbnail = 'thumbnail_'.$oldphoto;
            $photo->update([
                'name' => $name,
                'url' => $image,
                'thumbnail' => $tpath
            ]);
            Storage::disk('photos')->delete($oldphoto);
            Storage::disk('thumbnails')->delete($oldthumbnail);
            $input['photo_id'] = $photo->id;
            
        }
        $comic->update($input);
        if(isset($request->genres)){
            $comic->genres()->sync($request->genres);
        }
        else {
            $comic->genres()->sync(array());
        }
        
        return redirect()->route('comics.index')->with('success','Comic '.$comic->title.' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $deleting = $comic->name;
        $comic->delete();
        return redirect()->route('comics.index')->with('error','Comic '.$deleting.' has been deleted!');
    }
}
