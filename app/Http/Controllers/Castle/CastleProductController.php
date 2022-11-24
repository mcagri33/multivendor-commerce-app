<?php

namespace App\Http\Controllers\Castle;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use File;
class CastleProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(15);
        return view('castle.product.index',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $categoryData = Category::all();
        $images = \App\Models\Image::all();
        return view('castle.product.add',compact('categoryData','images'));
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
            'price' => 'nullable|integer',
            'quantity' => 'nullable|integer',
            'minquantity' => 'nullable|integer',
            'tax' => 'nullable|integer',
//            'product_image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);
        $productStore = new Product();
        $productStore->uuid = Str::uuid();
        $productStore->title = $request->title;
        if ($request->slug){
            $productStore->slug = $request->slug;
        }else{
            $productStore->slug = SlugService::createSlug(Category::class,'slug',$request->title);
        }
        $productStore->keywords = $request->keywords;
        $productStore->description = $request->description;
        $productStore->detail = $request->detail;
        $productStore->price = $request->price;
        $productStore->quantity = $request->quantity;
        $productStore->minquantity = $request->minquantity;
        $productStore->tax = $request->tax;
        $productStore->status = $request->status;
        $productStore->save();
        $productStore->category()->attach($request->category_id);

        if ($request->hasFile('product_image')) {
            $uploadPath = 'assets/castle/upload/product/';
            $i = 1;
            foreach ($request->file('product_image') as $imageFile) {
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;
                $productStore->images()->create([
                    'product_id' => $productStore->id,
                    'product_image' => $finalImagePathName,
                ]);
            }
        }
        return redirect()->route('castle.product.index')->with('success', 'Success Created!');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $productFind = Product::find($id);
        $categoryFind = Category::all();
        return view('castle.product.edit',compact('productFind','categoryFind'));
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
            'price' => 'nullable|integer',
            'quantity' => 'nullable|integer',
            'minquantity' => 'nullable|integer',
            'tax' => 'nullable|integer',
//            'product_image' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048'
        ]);
        $productId = Product::findOrFail($request->id);
        $old_img = $request->old_image;

        $productId->title = $request->title;
        if ($request->slug){
            $productId->slug = $request->slug;
        }else{
            $productId->slug = SlugService::createSlug(Category::class,'slug',$request->title);
        }
        $productId->keywords = $request->keywords;
        $productId->description = $request->description;
        $productId->detail = $request->detail;
        $productId->price = $request->price;
        $productId->quantity = $request->quantity;
        $productId->minquantity = $request->minquantity;
        $productId->tax = $request->tax;
        $productId->status = $request->status;
        $productId->update();
        $productId->category()->sync($request->category_id);

        if ($request->hasFile('product_image')) {
            $uploadPath = 'assets/castle/upload/product/';
            if (file_exists($old_img)) {
                unlink($old_img);
            }
            $i = 1;
            foreach ($request->file('product_image') as $imageFile) {
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;
                $productId->images()->create([
                    'product_id' => $productId->id,
                    'product_image' => $finalImagePathName,
                ]);
            }
        }
        return redirect()->route('castle.product.index')->with('success', 'Success Created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        $productDelete = Product::find($request->id)->delete();
        $old_img = $request->old_image;
        if (file_exists($old_img)) {
            unlink($old_img);
        }
        return redirect()->route('castle.product.index',compact('productDelete'))->with('success', 'Success Created!');
    }

    public function destroyImage(int $product_image_id)
    {
        $productImage = Image::findOrFail($product_image_id);
        if (File::exists($productImage->product_image)){
            File::delete($productImage->product_image);
        }
        $productImage->delete();
        return redirect()->back();

    }

    public function multiDelete(Request $request)
    {
        Product::whereIn('id', $request->get('selected'))->delete();

    }
}
