<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReviewLayout;
use Illuminate\Http\Request;

class LayoutReviewController extends Controller
{

    public function index()
    {
        $data = ReviewLayout::first();
        return view('admin.layout-reviews', [
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        ReviewLayout::first()->update($request->all());

        return redirect()->route('admin.layout.review')
            ->with('success','Saved successfully');
    }
}
