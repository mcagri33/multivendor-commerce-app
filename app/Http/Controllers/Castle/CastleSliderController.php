<?php

namespace App\Http\Controllers\Castle;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Image;
class CastleSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $sliders = Slider::paginate(15);
        return view('castle.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('castle.slider.add');
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
            Image::make($image)->resize(800, 400)->save('assets/castle/upload/slider/' . $name_gen);
            $save_url = 'assets/castle/upload/slider/' . $name_gen;
        }
        Slider::create([
            'title' => $request->title,
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
        $sliderFind = Slider::find($id);
        return view('castle.slider.edit',compact('sliderFind'));
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
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);
        $sliderId = Slider::findOrFail($request->id);
        $old_img = $request->old_image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(800, 400)->save('assets/castle/upload/slider/' . $name_gen);
            $save_url = 'assets/castle/upload/slider/' . $name_gen;
            if (file_exists($old_img)) {
                unlink($old_img);
            }
        }
        $sliderId->title =$request->title;
        $sliderId->image =$save_url;
        $sliderId->status =$request->status;
        $sliderId->update();

        return redirect()->route('castle.slider.index')->with('success', 'Success Created!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        $sliderDel = Slider::findOrFail($request->id);
        $sliderDel->delete();
        $old_img = $request->old_image;

        if (file_exists($old_img)) {
            unlink($old_img);
        }
        return redirect()->route('castle.slider.index')->with('success', 'Success Created!');
    }
}
