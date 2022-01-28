<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    /*--------------------------------------------
    |============== Product Index ================
    ---------------------------------------------*/
    public function index($id=null)
    {
        if ($id=='') {
            $products = Product::get();
            return response()->json(['products'=>$products],200);
        } else {
            $products = Product::find($id);
            return response()->json(['products'=>$products],200);
        }
    }

    /*--------------------------------------------
    |============== Product Store ================
    ---------------------------------------------*/
    public function store(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            // return $data;

            $request->validate([
                'pro_img'=>'required|string',
                'pro_title'=>'required|string',
                'pro_despt'=>'required|string',
                'pro_price'=>'required|numeric',
                'pro_quantity'=>'required|numeric',
            ]);
            //------ product insert to datatable ------
            $product = new product();
            $product->pro_img = $data['pro_img'];
            $product->pro_title = $data['pro_title'];
            $product->pro_despt = $data['pro_despt'];
            $product->pro_price = $data['pro_price'];
            $product->pro_quantity = $data['pro_quantity'];
            $product->save();
            $message='Product added successfully!';
            return response()->json(['message'=>$message],201);

        }
    }

    /*--------------------------------------------
    |============== Product Update ================
    ---------------------------------------------*/
    public function update(Request $request, $id){
        if($request->isMethod('put')){
            $data=$request->all();
            // return $data;

            $request->validate([
                'pro_img'=>'required|string',
                'pro_title'=>'required|string',
                'pro_despt'=>'required|string',
                'pro_price'=>'required|numeric',
                'pro_quantity'=>'required|numeric',
            ]);

            // ------ product update to datatable ------
            $product= Product::findOrFail($id);
            $product->pro_img = $data['pro_img'];
            $product->pro_title = $data['pro_title'];
            $product->pro_despt = $data['pro_despt'];
            $product->pro_price = $data['pro_price'];
            $product->pro_quantity = $data['pro_quantity'];
            $product->save();
            $message='Product updated successfully!';
            return response()->json(['message'=>$message],202);
        }
    }

    /*--------------------------------------------
    |============== Product Delect ================
    ---------------------------------------------*/
    public function delete($id=null){
        Product::findOrFail($id)->delete();
        $message='Product deleted successfully!';
        return response()->json(['message'=>$message],200);
    }

}























 // $product=DB::table('products')->get();
        // return response()->json($product,200);
        // return Product::all();