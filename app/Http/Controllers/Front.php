<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Braintree;
use App\Author;
use App\Comic;
use App\Serie;
use App\Publisher;
use App\Genre;
use App\User;
use Auth;
use Redirect;
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
        $comics = Comic::with('photo')->orderBy('id','desc')->get();
        return view('index', compact('authors','comics'));
    }
    public function shop()
    {
        $genres = genre::orderBy('name','asc')->get();
        $authors = Author::orderBy('name','asc')->get();
        $series = Serie::orderBy('name','asc')->get();
        $publishers = Publisher::orderBy('name','asc')->get();
        $comics = Comic::with('photo')->orderBy('publishyear','desc')->paginate(12);
        return view('shop', compact('authors','comics','series','publishers','genres'));
    }
    public function comics()
    {
        $genres = genre::orderBy('name','asc')->get();
        $authors = Author::orderBy('name','asc')->get();
        $series = Serie::orderBy('name','asc')->get();
        $publishers = Publisher::orderBy('name','asc')->get();
        $comics = Comic::with('photo')->inRandomOrder()->paginate(12);
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
        $comic = Comic::with('photo')->findOrFail($id);
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
        $comics = Comic::with('photo')->where('author_id', '=', $id)->paginate(12);
        return view('author', compact('comics', 'author', 'authors', 'series', 'publishers', 'genres'));
    }
    public function serie($id){
        $genres = genre::orderBy('name','asc')->get();
        $authors = Author::orderBy('name','asc')->get();
        $series = Serie::orderBy('name','asc')->get();
        $publishers = Publisher::orderBy('name','asc')->get();
        $serie = Serie::findOrFail($id);
        $comics = Comic::with('photo')->where('serie_id', '=', $id)->paginate(12);
        return view('serie', compact('comics', 'serie', 'authors', 'series', 'publishers', 'genres'));
    }
    public function publisher($id){
        $genres = genre::orderBy('name','asc')->get();
        $authors = Author::orderBy('name','asc')->get();
        $series = Serie::orderBy('name','asc')->get();
        $publishers = Publisher::orderBy('name','asc')->get();
        $publisher = Publisher::findOrFail($id);
        $comics = Comic::with('photo')->where('publisher_id', '=', $id)->paginate(12);
        return view('publisher', compact('comics', 'publisher', 'authors', 'series', 'publishers', 'genres'));
    }
    public function genre($id){
        $genres = genre::orderBy('name','asc')->get();
        $authors = Author::orderBy('name','asc')->get();
        $series = Serie::orderBy('name','asc')->get();
        $publishers = Publisher::orderBy('name','asc')->get();
        $genre = genre::findOrFail($id);
        $comics = Comic::with('photo')->whereHas('genres', function($q) use ($id) {
            $q->where('id', $id);
         })->paginate(12);
        return view('genre', compact('comics', 'genre', 'authors', 'series', 'publishers', 'genres'));
    }
    public function profile($id){
        if(Auth::user()->id == $id) {
        $user=User::findOrFail($id);
        $role=$user->role->name;
        return view('profile', compact('user','role'));
        }
        return redirect('/');
    }
    public function cart(){
        
        if(Request::isMethod('post')){
            $comic_id = Request::get('comic_id');
            
            $comic = Comic::find($comic_id);
           
            Cart::add(array('id' => $comic_id, 'weight'=> 0,'name' => $comic->title, 'qty' => 1, 'price' => $comic->price, ['image' => $comic->photo->thumbnail]));
            
        }
        $cart = Cart::content();
        // $test = $cart;
        // foreach($test as $item => $key){
        //     $id = $key->id;
            
        //     $photo = Comic::where('id','=',$id)->first()->photo_id;
            
        //     $key->push('photo',$photo);
        // }
        // // $comics = Comic::whereIn('id',$ids);
        // dd($test);
        //increment
        if (Request::get('comic_id') && (Request::get('increment')) == 1) {
            $item = Cart::search(
                function($key, $value) {
                    return $key->id == Request::get('comic_id');
                })->first();
            Cart::update($item->rowId, $item->qty + 1);
        }

        if (Request::get('comic_id') && (Request::get('decrease')) == 1) {
            $item = Cart::search(function($key, $value) { return $key->id == Request::get('comic_id'); })->first();
            Cart::update($item->rowId, $item->qty - 1);
        }

               //delete item
        if (Request::get('comic_id') && (Request::get('delete')) == 1) {
            $item = Cart::search(function($key, $value) { return $key->id == Request::get('comic_id'); })->first();
            Cart::remove($item->rowId);
        }


        //return view('cart',array('cart' => $cart, 'title' => 'Welcome', 'description' => 'lorem','page'=>'home'));
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $token = $gateway->ClientToken()->generate();
        return view('cart',compact('token','cart','comics')
        );
    }

    public function clear_cart(){
        Cart::destroy();
        return Redirect::away('cart');
    }
    
}
