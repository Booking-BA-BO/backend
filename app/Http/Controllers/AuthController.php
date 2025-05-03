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

    //minden felhasználó minden adatát visszaadja:
    public function returnUser($egyeni_vegpont)
    {
        $data = DB::table('users')
            ->where('egyeni_vegpont', '=', $egyeni_vegpont)
            ->select('name', 'email')
            ->get();

        return $data;
    }

    public function modifyUserData(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        $validated = $request->validate([
            'name' => 'nullable|string',
            'vezetek_nev' => 'nullable|string|max:255',
            'kereszt_nev' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,' . $user_id,
            'telefon' => 'nullable|string|max:20',
        ]);

        $user->name = $validated['name'] ?? $user->name;
        $user->vezetek_nev = $validated['vezetek_nev'] ?? $user->vezetek_nev;
        $user->kereszt_nev = $validated['kereszt_nev'] ?? $user->kereszt_nev;
        $user->email = $validated['email'] ?? $user->email;
        $user->telefon = $validated['telefon'] ?? $user->telefon;

        $user->save();

        return response()->json([
            'message' => 'Felhasználói adatok sikeresen frissítve.',
            'user' => $user,
        ]);
    }
}
