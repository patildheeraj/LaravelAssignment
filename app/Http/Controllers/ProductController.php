<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct()
    {
        $category = Category::all();
        return view('add-product', compact('category'));
    }
    public function storeProduct(Request $request)
    {
        $request->validate([
            'pname' => 'required',
            'pprice' => 'required',
            'pcategory' => 'required|integer',
            'file' => 'required|image|mimes:jpeg,png,jpg|max:720',
        ], [
            'pname.required' => '**Product Name is Required',
            'pprice.required' => '**Product Price is Required',
            'pcategory.required' => '**Select any one Category',
            'file.required' => '**Image is Required'
        ]);

        $pname = $request->pname;
        $pprice = $request->pprice;
        $pcategory = $request->pcategory;
        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('product_images'), $imageName);

        $product = new Product();
        $product->pname = $pname;
        $product->pimage = $imageName;
        $product->pprice = $pprice;
        $product->pcategory = $pcategory;
        $product->save();

        return back()->with('product_added', 'Product Added Successfully!!!');
    }

    public function getAllProduct()
    {
        #$products = Product::all();
        $products = Category::join('products', 'products.pcategory', '=', 'categories.id')->get();
        #$category = Category::all();
        return view('product-list', compact('products'));
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('edit-product', compact('category', 'product'));
    }

    public function updateProduct(Request $request)
    {
        $pname = $request->pname;
        $pprice = $request->pprice;
        $pcategory = $request->pcategory;
        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('product_images'), $imageName);

        $product = Product::find($request->id);
        $product->pname = $pname;
        $product->pimage = $imageName;
        $product->pprice = $pprice;
        $product->pcategory = $pcategory;
        $product->save();
        return back()->with('product_update', 'Product Updated Successfully!!');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        unlink(public_path('product_images') . '/' . $product->pimage);
        $product->delete();
        return back()->with('product_deleted', 'Product Deleted Successfully!!');
    }
}