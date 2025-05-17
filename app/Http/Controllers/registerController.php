<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
   
    public function index(): View
    {
        return view('Auth.register');
    }

   
    public function create()
    {
        

    }

  
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
 
        return redirect()->route('login')
            ->withSuccess('Registration successful! Please login.');
    }

   
    public function show(User $user)
    {
        
    }

    public function edit(User $user)
    {
        
    }

   
    public function update(Request $request, User $user)
    {
        
    }

  
    public function destroy(User $user)
    {
        
    }
}


