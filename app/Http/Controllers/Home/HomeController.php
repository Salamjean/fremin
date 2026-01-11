<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home.accueil');
    }
    public function about()
    {
        return view('home.pages.presentation');
    }

    public function actuality()
    {
        return view('home.pages.actuality');
    }

    public function publication()
    {
        return view('home.pages.publication');
    }

    public function program()
    {
        return view('home.pages.program');
    }

    public function contact()
    {
        return view('home.pages.contact');
    }
}
