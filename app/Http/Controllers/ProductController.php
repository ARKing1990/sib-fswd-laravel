<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        if (Auth::user()->role->name == 'User') {
            return view('product.card', ['products' => $products]);
        } else {
            return view('product.index', ['products' => $products]);
        }
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('product.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required|string|min:5',
            'price' => 'required|integer',
            'sale_price' => 'required|integer',
            'brand' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $imageName = time().'.'.$request->image->extension();
        Storage::putFileAs('public/product', $request->image, $imageName);
        $product = Product::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'brands' => $request->brand,
            'image' => $imageName,
        ]);
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->with('category')->first();
        $brands = Brand::all();
        $categories = Category::all();
        return view('product.edit', compact('product', 'brands', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required|string|min:5',
            'price' => 'required|integer',
            'sale_price' => 'required|integer',
            'brand' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        if ($request->hasFile('image')) {
            $old_image = Product::find($id)->image;
            Storage::delete('public/product/'.$old_image);
            $imageName = time() . '.' . $request->image->extension();
            Storage::putFileAs('public/product', $request->image, $imageName);
            Product::where('id', $id)->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'brands' => $request->brand,
                'image' => $imageName,
            ]);

        } else {
            Product::where('id', $id)->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'brands' => $request->brand,
            ]);
        }
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}
