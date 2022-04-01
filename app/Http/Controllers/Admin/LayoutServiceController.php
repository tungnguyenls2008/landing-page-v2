<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LayoutServiceController extends Controller
{

    public function index()
    {
        $data = ServiceLayout::first();
        return view('admin.layout-services', [
            'data' => $data
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $item = ServiceLayout::get()->first();

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            File::delete(public_path('images/me') . DIRECTORY_SEPARATOR . $item->img);
            $file_name = time() . '.' . $request->img->getClientOriginalExtension();
            $request->img->move(public_path('images/me'), $file_name);
            $data['img'] = $file_name;
        }

        $item->update($data);
        return redirect()->route('admin.layout.service')
            ->with('success','Saved successfully');
    }

}
