<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use App\Models\WorkCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WorkController extends Controller
{

    public function index()
    {
        $data = Work::with('category')->get();
        $category_list = WorkCategory::orderBy('order')->get();
        return view('admin.layout-work-list', [
            'data' => $data,
            'category_list' => $category_list
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
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $file_name = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('images/works'), $file_name);

                $data = $request->all();
                $data['image'] = $file_name;
                Work::create($data);

                return redirect()->route('admin.layout.work-list')
                    ->with('success', 'Added successfully');
            }
        }
        return redirect()->route('admin.layout.work-list')
            ->withErrors(['msg' => 'Invalid Image']);
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
        $data = Work::find($id);
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
        $data = $request->all();
        $item = Work::findOrFail($data['id']);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            File::delete(public_path('images/works') . DIRECTORY_SEPARATOR . $item->image);
            $file_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/works'), $file_name);
            $data['image'] = $file_name;
        }
        $item->update($data);

        return redirect()->route('admin.layout.work-list')
            ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Work::findOrFail($id);
        File::delete(public_path('images/works') . DIRECTORY_SEPARATOR . $item->image);
        return Work::destroy($id);
    }
}
