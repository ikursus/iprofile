<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homePage() {
        return view('welcome');
    }

    public function contactPage() {
        return view('contactpage');
    }

    public function aboutPage() {
        return view('aboutpage');
    }
}
