<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Product;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    function index()
    {
        // return Product::all();
        $products = Product::all();

        return response()->json([
            'success' => true,
            'data' => $products,
        ]);
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

    public function createProduct()
    {
        return view('products.create');
    }

    public function storeProduct(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $product = new Product();
        $product->name = $req->name;
        $product->price = $req->price;
        $product->category = $req->category;
        if ($product->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Product Stored Successfully',
                'product' => $product
            ]);
        }
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function updateProduct(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|min:3|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $product = Product::findOrFail($id);
        $product->name = $req->name;
        $product->price = $req->price;
        $product->category = $req->category;
        if ($product->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Product Updated Successfully',
                'product' => $product
            ]);
        }
    }

    public function productDelete($id)
    {
        $product = Product::findOrFail($id);
        if ($product->delete()) {
            return response()->json([
                'success' => true,
                'message' => "product Deleted",

            ]);
        }
    }
}
