<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use App\User;
use App\activities;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Hashids;

class activitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        if($request->ajax()) {
            $activities = activities::select(['id','title','updated_at','author']);
            return Datatables::of($activities)
                ->addColumn('action', function($activities){
                    return view('datatables._action', [
                        'model'=>$activities,
                        'id'=>Hashids::encode($activities->id),
                        'form_url'=>'admin/activities/destroy/'.Hashids::encode($activities->id),
                        'confirm_message'=>'Yakin ingin menghapus '.$activities->title.' ?'
                    ]);
                })
                ->editColumn('updated_at', function ($activities) {
                    return $activities->updated_at->format('d F Y');
                })
                ->toJson();
        }
        $html = $htmlBuilder
                ->Columns([['data'=>'title', 'name'=>'title', 'title'=>'Title'],
                    ['data'=>'updated_at', 'name'=>'updated_at', 'title'=>'Date'],
                    ['data'=>'author', 'name'=>'author', 'title'=>'Author'],
                    ['data'=>'action', 'name'=>'action', 'title'=>'Action', 
                'orderable'=>'false', 'searchable'=>'false']]);
        return view('admin.pages.activities');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create new activities
        $activities = new activities;
        $activities->title = $request->title;
        $activities->author = $request->author;
        $activities->content = $request->content;
        if ($request->hasFile('inputfreqd')) 
        {
            $uploaded_img = $request->file('inputfreqd');
            $extension = $uploaded_img[0]->getClientOriginalExtension();
            $filename = md5(time()).'.'.$extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'activities';
            $uploaded_img[0]->move($destinationPath, $filename);
            $activities->image = $filename;
        }
        else{
            
            Log::info($request->all());
        }
        $activities->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
        if($request->ajax())
        {
            $id = Hashids::decode($id);
            $activities = activities::find($id[0]);
            $activities->image = '/images/activities/' . $activities->image;
            $previewimage = View::make('layouts._imgpreview', [
                            'image'=>$activities->image,
                            'name'=>$activities->title
                            ]);
            $previewimage = (string) $previewimage;
            return response()->json(['data'=>$activities,'imgpreview'=>$previewimage]);
        }
        else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $id = Hashids::decode($id);
        $activities = activities::find($id[0]);
        $activities->title = $request->edittitle;
        $activities->author = $request->editauthor;
        $activities->content = $request->editcontent;
        $imgname = $activities->image;
        if ($request->hasFile('inputfreqd')) 
        {        
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'activities';
            $fullpath = $destinationPath . DIRECTORY_SEPARATOR . $imgname;
            try
            {
                File::delete($fullpath);
            }
            catch(FileNotFoundException $e)
            {
                Log::info("File Not Found");
                return redirect()->back();   
            }
            $uploaded_img = $request->file('inputfreqd');
            $extension = $uploaded_img[0]->getClientOriginalExtension();
            $filename = md5(time()).'.'.$extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'activities';
            $uploaded_img[0]->move($destinationPath, $filename);
            $activities->image = $filename;
        }
        else{
            
            Log::info($request);
        }
        $activities->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $id = Hashids::decode($id);
        $activities = activities::find($id[0]);
        $imgname = $activities->image;
        if($activities->delete())
        {
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'activities';
            $fullpath = $destinationPath . DIRECTORY_SEPARATOR . $imgname;
            try
            {
                File::delete($fullpath);
            }
            catch(FileNotFoundException $e)
            {
                Log::info($e);   
            }
        }
        $completemessage = 'Activity has been deleted';
        return redirect()->back()->with('completemessage',$completemessage);
    }
}
