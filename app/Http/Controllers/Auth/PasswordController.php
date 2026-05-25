<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
        
        
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

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }
}
