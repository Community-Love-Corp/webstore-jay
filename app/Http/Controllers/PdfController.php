<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class PdfController extends Controller
{
    public function show(Product $product)
    {
        $user = auth()->user();
        
        // Check if user purchased the product
        $hasPurchased = $user->orders()
        ->where('product_id', $product->id)
        ->where('status', 'paid')
        ->exists();
        
        if (! $hasPurchased) {
            abort(403, 'You have not purchased this product.');
        }
        
        $path = "docs/{$product->slug}.pdf";
        
        return Storage::disk('private')->response($path);
    }
}
