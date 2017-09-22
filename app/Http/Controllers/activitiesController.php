<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\activities;

class activitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $activities = activities::paginate(10);
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
        $user = auth()->user();
        $activities = new activities;
        $activities->title = $request->title;
        $activities->author = $request->author;
        //Replace " with // and ' with ~~
        $request->content = $request->content->str_replace('\"','//');
        $request->content = $request->content->str_replace('\'','~~');
        $activities->content = $request->content;
        if ($request->hasFile('image')) 
        {
            $datetime = new DateTime();
            $file_name = 'activities_' + $datetime->format('YmdHis');
            $path = '~/public/images/activities/';
            $fullpath = $path + $file_name;
            $save = $request->image->storeAs('images',$fullpath);
            $activities->image = $fullpath;
        }
        $activities->save();
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
    public function edit($id)
    {
        //
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
        $activities = activities::find($id);
        $activities->title = $request->title;
        $activities->author = $request->author;
        //Replace " with // and ' with ~~
        $request->content = $request->content->str_replace('\"','//');
        $request->content = $request->content->str_replace('\'','~~');
        $activities->content = $request->content;
        if ($request->hasFile('image')) 
        {
            $datetime = new DateTime();
            $file_name = 'activities_' + $datetime->format('YmdHis');
            $path = '~/public/images/activities/';
            $fullpath = $path + $file_name;
            $save = $request->image->storeAs('images',$fullpath);
            $activities->image = $fullpath;
        }
        $activities->save();
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
    }
}
