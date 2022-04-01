<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class LayoutHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Home::first();
        return view('admin.layout-home', [
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        Home::first()->update($request->all());

        return redirect()->route('admin.layout.home')
            ->with('success','Saved successfully');
    }
}
