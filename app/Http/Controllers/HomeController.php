<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tree as Tree;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $treeModel = new Tree();
        $categories = $treeModel->getTree();
        return view('home', ['categories' => $categories]);
    }
}
