<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\product\Category;
use App\Models\product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        // Retrieve all categories from the 'categories' table
        $categories = Category::get();
        // Pass the categories to a view for display
        return view('dashboard.categories.index',compact( 'categories'));
    }
     public function show($id)
    {
        // Retrieve all categories from the 'categories' table
        $products = Product::where('category_id',$id)->get();
        // Pass the categories to a view for display
        return view('dashboard.products.index',compact( 'products'));
    }

   public function edit($id)
    {
        $category = Category::where('id',$id)->first();
        // Pass the categories to a view for display
        return view('dashboard.categories.edit',compact( 'category'));


    }
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the category
        $category = Category::find($id);

        if (!$category) {
            // Handle the case where the category doesn't exist
            return redirect()->back()->withErrors(['error' => 'Category not found.']);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Get the file instance
            $file = $request->file('image');

            // Generate a new, unique name for the file
            $newFileName = time() . '_' . $file->getClientOriginalName();

            // Define the path where the file will be stored
            $destinationPath = public_path('/images/categories');

            // Move the file to the desired location
            $file->move($destinationPath, $newFileName);

            // Update the category's image attribute with the new file name
            $category->image = $newFileName;

        }

        // Update other details
        $category->name = [
            'en' => $request->input('name_en'),
            'ar' => $request->input('name_ar'),
        ];

        // Save the category
        $category->save();

        // Redirect back or to the categories list with success message
        return redirect('admin/categories')->with('success', 'Category updated successfully.');
    }



    public function destroy($id)
    {
        // Find the category by ID
        $category = Category::find($id);

        // If the category doesn't exist, redirect back with an error message
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }
        // Perform any additional clean-up here, like deleting related records

        // Delete the category
        $category->delete();

        // Redirect to a specific route with a success message
        return redirect('admin/categories')->withSuccess( 'Category deleted successfully.');
    }


    public function create()
    {
        return view('dashboard.categories.create'); // Replace with your actual view
    }


    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload...
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            // You might want to save just the filename, or the full path
        }

        // Create the category...
        $category = new Category;
        $category->name = [
            'en' => $request->input('name_en'),
            'ar' => $request->input('name_ar'),
        ];
        // Set other fields as necessary
        if ($request->hasFile('image')) {
            // Get the file instance
            $file = $request->file('image');

            // Generate a new, unique name for the file
            $newFileName = time() . '_' . $file->getClientOriginalName();

            // Define the path where the file will be stored
            $destinationPath = public_path('/images/categories');

            // Move the file to the desired location
            $file->move($destinationPath, $newFileName);

            // Update the category's image attribute with the new file name
            $category->image = $newFileName;

        }
        $category->save();

        // Redirect after successful creation...
        return redirect('admin/categories') // Adjust the redirect route as needed
        ->withSuccess( 'Category created successfully.');
    }



}
