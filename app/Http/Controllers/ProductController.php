<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }
        /** @disregard P1013 Undefined method */
        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'category_id' => $request->input('category_id'),
            'image' => $imagePath,
            'seller_id' => auth()->id(),
        ]);
        return redirect('/seller/products');
    }
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }
    public function edit($id)
    {
        /** @disregard P1013 Undefined method */
        $product = Product::where('seller_id', auth()->id())->findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        /** @disregard P1013 Undefined method */
        $products = Product::where('seller_id', auth()->id())->findOrFail($id);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->stock = $request->input('stock');
        $products->category_id = $request->input('category_id');
        $products->image = $imagePath;

        $products->save();

        return redirect('/products');
    }
    public function destory($id)
    {
        /** @disregard P1013 Undefined method */
        $product = Product::where('seller_id', auth()->id())->findOrFail($id);

        $product->delete();
        return "Deleted successfully";
    }

    public function categoryTest()
    {
        $product = Product::with('category')->findOrFail(2);

        return $product;
    }

    public function sellerProducts()
    {
        /** @disregard P1013 Undefined method */
        $products = Product::where('seller_id', auth()->id())->get();

        return view('products.seller-index', compact('products'));
    }
}
