<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $rules = [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
        
        if (config('captcha.enabled')){
            $rules['g-recaptcha-response'] = 'required';
        
            $request->validate($rules);
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
        }else{
            $request->validate($rules);
        }
            
        
        
        
        
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}


