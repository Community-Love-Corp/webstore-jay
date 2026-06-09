<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::get('/dashboard', [ProductController::class, 'dashboard'])
->middleware(['auth', 'verified'])
->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    
Route::get('/', function () {
    return view('welcome');
});
    
//Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
//Only logged in users can view and comment
Route::post('/comment', [CommentController::class, 'store'])
->middleware(['auth', 'verified'])
->name('comment.store');
    
/*
 OLD DESIGN
 Route::view('/resilience', 'resilience');
 Route::view('/integrity', 'integrity');
 Route::view('/humanity', 'humanity');
 Route::view('/life', 'life');
 */

// Admin
//Route::get('/admin/pages/create', [PageController::class, 'create']);
//Route::post('/admin/pages', [PageController::class, 'store']);


    
//edit and update
//Route::get('/admin/pages/{page:slug}/edit', [PageController::class, 'edit'])->name('pages.edit');
//Route::put('/admin/pages/{page:slug}', [PageController::class, 'update'])->name('pages.update');
Route::middleware(['auth','verified','admin'])->prefix('admin')->group(function () {       
    Route::post('/upload-image', function (Request $request) {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('pages', 'public');
            $filename = basename($path);
            
            return response()->json([
                'location' => '{{IMAGE:' . $filename . '}}'
            ]);
        }
    });
        
    //upload media of type pdf, audio, video and image
    Route::post('/upload-media', function (Request $request) {
        if (!$request->hasFile('file')) {
            return back()->withInput()->with('uploaded', 'No file uploaded.');
        }
        
        $file = $request->file('file');
        $mime = $file->getClientMimeType();
        
        // IMAGE
        if (str_starts_with($mime, 'image/')) {
            $path = $file->store('pages', 'public');
            $filename = basename($path);
            return back()->withInput()->with('uploaded', '{{IMAGE:' . $filename . '}}');
        }
        
        // AUDIO
        if (in_array($mime, ['audio/mpeg', 'audio/mp3', 'audio/x-mp3'])) {
            $path = $file->store('audio', 'public');
            $filename = basename($path);
            return back()->withInput()->with('uploaded', '{{AUDIO:' . $filename . '}}');
        }
        
        // VIDEO
        if ($mime === 'video/mp4') {
            $path = $file->store('video', 'public');
            $filename = basename($path);
            return back()->withInput()->with('uploaded', '{{VIDEO:' . $filename . '}}');
        }
        
        // PDF
        if ($mime === 'application/pdf') {
            $path = $file->store('docs', 'public');
            $filename = basename($path);
            return back()->withInput()->with('uploaded', '{{PDF:' . $filename . '}}');
        }
        
        return back()->withInput()->with('uploaded', 'Unsupported file type: ' . $mime);
    });
    Route::post('/upload-purchase', function (Request $request) {
        //dd('ROUTE HIT', $request->all());
        if (! $request->hasFile('file')) {
            return back()->withInput()->with('uploaded', 'No file uploaded.');
        }
        
        $file   = $request->file('file');
        $mime   = $file->getClientMimeType();
        $slug   = $request->slug;
        
        // find product by slug
        $product = Product::where('slug', $slug)->firstOrFail();
        
        // generate safe filename (single file per product)
        $extension = $file->getClientOriginalExtension() ?: 'bin';
        $filename  = $slug . '.' . $extension;
        
        // store on private disk
        $path = $file->storeAs('products', $filename, 'private');
        
        // update product
        $product->download_filename = $filename;
        $product->save();
        
        // placeholder is now generic
        return back()->withInput()->with('uploaded', '{{FILE}}');
    });           
});

Route::middleware(['auth','verified'])->prefix('checkout')->group(function () {       
    //Route::get('/paypal', [PayPalController::class, 'create']);
    Route::post('/paypal/{product:slug}', [PayPalController::class, 'create'])
    ->name('paypal.create');
    Route::get('/paypal/return', [PayPalController::class, 'return']);
    Route::get('/paypal/cancel', [PayPalController::class, 'cancel']);
});
        
Route::middleware(['auth','verified','admin'])->prefix('admin/products')->group(function () {
    Route::get('/', [ProductAdminController::class, 'index'])->name('admin.products.index');
    Route::get('/create', [ProductAdminController::class, 'create'])->name('admin.products.create');
    Route::post('/', [ProductAdminController::class, 'store'])->name('admin.products.store');
    Route::get('/{product:slug}/edit', [ProductAdminController::class, 'edit'])->name('admin.products.edit');
    Route::put('/{product:slug}', [ProductAdminController::class, 'update'])->name('admin.products.update');
});
    

Route::middleware(['auth', 'verified', 'admin'])
->prefix('admin/pages')
->group(function () {
    Route::get('/create', [PageController::class, 'create'])->name('admin.pages.create');
    Route::post('/', [PageController::class, 'store'])->name('admin.pages.store');
    Route::get('/{page:slug}/edit', [PageController::class, 'edit'])->name('admin.pages.edit');
    Route::put('/{page:slug}', [PageController::class, 'update'])->name('admin.pages.update');
});    

// Frontend - must be the last route, as it is catchall
Route::get('/pages/{page:slug}', [PageController::class, 'show']);
Route::get('/products/{product:slug}', [ProductAdminController::class, 'show']);


Route::get('/file/{product:slug}', [FileController::class, 'show'])
->middleware('auth')
->name('file.show');

require __DIR__.'/auth.php';
