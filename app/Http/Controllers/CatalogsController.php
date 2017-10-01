<?php

namespace App\Http\Controllers;

use App\catalogs;
use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use DataTables;
use Yajra\DataTables\Html\Builder;

class catalogsController extends Controller
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
            $catalogs = catalogs::select(['id','name','price','image','description']);
            return Datatables::of($catalogs)
                ->addColumn('action', function($catalogs){
                    return view('datatables._action', [
                        'model'=>$catalogs,
                        'id'=>$catalogs->id,
                        'form_url'=>'admin/catalogs/destroy/'.$catalogs->id,
                        'confirm_message'=>'Yakin ingin menghapus '.$catalogs->title.' ?'
                    ]);
                })
                ->toJson();
        }
        $path = $request->root()."/images/catalogs/";
        $html = $htmlBuilder
                ->Columns([['data'=>'name', 'name'=>'name', 'title'=>'Title'],
                    ['data'=>'price', 'name'=>'price', 'title'=>'Price','type' => 'num-fmt'],
                    ['data'=>'image', 'name'=>'image', 'title'=>'Image', 'render' => '"<img src=\"'.$path.'"+data+"\" height=\"50\"/>"'],
                    ['data'=>'action', 'name'=>'action', 'title'=>'Action', 
                'orderable'=>'false', 'searchable'=>'false']]);
        return view('admin.pages.catalogs')->with(compact('html'));
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
        
        Log::info($request->all());
        
        $catalogs = new catalogs;
        $catalogs->name = $request->name;
        $catalogs->price = $request->price;
        $catalogs->description = $request->description;
        if ($request->hasFile('inputfreqd')) 
        {
            $uploaded_img = $request->file('inputfreqd');
            $extension = $uploaded_img[0]->getClientOriginalExtension();
            $filename = md5(time()).'.'.$extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'catalogs';
            $uploaded_img[0]->move($destinationPath, $filename);
            $catalogs->image = $filename;
        }
        else{
            
            Log::info($request->all());
        }
        $catalogs->save();
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
            $catalogs = catalogs::find($id);
            $catalogs->image = '/images/catalogs/' . $catalogs->image;
            $previewimage = View::make('layouts._imgpreview', [
                            'image'=>$catalogs->image,
                            'name'=>$catalogs->title
                            ]);
            $previewimage = (string) $previewimage;
            return response()->json(['data'=>$catalogs,'imgpreview'=>$previewimage]);
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
        //edit catalog
        $catalogs = catalogs::find($id);
        $catalogs->name = $request->editname;
        $catalogs->price = $request->editprice;
        $catalogs->description = $request->editdescription;
        $imgname = $catalogs->image;
        if ($request->hasFile('inputfreqd')) 
        {        
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'catalogs';
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
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'catalogs';
            $uploaded_img[0]->move($destinationPath, $filename);
            $catalogs->image = $filename;
        }
        else{
            
            Log::info($request->all());
        }
        $catalogs->save();
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
        $catalogs = catalogs::find($id);
        $imgname = $catalogs->image;
        if($catalogs->delete())
        {
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'catalogs';
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
        $completemessage = 'Catalog has been deleted';
        return redirect()->back()->with('completemessage',$completemessage);
    }
}
