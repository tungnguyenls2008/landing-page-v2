<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class LayoutAboutUsController extends Controller
{

    public function index()
    {
        $data = AboutUs::first();
        return view('admin.layout-about-us', [
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        AboutUs::first()->update($request->all());

        return redirect()->route('admin.layout.about-us')
            ->with('success','Saved successfully');
    }

}
