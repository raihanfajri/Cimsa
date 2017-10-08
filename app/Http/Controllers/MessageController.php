<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\User;
use App\message;
use DataTables;
use Yajra\DataTables\Html\Builder;
use Hashids;

class MessageController extends Controller
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
            $message = message::select(['id','name','updated_at','email','messagecontent']);
            return Datatables::of($message)
                ->addColumn('action', function($message){
                    return view('datatables._messageaction', [
                        'model'=>$message,
                        'id'=>Hashids::encode($message->id),
                        'form_url'=>'admin/message/destroy/'.Hashids::encode($message->id)
                    ]);
                })
                ->editColumn('updated_at', function ($message) {
                    return $message->updated_at->format('d F Y');
                })
                ->toJson();
        }
        return view('admin.pages.message');
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
        //
        $message = new message;
        $message->name = $request->nama;
        $message->email = $request->email;
        $message->messagecontent = $request->pesan;
        $message->save();
        $completemessage = 'Pesan Telah Terkirim, Terima Kasih';
        return redirect()->back()->with('completemessage',$completemessage);
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
        $id = Hashids::decode($id);
        $message = message::find($id[0]);
        $message->delete();
        $completemessage = 'Message has been deleted';
        return redirect()->back()->with('completemessage',$completemessage);
    }
}
