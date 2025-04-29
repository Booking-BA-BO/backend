<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|string|min:1'
        ]);
    
        // Jelszó hashelése
        $fields['password'] = Hash::make($fields['password']);
    
        // Felhasználó létrehozása
        $user = User::create($fields);
    
        // Token generálása
        /* $token = $user->createToken('auth_token')->plainTextToken; */
        $token = $user->createToken($request->name);
    
        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken
        ]/* , 201 */);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return ['errors' => ['email' => ['Hibás bejelentkezés.']]];
        }

        $token = $user->createToken($user->name);
    
        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken
        ]/* , 201 */);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return ['message' => 'Kijelentkezett'];
    }
}
