<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientLayout;
use App\Models\WorkLayout;
use Illuminate\Http\Request;

class LayoutClientController extends Controller
{

    public function index()
    {
        $data = ClientLayout::first();
        return view('admin.layout-client', [
            'data' => $data
        ]);
    }


    public function store(Request $request)
    {
        ClientLayout::first()->update($request->all());

        return redirect()->route('admin.layout.client')
            ->with('success','Saved successfully');
    }

}
