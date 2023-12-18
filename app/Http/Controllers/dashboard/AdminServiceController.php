<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\services\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::with( 'country')->get();
        $countries = Country::all();
        return view('dashboard.service.index', compact('services',  'countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('dashboard.service.create', compact('countries'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData =  $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'price' => 'required|numeric',
            'oldprice' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules for image upload as needed
            'details_en' => 'required|string',
            'details_ar' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'short_description_en' => 'required|string',
            'short_description_ar' => 'required|string',
            'start_time' => 'required', // You may need to create a custom validation rule for time format
            'end_time' => 'required',
            'country_id' => 'required|exists:countries,id', // Assuming you have a "countries" table
            'duration' => 'required|string', // You may need to create a custom validation rule for duration format
            'status' => 'required|boolean',
        ]);

        // Handle image uploads
        if(isset($request->image)) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Create product
        $service = new Service();
        $service->name = [
            'en' => $request->input('name_en'),
            'ar' => $request->input('name_ar'),
        ];
        $service->price = $request->input('price');
        $service->oldprice = $request->input('oldprice');
        // Handle image and video file uploads here
        $service->image = $imagePath; // Update with the path to the uploaded image
        $service->short_description = [
            'en' => $request->input('short_description_en'),
            'ar' => $request->input('short_description_ar'),
        ];
        $service->description = [
            'en' => $request->input('description_en'),
            'ar' => $request->input('description_ar'),
        ];
        $service->details = [
            'en' => $request->input('details_en'),
            'ar' => $request->input('details_ar'),
        ];
        $service->country_id = $request->input('country_id');
        $service->status = $request->status;
        $service->start_time = $request->start_time;
        $service->end_time = $request->end_time;
        $service->duration = $request->duration;

        // Save the service data to the database
        $service->save();

        return redirect()->route('services.index')->with('success', 'service created successfully!');
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
