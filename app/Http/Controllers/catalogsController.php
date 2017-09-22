<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\catalogs;

class catalogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Number of item per page
        if($request->has('entries')){
            $entries = $request->input('entries');
        }
        else{
            $entries = 10;
        }
        //Search item
        if($request->has('search')){
            $search = $request->input('search');
        }
        else{
            $search = '';
        }
        $catalogs = catalogs::where('name','like','%'+$search+'%')
                    ->orwhere('description','like','%'+$search+'%')
                    ->paginate($entries);
        return view('admin.pages.catalogs',$catalogs);
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
        //Create new catalog
        $user = auth()->user();
        $catalogs = new catalogs;
        $catalogs->name = $request->name;
        $catalogs->price = $request->price;
        //Replace " with // and ' with ~~
        $request->description = $request->description->str_replace('\"','//');
        $request->description = $request->description->str_replace('\'','~~');
        $catalogs->description = $request->description;
        if ($request->hasFile('image')) 
        {
            $datetime = new DateTime();
            $file_name = 'catalogs_' + $datetime->format('YmdHis');
            $path = '~/public/images/catalogs/';
            $fullpath = $path + $file_name;
            $save = $request->image->storeAs('images',$fullpath);
            $catalogs->image = $fullpath;
        }
        $catalogs->save();
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
