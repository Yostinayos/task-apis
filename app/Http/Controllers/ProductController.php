<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->with('images')->get();
        return $products;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
       $data= $request->validated();
       $product= new Product;
       $product->name=$data['name'];
       
       $product->price=$data['price'];
       $product->category_id=$data['category_id'];
        $product->save();
        $image= new Image;
        $image->image=$data['image'];
        $image->product_id=$product->id;
        $image->save();
        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();

        return $product->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $user_abilites = Auth::user()->role;
        if ($user_abilites == 'admin') {
            return $product->delete();
        } else {
            echo 'notallowedmt allowed';
        }
    }
}
