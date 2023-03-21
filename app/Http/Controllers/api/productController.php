<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Http\Resources\product as productResource;
use App\Http\Resources\category_product as categoryproductResource;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Product::with('categories')->get();
        return response()->json([
            'data' => $category
        ]);
        // $products = Product::all();
        // return new productResource($products);
        // $product = Category::with('products')->first();
        // return response()->json([
        //     'data' => $product
        // ]);
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

        $category = Category::findOrFail([2]);
        $product->categories()->attach($category);

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
