<?php

namespace App\Http\Controllers\v2;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contents = Storage::get('public/databaselog.txt');
        foreach (explode("\n", $contents) as $key=>$line){
            $array[$key] = explode('\n', $line);
        }
        
        return view('admin.v2.index',compact('array'));
    }
}
