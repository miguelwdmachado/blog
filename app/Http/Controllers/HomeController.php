<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postagem;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Postagem::paginate(5);
        return view('welcome')
            ->with('posts',$posts);
    }

    public function posts()
    {
        $posts = Postagem::paginate(5);
        return view('welcome')
            ->with('posts',$posts);
    }
}
