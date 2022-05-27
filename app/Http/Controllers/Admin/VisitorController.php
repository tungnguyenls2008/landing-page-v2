<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VisitorController extends Controller
{

    public function index()
    {
        $data = Visitor::orderBy('created_at','desc')->get();
        return view('admin.layout-visitors-list', [
            'data' => $data,
        ]);
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

    public function store(Request $request)
    {
      //
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

    public function get($id)
    {
        $data = Visitor::find($id);
        return response()->json([
            'data' => $data
        ]);
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

    public function update(Request $request)
    {
      $note=$request->get('note');
      $visitor=Visitor::find($request->get('id'));
      $visitor->note=$note;
      $visitor->save();
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int
     */
    public function destroy($id)
    {
        return Visitor::destroy($id);
    }
    public function getGpsLocation(Request $request){

    }
}
