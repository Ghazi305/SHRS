<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
   public function showLoginForm()
   {
     return view('admin.login');
   }
  
  public function showRegisterForm()
   {
     return view('admin.register');
   }
    
   public function register(Request $request)
    {
      $request->validate([
         'name' => 'required|string',
         'email' => 'required|string|email',
         'phone' => 'required|string|min:10',
         'password' => 'required|string|min:8|confirmed',
        ]);
         
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        auth()->login($user);
        return redirect('/dashboard');
    }
    
    public function login(Request $request)
    {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();
    if (!$user) {
        throw ValidationException::withMessages([
            'email' => __('البريد الإلكتروني غير موجود.'),
        ]);
    }
    
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }
    throw ValidationException::withMessages([
        'password' => __('كلمة المرور غير صحيحة.'),
    ]);
}
 
    public function logout(Request $request)
    {
      Auth::logout();
 
      $request->session()->invalidate();
 
      $request->session()->regenerateToken();
 
      return redirect('/admin/login');
    }
}
