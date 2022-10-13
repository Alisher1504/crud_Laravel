<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('index', compact('products'))->with('i', (request()->input('page', 1) -1) * 5);
    }

   
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if($image = $request->file('image')){
            $destinationPash = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPash, $profileImage);
            $input['image']  = "$profileImage";
        }
        
        Product::create($input);

        return redirect()->route('index')->with('success', 'Product create successfully');

    }

    
    public function show(Product $product)
    {
        //
    }

 
    public function edit(Product $product)
    {
        //
    }

   
    public function update(Request $request, Product $product)
    {
        //
    }

   
    public function destroy(Product $product)
    {
        //
    }
}
