<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\product\Category;
use App\Models\product\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category', 'country')->get();
        $categories = Category::all();
        $countries = Country::all();
        return view('dashboard.products.index', compact('products', 'categories', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $countries = Country::all();
        return view('dashboard.products.create', compact('categories','countries'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'price' => 'required|numeric',
            'oldprice' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'secondImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'Video' => 'string|max:20480',
            'short_description_en' => 'required|string',
            'short_description_ar' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'details_en' => 'required|string',
            'details_ar' => 'required|string',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'country_id' => 'required|exists:countries,id',
        ]);

        // Handle image uploads
        if(isset($request->image)) {
            $imagePath = $request->file('image')->store('images', 'public');

            if(isset($request->secondImage)) {

                $secondImagePath = $request->file('secondImage')->store('images', 'public');
        }}
        // Create product
        $product = new Product();
        $product->name = [
            'en' => $request->input('name_en'),
            'ar' => $request->input('name_ar'),
        ];
        $product->price = $request->input('price');
        $product->oldprice = $request->input('oldprice');
        $product->image = $imagePath;
        $product->secondImage = $secondImagePath;
        $product->Video = $request->video;
        $product->short_description = [
            'en' => $request->input('short_description_en'),
            'ar' => $request->input('short_description_ar'),
        ];
        $product->description = [
            'en' => $request->input('description_en'),
            'ar' => $request->input('description_ar'),
        ];
        $product->details = [
            'en' => $request->input('details_en'),
            'ar' => $request->input('details_ar'),
        ];
        $product->quantity = $request->input('quantity');
        $product->total_rate = $request->input('total_rate');
        $product->category_id = $request->input('category_id');
        $product->country_id = $request->input('country_id');

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category', 'country')
            ->where('id',$id)
            ->first();
        $categories = Category::all();
        $countries = Country::all();

        return view('dashboard.products.show', compact('product','categories','countries'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::with('category', 'country')
            ->where('id',$id)
            ->first();
        $categories = Category::all();
        $countries = Country::all();
        return view('dashboard.products.edit', compact('product','categories','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'price' => 'required|numeric',
            'oldprice' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file type and size as needed
            'secondImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file type and size as needed
            'Video' => 'url',
            'quantity' => 'required|integer',
            'short_description_en' => 'required|string',
            'short_description_ar' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'details_en' => 'required|string',
            'details_ar' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'country_id' => 'required|exists:countries,id',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);

        // Update the product with the validated data
        $product->update($validatedData);

        // Handle image and secondImage upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }

        if ($request->hasFile('secondImage')) {
            $secondImagePath = $request->file('secondImage')->store('images', 'public');
            $product->secondImage = $secondImagePath;
        }

        // Save the changes
        $product->save();

        // Redirect back with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Delete the product
        $product->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
