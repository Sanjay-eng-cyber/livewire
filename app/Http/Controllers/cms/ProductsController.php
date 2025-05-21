<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    function index()
    {
        return Product::all();
    }

    function store(Request $req)
    {
        // dd('store method hit');
        $rules =  array(
            "name" => "required|min:3|max:90",
            "price" => "required|numeric"
        );
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $product = new Product();
        $product->name = $req->name;
        $product->price = $req->price;
        $product->category = $req->category;
        if ($product->save()) {
            return 'Product Added Succesfully';
        }
    }

    function update(Request $req)
    {
        // dd('store method hit');
        $product = Product::findOrFail($req->id);
        $product->name = $req->name;
        $product->price = $req->price;
        $product->category = $req->category;
        if ($product->save()) {
            return 'Product Updated Succesfully';
        }
    }

    function deletePro($id)
    {
        $product = Product::findOrFail($id);
        if ($product->delete()) {
            return "Product Deleted";
        }
    }

    function search($name)
    {
        $product = Product::where("name", "like", "%" . $name . "%")->get();
        if ($product) {
            return ["result" => $product];
        } else {
            return ["result" => "No Product Found."];
        }
    }
}
