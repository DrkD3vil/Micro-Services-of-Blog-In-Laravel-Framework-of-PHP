<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Show All Categories
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('adminBackend.categories.index', compact('categories'));
    }

    // Show Create Form
    public function create()
    {
        return view('adminBackend.categories.create');
    }

    // Store Category
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'nullable|unique:categories,slug',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        $slug = $request->slug ?: Str::slug($request->name);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('category_images', 'public');
        }

        Category::create([
            'name'        => $request->name,
            'slug'        => $slug,
            'description' => $request->description,
            'image'       => $imagePath,
            'is_active'   => $request->is_active ?? 1,
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category Created Successfully!');
    }

    // Edit Category
    public function edit(Category $category)
    {
        return view('adminBackend.categories.edit', compact('category'));
    }

    // Update Category
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'nullable|unique:categories,slug,' . $category->id,
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        $slug = $request->slug ?: Str::slug($request->name);

        // Image Update
        $imagePath = $category->image;
        if ($request->hasFile('image')) {

            if ($imagePath && file_exists(public_path('storage/' . $imagePath))) {
                unlink(public_path('storage/' . $imagePath));
            }

            $imagePath = $request->file('image')->store('category_images', 'public');
        }

        $category->update([
            'name'        => $request->name,
            'slug'        => $slug,
            'description' => $request->description,
            'image'       => $imagePath,
            'is_active'   => $request->is_active ?? 1,
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category Updated Successfully!');
    }

    // Delete Category
    public function destroy(Category $category)
    {
        if ($category->image && file_exists(public_path('storage/' . $category->image))) {
            unlink(public_path('storage/' . $category->image));
        }

        $category->delete();

        return redirect()->back()->with('success', 'Category Deleted Successfully!');
    }
}
