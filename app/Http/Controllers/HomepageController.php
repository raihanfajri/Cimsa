<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Activities;
use App\Catalogs;
use Hashids;

class HomepageController extends Controller
{
    public function index(Request $request) {
        $title = 'HOME';
        $articles = articles::orderBy('id','desc')->first();
        if(isset($articles)){
            $articles->image = $request->root()."/images/articles/".$articles->image;
            $articles->id = Hashids::encode($articles->id);
            }
        else{
            $articles = new articles;
            $articles->image = $request->root()."/img/No_image.png";
            $articles->title = "No Title";
            $articles->content = "No Content";
            $articles->id = "#";
        }
        $activities = activities::orderBy('id','desc')->first();
        if(isset($activities)) {
            $activities->image = $request->root()."/images/activities/".$activities->image;
            $activities->id = Hashids::encode($activities->id);
        }
        else{
            $activities = new activities;
            $activities->image = $request->root()."/img/No_image.png";
            $activities->title = "No Title";
            $activities->content = "No Content";
            $activities->id = "#";
        }
        $catalogs = catalogs::orderBy('id','desc')->first();
        if(isset($catalogs)) {
            $catalogs->image = $request->root()."/images/catalogs/".$catalogs->image;
            $catalogs->id = Hashids::encode($catalogs->id);
            }
        else{
            $catalogs = new catalogs;
            $catalogs->image = $request->root()."/img/No_image.png";
            $catalogs->name = "No Title";
            $catalogs->description = "No Content";
            $catalogs->id = "#";
        }
        return view('homepage')
        ->with(compact('title'))
        ->with(compact('articles'))
        ->with(compact('activities'))
        ->with(compact('catalogs'));
    }
}
