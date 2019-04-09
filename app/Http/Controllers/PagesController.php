<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    //Controleur pour la gestion des pages
    public function index(){
        $posts = Post::All();
        return view('pages.index');
    }
    public function apropos(){
        return view('pages.apropos');
    }
    public function services(){
        return view('pages.services');
    }
}
