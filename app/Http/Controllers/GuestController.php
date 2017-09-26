<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function showArticles() {
        $data = [
            'title' => 'ARTICLES',
            'id' => '2'
        ];
        return view('articles')->with(compact('data'));
    }

    public function showArticlesDetail() {
        return view('articles-detail');
    }

    public function showActivities() {
        $data = [
            'title' => 'ACTIVITIES',
            'id' => '2'
        ];
        return view('activities', compact('data'));
    }

    public function showActivityDetail() {
        return view('activity-detail'); 
    }

    public function showStandingCommittees() {
        $title = 'STANDING COMMITTEES';
        return view('standing-committees', compact('title'));
    }

    public function showCatalogs() {
        $title = 'CATALOGS';
        return view('catalogs', compact('title'));
    }
}
