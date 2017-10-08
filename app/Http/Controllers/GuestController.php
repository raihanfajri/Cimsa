<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;
use App\Alumniofthemonth;
use App\Articles;
use App\Activities;
use App\Catalogs;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Hashids;

class GuestController extends Controller
{
    public function showArticles() {
        $data = [
            'title' => 'ARTICLES'
        ];
        $articles = articles::orderBy('updated_at','desc')->paginate(3);
        foreach($articles as $article){
            $article->id = Hashids::encode($article->id);
        }
        return view('articles')->with(compact('data'))->with(compact('articles'));
    }

    public function showArticlesDetail($id) {
        $id = Hashid::decode($id);
        $articles = articles::find($id[0]);
        $recentpost = articles::orderBy('updated_at','desc')->paginate(5);
        if(empty($articles)){
            abort(404);
        }
        return view('articles-detail')
            ->with(compact('articles'))
            ->with(compact('recentpost'));
    
    }

    public function showActivities() {
        $data = [
            'title' => 'ACTIVITIES'
        ];
        $activities = activities::orderBy('updated_at','desc')->paginate(3);
        foreach($activities as $activity){
            $activity->id = Hashids::encode($activity->id);
        }
        return view('activities', compact('data'))->with(compact('activities'));
    }

    public function showActivityDetail($id) {
        $id = Hashid::decode($id);
        $activities = activities::find($id[0]);
        $recentpost = activities::orderBy('updated_at','desc')->paginate(5);
        if(empty($activities)){
            abort(404);
        }
        return view('activity-detail')
            ->with(compact('activities'))
            ->with(compact('recentpost')); 
    }

    public function showStandingCommittees() {
        $title = 'STANDING COMMITTEES';
        return view('standing-committees', compact('title'));
    }

    public function showCatalogs() {
        setlocale(LC_MONETARY, 'id_ID');
        $title = 'CATALOGS';
        $catalogs = catalogs::orderBy('updated_at','desc')->paginate(6);
        foreach($catalogs as $catalog){
            $catalog->price = number_format($catalog->price,0,'','.');
        }
        return view('catalogs', compact('title'))->with(compact('catalogs'));;
    }

    public function showAlumni(Request $request, Builder $htmlBuilder){
        $alumni = alumni::select(['nama','sco','batch','image'])->paginate(10);
        return view('about.alumni.alumni-directory')->with(compact('alumni'));
    }

    public function showAlumniOfTheMonth()
    {
        $alumniotm = alumniofthemonth::first();
        $alumni = alumni::find($alumniotm->id_alumni);
        return view('about.alumni.alumni-otm')->with(compact('alumni'))->with(compact('alumniotm'));
    }
}
