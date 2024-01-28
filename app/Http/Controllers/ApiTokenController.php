<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiTokenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Generate a Token
     */
    public function generate()
    {
        try {
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;
    
            return ['token' => $token];
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    public function authenticate(Request $request)
    {
        try {
            // Debugging statement
            dd('Reached authenticate method');
    
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
    
            // Debugging statement
            dd('Credentials validated');
    
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $user->createToken('api-token')->plainTextToken;
                $request->session()->regenerate();
                return ['token' => $token];
            }
    
            return back()->withErrors([
                'email' => 'Your provided credentials do not match in our records.',
            ])->onlyInput('email');
    
        } catch (\Exception $e) {
            // Debugging statement
            dd($e->getMessage());
        }

    }
}
