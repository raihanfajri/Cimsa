<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use App\User;
use App\articles;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Hashids;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $htmlBuilder)
    {
        return view('admin.pages.articles');
    }
    public function datatablesRequest(Request $request)
    {
        if($request->ajax()) {
            $articles = articles::select(['id','title','updated_at','author']);
            return Datatables::of($articles)
                ->addColumn('action', function($articles){
                    return view('datatables._action', [
                        'model'=>$articles,
                        'id'=>Hashids::encode($articles->id),
                        'form_url'=>'admin/articles/destroy/'.Hashids::encode($articles->id),
                        'confirm_message'=>'Yakin ingin menghapus '.$articles->title.' ?'
                    ]);
                })
                ->editColumn('updated_at', function ($articles) {
                    return $articles->updated_at->format('d F Y');
                })
                ->toJson();
        }
        else{
            abort(404);
        }
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
        $articles->content = $request->content;
        if ($request->hasFile('inputfreqd')) 
        {
            $uploaded_img = $request->file('inputfreqd');
            $extension = $uploaded_img[0]->getClientOriginalExtension();
            $filename = md5(time()).'.'.$extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'articles';
            $uploaded_img[0]->move($destinationPath, $filename);
            $articles->image = $filename;
        }
        else{
            
            Log::info($request->all());
        }
        $articles->save();
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
            $articles = articles::find($id[0]);
            $articles->image = '/images/articles/' . $articles->image;
            $previewimage = View::make('layouts._imgpreview', [
                            'image'=>$articles->image,
                            'name'=>$articles->title
                            ]);
            $previewimage = (string) $previewimage;
            return response()->json(['data'=>$articles,'imgpreview'=>$previewimage]);
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
        $articles = articles::find($id[0]);
        $articles->title = $request->edittitle;
        $articles->author = $request->editauthor;
        $articles->content = $request->editcontent;
        $imgname = $articles->image;
        if ($request->hasFile('inputfreqd')) 
        {        
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'articles';
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
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'articles';
            $uploaded_img[0]->move($destinationPath, $filename);
            $articles->image = $filename;
        }
        else{
            
            Log::info($request);
        }
        $articles->save();
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
        //Delete item
        $id = Hashids::decode($id);
        $articles = articles::find($id[0]);
        $imgname = $articles->image;
        if($articles->delete())
        {
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'articles';
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
        $completemessage = 'Articles has been deleted';
        return redirect()->back()->with('completemessage',$completemessage);
    }
}
