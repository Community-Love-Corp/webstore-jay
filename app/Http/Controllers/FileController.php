<?php  

// app/Http/Controllers/FileController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function show(Product $product)
    {
        $user = auth()->user();

        $hasPurchased = $user->orders()
            ->where('product_id', $product->id)
            ->where('status', 'paid')
            ->exists();

        if (! $hasPurchased) {
            abort(403, 'You have not purchased this product.');
        }

        if (! $product->download_filename) {
            abort(404, 'No file configured for this product.');
        }

        $path = "products/{$product->download_filename}";

        if (! Storage::disk('private')->exists($path)) {
            abort(404, 'File not found.');
        }

        return Storage::disk('private')->response($path);
    }
}

