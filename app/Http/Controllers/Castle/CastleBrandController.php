<?php

namespace App\Http\Controllers\Castle;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Image;
class CastleBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $brands = Brand::paginate(15);
        return view('castle.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('castle.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(800, 400)->save('assets/castle/upload/brand/' . $name_gen);
            $save_url = 'assets/castle/upload/brand/' . $name_gen;
        }
        Brand::create([
            'name' => $request->name,
            'uuid' => Str::uuid(),
            'image' => $save_url,
            'status' => $request->status,
        ]);
        return redirect()->route('castle.slider.index')->with('success', 'Success Created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $brandFind = Brand::find($id);
        return view('castle.brand.edit',compact('brandFind'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        $brandId = Brand::findOrFail($request->id);
        $old_img = $request->old_image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(800, 400)->save('assets/castle/upload/brand/' . $name_gen);
            $save_url = 'assets/castle/upload/brand/' . $name_gen;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
        }

        $brandId->name = $request->name;
        $brandId->image = $save_url;
        $brandId->status = $request->status;
        $brandId->update();
        return redirect()->route('castle.brand.index')->with('success', 'Success Created!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        $brandDel = Brand::findOrFail($request->id);
        $brandDel->delete();
        $old_img = $request->old_image;

        if (file_exists($old_img)) {
            unlink($old_img);
        }
        return redirect()->route('castle.brand.index')->with('success', 'Success Created!');
    }
}
