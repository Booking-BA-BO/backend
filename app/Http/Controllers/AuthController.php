<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|max:255|unique:users,name',
            'kereszt_nev' => 'required|string|max:255',
            'vezetek_nev' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|string|min:1'
        ]);

        $fields['password'] = Hash::make($fields['password']);

        $user = User::create([
            'name' => $fields['name'],
            'kereszt_nev' => $fields['kereszt_nev'],
            'vezetek_nev' => $fields['vezetek_nev'],
            'email' => $fields['email'],
            'password' => $fields['password'],

        ]);

        $token = $user->createToken($request->name);

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken
        ]);
    }


    public function login(Request $request)
    {
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

    public function logout(Request $request)
    {
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

    public function changePassword(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return response()->json(['message' => 'Felhasználó nem található.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ], [
            'new_password.confirmed' => 'Az új jelszavak nem egyeznek.',
            'new_password.min' => 'Az új jelszónak legalább 8 karakter hosszúnak kell lennie.',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'A jelenlegi jelszó hibás.'], 403);
        }

        $user->password = Hash::make($request->new_password);
        $user->password_change = now();
        $user->save();

        return response()->json(['message' => 'Jelszó sikeresen megváltoztatva.'], 200);
    }

    public function endpointExists($endpoint)
    {
        return response()->json(
            User::where('egyeni_vegpont', $endpoint)->exists()
        );
    }


    public function uploadProfilePicture(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        
        $path = $request->file('image')->store('profile_pictures', 'public');

        
        if ($user->profile_picture && $user->profile_picture !== 'default.jpg') {
            Storage::disk('public')->delete($user->profile_picture);
        }

        
        $user->profile_picture = $path;
        $user->save();

        return response()->json(['message' => 'Profilkép feltöltve.', 'path' => $path]);
    }

    public function deleteProfilePicture(Request $request)
{
    $user = $request->user();

    
    if ($user->profile_picture && $user->profile_picture !== 'default.jpg') {
        Storage::disk('public')->delete($user->profile_picture);
    }

    
    $user->profile_picture = 'default.jpg';
    $user->save();

    return response()->json(['message' => 'Profilkép visszaállítva alapértelmezettre.']);
}
}
