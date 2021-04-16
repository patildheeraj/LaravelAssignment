<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $category = Category::all();

        return view('category-list', compact('category'));
    }

    public function addCategory()
    {
        return view('add-category');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'cname' => 'required'
        ], [
            'cname.required' => '**Category Name is Required'
        ]);

        $name = $request->cname;

        $category = new Category();
        $category->cname = $name;
        $category->save();
        return back()->with('category_added', 'Category added successfully!!');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back()->with('category_deleted', 'Category Deleted Successfully');
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('edit-category', compact('category'));
    }

    public function updateCategory(Request $request)
    {
        $cname = $request->cname;

        $category = Category::find($request->id);
        $category->cname = $cname;
        $category->save();
        return back()->with("category_updated", 'Category Updated Successfully!!');
    }
}