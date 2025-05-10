<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class Register extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:128',
            'lastName' => 'required|string|max:128',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
    
        $user = User::create([
            'firstName' => $validated['firstName'],
            'lastName'  => $validated['lastName'],
            'email'     => $validated['email'],
            'password'  => bcrypt($validated['password']),
            'administrador' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return response()->json([
            'message' => 'Usuário registrado com sucesso!',
            'user' => $user
        ], 201);
    }
}
