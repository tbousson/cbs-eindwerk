<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Comic;
use App\Serie;
use App\Publisher;
class Front extends Controller
{
    public function index()
    {
        $authors = Author::all();
        $comics = Comic::orderBy('id','desc')->get();
        return view('index', compact('authors','comics'));
    }
    public function shop()
    {
        $authors = Author::orderBy('name','asc')->get();
        $series = Serie::orderBy('name','asc')->get();
        $publishers = Publisher::orderBy('name','asc')->get();
        $comics = Comic::orderBy('id','desc')->get();
        return view('shop', compact('authors','comics','series','publishers'));
    }
    public function contact()
    {
       
        return view('contact');
    }
    public function about()
    {
       
        return view('about');
    }
    
}
