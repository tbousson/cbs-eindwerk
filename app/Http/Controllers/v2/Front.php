<?php

namespace App\Http\Controllers\v2;

use Illuminate\Http\Request;
use App\Author;
use App\Comic;
use App\Serie;
use App\Publisher;
use App\Genre;
use App\User;
class Front extends Controller
{   
    var $comics;
    var $authors;
    var $series;
    var $publishers;
    var $genres;
   
  

    public function __construct(){
        $this->comics = Comic::all();
        $this->authors = Author::orderBy('name','asc')->get();
        $this->series = Serie::orderBy('name','asc')->get();
        $this->publishers = Publisher::orderBy('name','asc')->get();
        $this->genres = Genre::all();
        
        
    }
    public function index()
    {
        $authors = Author::all();
        $comics = Comic::orderBy('id','desc')->get();
        return view('index', compact('authors','comics'));
    }
    public function shop()
    {
        $genres = genre::orderBy('name','asc')->get();
        $authors = Author::orderBy('name','asc')->get();
        $series = Serie::orderBy('name','asc')->get();
        $publishers = Publisher::orderBy('name','asc')->get();
        $comics = Comic::orderBy('publishyear','desc')->paginate(12);
        return view('shop', compact('authors','comics','series','publishers','genres'));
    }
    public function comics()
    {
        $genres = genre::orderBy('name','asc')->get();
        $authors = Author::orderBy('name','asc')->get();
        $series = Serie::orderBy('name','asc')->get();
        $publishers = Publisher::orderBy('name','asc')->get();
        $comics = Comic::inRandomOrder()->paginate(12);
        return view('comics', compact('authors','comics','series','publishers','genres'));
    }
    public function contact()
    {
       
        return view('contact');
    }
    public function about()
    {
       
        return view('about');
    }
    public function comic($id){
        $comic = Comic::findOrFail($id);
        return view('comic',array('comic' => $comic,'title'=>$comic->name,
            'description'=>$comic->description, 'page'=>'comics', 'publishername' => $comic->publisher->name,
            'authors'=>$this->authors,'series' => $this->series, 'genres' => $this->genres, 'publishers' => $this->publishers, 'comics'=>$this->comics ));
    }
    public function author($id){
        $genres = genre::orderBy('name','asc')->get();
        $authors = Author::orderBy('name','asc')->get();
        $series = Serie::orderBy('name','asc')->get();
        $publishers = Publisher::orderBy('name','asc')->get();
        $author = Author::findOrFail($id);
        $comics = Comic::where('author_id', '=', $id)->paginate(12);
        return view('author', compact('comics', 'author', 'authors', 'series', 'publishers', 'genres'));
    }
    public function serie($id){
        $genres = genre::orderBy('name','asc')->get();
        $authors = Author::orderBy('name','asc')->get();
        $series = Serie::orderBy('name','asc')->get();
        $publishers = Publisher::orderBy('name','asc')->get();
        $serie = Serie::findOrFail($id);
        $comics = Comic::where('serie_id', '=', $id)->paginate(12);
        return view('serie', compact('comics', 'serie', 'authors', 'series', 'publishers', 'genres'));
    }
    public function publisher($id){
        $genres = genre::orderBy('name','asc')->get();
        $authors = Author::orderBy('name','asc')->get();
        $series = Serie::orderBy('name','asc')->get();
        $publishers = Publisher::orderBy('name','asc')->get();
        $publisher = Publisher::findOrFail($id);
        $comics = Comic::where('publisher_id', '=', $id)->paginate(12);
        return view('publisher', compact('comics', 'publisher', 'authors', 'series', 'publishers', 'genres'));
    }
    public function genre($id){
        $genres = genre::orderBy('name','asc')->get();
        $authors = Author::orderBy('name','asc')->get();
        $series = Serie::orderBy('name','asc')->get();
        $publishers = Publisher::orderBy('name','asc')->get();
        $genre = genre::findOrFail($id);
        $comics = Comic::whereHas('genres', function($q) use ($id) {
            $q->where('id', $id);
         })->paginate(12);
        return view('genre', compact('comics', 'genre', 'authors', 'series', 'publishers', 'genres'));
    }
    public function profile($id){
        $user=User::findOrFail($id);
        $role=$user->role->name;
        return view('profile', compact('user','role'));
    }
    //Payment System
  
}
