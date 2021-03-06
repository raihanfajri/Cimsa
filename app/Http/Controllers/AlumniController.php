<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use App\User;
use App\alumni;
use App\alumniofthemonth;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Hashids;

class AlumniController extends Controller
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
            $alumni = alumni::select(['id','nama','sco','batch','image']);
            return Datatables::of($alumni)
                ->addColumn('action', function($alumni){
                    return view('datatables._action', [
                        'model'=>$alumni,
                        'id'=>Hashids::encode($alumni->id),
                        'form_url'=>'admin/alumni/destroy/'.Hashids::encode($alumni->id),
                        'confirm_message'=>'Yakin ingin menghapus '.$alumni->nama.' ?'
                    ]);
                })
                ->toJson();
        }
        $alumnilist = alumni::orderBy('nama','asc')->pluck('nama', 'id');
        $now = alumniofthemonth::first();
        $path = $request->root()."/images/Alumni/";
        $html = $htmlBuilder
                ->Columns([['data'=>'nama', 'name'=>'nama', 'title'=>'Nama'],
                    ['data'=>'sco', 'name'=>'sco', 'title'=>'SCO'],
                    ['data'=>'batch', 'name'=>'batch', 'title'=>'Batch'],
                    ['data'=>'image', 'name'=>'image', 'title'=>'Foto', 'render' => '"<img src=\"'.$path.'"+data+"\" height=\"50\"/>"'],
                    ['data'=>'action', 'name'=>'action', 'title'=>'Action', 
                'orderable'=>'false', 'searchable'=>'false']]);
        return view('admin.pages.alumni')->with(compact('alumnilist'))->with(compact('now'));
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
        //Create new alumni
        $alumni = new alumni;
        $alumni->nama = $request->nama;
        $alumni->sco = $request->sco;
        $alumni->batch = $request->batch;
        if ($request->hasFile('inputfreqd')) 
        {
            $uploaded_img = $request->file('inputfreqd');
            $extension = $uploaded_img[0]->getClientOriginalExtension();
            $filename = md5(time()).'.'.$extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'alumni';
            $uploaded_img[0]->move($destinationPath, $filename);
            $alumni->image = $filename;
        }
        else{
            
            Log::info($request->all());
        }
        $alumni->save();
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
            $alumni = alumni::find($id[0]);
            $alumni->image = '/images/alumni/' . $alumni->image;
            $previewimage = View::make('layouts._imgpreview', [
                            'image'=>$alumni->image,
                            'name'=>$alumni->title
                            ]);
            $previewimage = (string) $previewimage;
            return response()->json(['data'=>$alumni,'imgpreview'=>$previewimage]);
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
        $alumni = alumni::find($id[0]);
        $alumni->nama = $request->editnama;
        $alumni->sco = $request->editsco;
        $alumni->batch = $request->editbatch;
        $imgname = $alumni->image;
        if ($request->hasFile('inputfreqd')) 
        {        
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'alumni';
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
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'alumni';
            $uploaded_img[0]->move($destinationPath, $filename);
            $alumni->image = $filename;
        }
        else{
            
            Log::info($request);
        }
        $alumni->save();
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
        $alumni = alumni::find($id[0]);
        $imgname = $alumni->image;
        if($alumni->delete())
        {
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'alumni';
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
        $completemessage = 'Alumni has been deleted';
        return redirect()->back()->with('completemessage',$completemessage);
    }

    public function storeUpdateAlumniOfTheMonth(Request $request)
    {
        $alumniofthemonth = alumniofthemonth::first();
        if(empty($alumniofthemonth)){
            $alumniofthemonth = new alumniofthemonth;   
        }
        $alumniofthemonth->id_alumni = $request->nama;
        $alumniofthemonth->description = $request->description;
        $alumniofthemonth->author = $request->author;
        $alumniofthemonth->save();
        return redirect()->back();
    }
}
