<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:products',
            'title' => 'required',
            'price' => 'required|numeric',
            'abstract_html' => 'required',
            'full_html' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('admin.products.index')->with('success', 'Product created.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }
    
    public function show(Product $product)
    {
        return view('product', compact('product'));
    }
    

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'abstract_html' => 'required',
            'full_html' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('admin.products.index')->with('success', 'Product updated.');
    }
    
}
