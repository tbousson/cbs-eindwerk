<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
class Front extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('index', compact('authors'));
    }
}
