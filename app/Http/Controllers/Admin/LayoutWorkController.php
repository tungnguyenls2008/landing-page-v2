<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkLayout;
use Illuminate\Http\Request;

class LayoutWorkController extends Controller
{

    public function index()
    {
        $data = WorkLayout::first();
        return view('admin.layout-work', [
            'data' => $data
        ]);
    }


    public function store(Request $request)
    {
        WorkLayout::first()->update($request->all());

        return redirect()->route('admin.layout.work')
            ->with('success','Saved successfully');
    }

}
