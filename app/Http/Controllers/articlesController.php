<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\articles;

class articlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = articles::all();
        return view('admin.pages.articles',['articles'=>$articles]);
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
        //Create new articles
        $articles = new articles;
        $articles->title = $request->title;
        $articles->author = $request->author;
        //Replace " with // and ' with ~~
        $request->content = $request->content->str_replace('\"','//');
        $request->content = $request->content->str_replace('\'','~~');
        $articles->content = $request->content;
        if ($request->hasFile('image')) 
        {
            $datetime = new DateTime();
            $file_name = 'articles_' + $datetime->format('YmdHis');
            $path = '~/public/images/articles/';
            $fullpath = $path + $file_name;
            $save = $request->image->storeAs('images',$fullpath);
            $articles->image = $fullpath;
        }
        $articles->save();
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
        $articles = articles::where('id',$id)->get();
        $articles->title = $request->title;
        $articles->author = $request->author;
        $articles->content = $request->content;
        if ($request->hasFile('image')) 
        {
            $datetime = new DateTime();
            $file_name = 'articles_' + $datetime->format('YmdHis');
            $path = '/images/articles/';
            $fullpath = $path + $file_name;
            $save = $request->image->storeAs('images',$fullpath);
            $articles->image = $fullpath;
        }
        $articles->save();
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
        $articles = articles::where('id',$id)->get();
        $articles->delete();
    }
}
