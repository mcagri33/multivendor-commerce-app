<?php

namespace App\Http\Controllers\Castle;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CastleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $categories = Category::paginate(15);
        $categoryAll = Category::all();

        return view('castle.category.index',compact('categories','categoryAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $data = Category::all();
        return view('castle.category.add',compact('data'));
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
            'name' => 'required',

        ]);

        $categoryAdd = new Category();
        $categoryAdd->name = $request->name;
        if ($request->slug){
           $categoryAdd->slug = $request->slug;
        }else{
            $categoryAdd->slug = SlugService::createSlug(Category::class,'slug',$request->name);
        }
        $categoryAdd->uuid = Str::uuid();
        $categoryAdd->parent_id = $request->parent_id;
        $categoryAdd->status = $request->status;
        $categoryAdd->save();
        return redirect()->route('castle.category.index')->with('success', 'Success Created!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $categoryFind = Category::find($id);
        $data = Category::all();

        return view('castle.category.edit',compact('categoryFind','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $categoryId = Category::findOrFail($request->id);
        $categoryId->name = $request->name;
        if ($request->slug){
            $categoryId->slug = $request->slug;
        }else{
            $categoryId->slug = SlugService::createSlug(Category::class,'slug',$request->name);
        }
        $categoryId->parent_id = $request->parent_id;
        $categoryId->status = $request->status;
        $categoryId->update();
        return redirect()->route('castle.category.index')->with('success', 'Success Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $categoryDelete = Category::find($id);
        $categoryDelete->delete();
        return redirect()->route('castle.category.index')->with('success', 'Success Deleted!');

    }
}
