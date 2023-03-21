<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Image;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\ProductImage;
use App\Http\Resources\product as productResource;
use App\Http\Resources\category_product as categoryproductResource;
use App\Http\Resources\product_image as productimageResource;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $category = Product::with('categories')->get();
        // $image = Image::with('images')->get();
        // return response()->json([
        //     'data' => $category
        // ]);
        $products = Product::all();
        return new productResource($products);
        // $product = Category::with('products')->first();
        // return response()->json([
        //     'data' => $product
        // ]);
    }

    public function product_category()
    {
        $category = Product::with('categories')->get();
        return response()->json([
            'data' => $category
        ]);
    }

    public function product_image()
    {
        $image = Product::with('images')->get();
        return response()->json([
            'data' => $image
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create a new product record
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->enable = 0;
        $product->save();
        // return new productResource($product);

        $category = Category::findOrFail([3]);
        $image = Image::findOrFail([1]);
        $product->categories()->attach($category);
        $product->images()->attach($image);

        return 'Success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return new productResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->save();
        return new productResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->delete()) {
            return new productResource($product);
        }
    }
}
