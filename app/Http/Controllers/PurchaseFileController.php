<?php  

// app/Http/Controllers/FileController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class PurchaseFileController extends Controller
{
    public function show($filename)
    {
        $user = auth()->user();

        // SECURITY: ensure user has purchased something that grants access
        $hasPurchased = $user->orders()
            ->where('status', 'paid')
            ->exists();

        if (! $hasPurchased) {
            abort(403, 'You have not purchased this product.');
        }

        $path = "docs/{$filename}";

        if (! Storage::disk('private')->exists($path)) {
            abort(404);
        }

        return Storage::disk('private')->response($path);
    }
}