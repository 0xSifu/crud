<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use App\Models\ProductImage;
use App\Http\Resources\category_product as categoryproductResource;
use App\Http\Resources\product_image as productimageResource;
use App\Http\Resources\category as categoryResource;
use App\Http\Resources\product as productResource;
use App\Http\Resources\image as imageResource;
use Illuminate\Support\Facades\File;



class imageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = Image::orderBy('id','ASC')->get();
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
        $image = new Image();
        $request->validate([
            'name'=> 'required',
            'file'=> 'required|max:1024'
        ]);
        $filename="";
        if ($request->hasFile('file')) {
            # code...
            $filename=$request->file('file')->store('posts','public');
        } else {
            $filename=Null;
        }

        $image->name=$request->name;
        $image->file=$filename;
        $image->enable=0;
        $result=$image->save();
        if ($result) {
            return response()->json(['success'=>true]);
        } else {
            return response()->json(['success'=>false]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::findOrFail($id);
        return new imageResource($image);
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
        $image = Image::findOrFail($id);
        $destination = public_path("storage\\".$image->file);
        $filename = "";
        if ($request->hasFile('new_file')) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename=$request->file('new_file')->store('posts','public');
        } else {
            $filename=$request->file;
        }
        $image->name=$request->name;
        $image->file=$filename;
        $image->enable=0;
        $result=$image->save();
        if ($result) {
            return response()->json(['success'=>true]);
        } else {
            return response()->json(['success'=>false]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=Image::findOrFail($id);
        $destination=public_path("storage\\ ".$image->file);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $result=$image->delete();
        if ($result) {
            return response()->json(['success'=> true]);
        }else {
            return response()->json(['success'=> false]);
        }
    }
}
