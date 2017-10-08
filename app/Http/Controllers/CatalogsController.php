<?php

namespace App\Http\Controllers;

use App\catalogs;
use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Hashids;

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
                        'id'=>Hashids::encode($catalogs->id),
                        'form_url'=>'admin/catalogs/destroy/'.Hashids::encode($catalogs->id),
                        'confirm_message'=>'Yakin ingin menghapus '.$catalogs->title.' ?'
                    ]);
                })
                ->editColumn('price','Rp {{ number_format($price,0,"",".") }}')
                ->toJson();
        }
        return view('admin.pages.catalogs');
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
            $id = Hashids::decode($id);
            $catalogs = catalogs::find($id[0]);
            $catalogs->image = '/images/catalogs/' . $catalogs->image;
            $previewimage = View::make('layouts._imgpreview', [
                            'image'=>$catalogs->image,
                            'name'=>$catalogs->title
                            ]);
            $previewimage = (string) $previewimage;
            return response()->json(['data'=>$catalogs,'imgpreview'=>$previewimage]);
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
        //edit catalog
        $id = Hashids::decode($id);
        $catalogs = catalogs::find($id[0]);
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
        $id = Hashids::decode($id);
        $catalogs = catalogs::find($id[0]);
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
