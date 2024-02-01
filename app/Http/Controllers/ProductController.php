<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $products = Product::all();
        return view( 'product.index', compact( 'products' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::all();
        return view( 'product.create', compact( 'categories' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $validateData = $request->validate( [
            'name'        => 'required',
            'category_id' => 'required',
            'price'       => 'required',
            'quantity'    => 'required',
        ] );

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();

        toastr()->addSuccess('Product Store');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( Product $product ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Product $product, $id ) {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view( 'product.edit', compact( 'categories', 'product' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Product $product ) {
        $validateData = $request->validate( [
            'name'        => 'required',
            'category_id' => 'required',
            'price'       => 'required',
            'quantity'    => 'required',
        ] );

        $product = Product::findOrFail($request->id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->update();

        toastr()->addSuccess('Product updated');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Product $product, $id ) {
        $product = Product::findOrFail($id);
        $product->delete();
        toastr()->addSuccess('Product Deleted');
        return redirect()->route('product.index');
    }
}
