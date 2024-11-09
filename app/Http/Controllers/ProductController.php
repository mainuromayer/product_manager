<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function productAll(Request $request)
    {
        $query = Product::query();

        if ($search = $request->get('search')) {
            $query->where('product_id', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        }

        if ($sort = $request->get('sort')) {
            $query->orderBy($sort);
        }

        $products = $query->paginate(10);

        return view('layouts.index', compact('products'));
    }

    public function productCreate()
    {
        return view('layouts.create');
    }


    public function productStore(Request $request)
    {
        $request->validate([
            'product_id' => 'required|unique:products',
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:3072',
        ]);

        // Handle image upload with custom name
        if ($request->hasFile('image')) {
            // Generate the folder structure: year/month/day/time/filename
            $timestamp = Carbon::now();
            $folderPath = $timestamp->format('Y/m/d/H');
            $imageName = $timestamp->format('His') . '_' . $request->file('image')->getClientOriginalName();

            // Store the image in the generated folder
            $imagePath = $request->file('image')->storeAs(
                'product_images/' . $folderPath, $imageName, 'public'
            );
        } else {
            $imagePath = null;
        }

        $product = Product::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.all')->with('success', 'Product Created Successfully.');
    }

    public function productShowSpecific($id): View
    {
        $product = Product::findOrFail($id);
        return view('layouts.show', compact('product'));
    }

    public function productEdit($id): View
    {
        $product = Product::findOrFail($id);
        return view('layouts.edit', compact('product'));
    }

    public function productUpdate(Request $request, $id)
    {
        $request->validate([
            'product_id' => "required|unique:products,product_id,$id",
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:3072',
        ]);

        $product = Product::findOrFail($id);

        // Handle image upload with custom name
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image && Storage::exists('public/' . $product->image)) {
                Storage::delete('public/' . $product->image);
            }

            // Generate the folder structure: year/month/day/time/filename
            $timestamp = Carbon::now();
            $folderPath = $timestamp->format('Y/m/d/H');
            $imageName = $timestamp->format('His') . '_' . $request->file('image')->getClientOriginalName();

            // Store the new image in the generated folder
            $imagePath = $request->file('image')->storeAs(
                'product_images/' . $folderPath, $imageName, 'public'
            );
        } else {
            $imagePath = $product->image; // Keep the existing image if none is uploaded
        }

        $product->update([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.all')->with('success', 'Product updated successfully.');
    }


    public function productDelete($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return redirect()->route('products.all')->with('success', 'Product deleted successfully.');
    }
}
