<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;
use App\Articles;
use App\Activities;
use App\Catalogs;
use DataTables;
use Yajra\DataTables\Html\Builder;

class GuestController extends Controller
{
    public function showArticles() {
        $data = [
            'title' => 'ARTICLES'
        ];
        $articles = articles::orderBy('updated_at','desc')->paginate(3);
        return view('articles')->with(compact('data'))->with(compact('articles'));
    }

    public function showArticlesDetail($id) {
        $articles = articles::find($id);
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
        return view('activities', compact('data'))->with(compact('activities'));
    }

    public function showActivityDetail($id) {
        $activities = activities::find($id);
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
        if($request->ajax()) {
            $alumni = alumni::select(['id','nama','sco','batch','image']);
            return Datatables::of($alumni)->toJson();
        }
        $path = $request->root()."/images/Alumni/";
        $html = $htmlBuilder
                ->Columns([['data'=>'nama', 'name'=>'nama', 'title'=>'Nama'],
                    ['data'=>'sco', 'name'=>'sco', 'title'=>'SCO'],
                    ['data'=>'batch', 'name'=>'batch', 'title'=>'Batch'],
                    ['data'=>'image', 'name'=>'image', 'title'=>'Foto', 
                    'render' => '"<img src=\"'.$path.'"+data+"\" height=\"130px\" width=\"140px\"/>"']]);
        return view('about.alumni.alumni-directory')->with(compact('html'));
    }
}
