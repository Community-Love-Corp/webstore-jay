<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Controllers;
use Illuminate\Support\Facades\Http;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name'    => 'required|string|max:255',
            'comment' => 'required|string',
            'source'  => 'required|string',
            'g-recaptcha-response' => 'required'
        ]);

        // Validate reCAPTCHA
        $secret = config('services.recaptcha.secret');
        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret'   => $secret,
                'response' => $request['g-recaptcha-response'],
                'remoteip' => $request->ip(),
            ]
        );

        if (!$response->json('success')) {
            return back()->with('captcha_error', 'Captcha failed. Please try again.')
                         ->withInput();
        }

        // Save comment
        Comment::create([
            'source_page' => $request->source,
            'name'        => e($request->name),
            'comment'     => e($request->comment),
        ]);

        return redirect()->back();
    }
}
?>