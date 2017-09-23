<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() {
        $title = 'HOME';
        return view('homepage')->with(compact('title'));
    }
}
