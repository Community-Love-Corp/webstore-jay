<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }
        
        
        $captcha = $request->input('g-recaptcha-response');
        
        
        
        $verify = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            
            'secret' => config('services.recaptcha.secret'),
            
            'response' => $captcha,
            
        ]);
        
        
        
        if (!($verify->json()['success'] ?? false)) {
            
            return back()
            
            ->withInput()
            
            ->with('captcha_error', 'Please complete the CAPTCHA test.');
            
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('dashboard', absolute: false));
    }
}
