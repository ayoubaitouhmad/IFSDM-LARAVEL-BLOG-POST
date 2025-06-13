<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Identifiers invalides'], 401);
        }

        $token = $user->createToken('token-personnel')->plainTextToken;

        return response()->json([
            'user'  => $user,
            'token' => $token,
        ]);
    }


    public function register(Request $request)
    {
        // 1. Validation
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => ['required','confirmed', Password::defaults()],
        ]);

        // 2. Création de l'utilisateur
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // 3. Génération d’un token Sanctum
        $token = $user->createToken('token-personnel')->plainTextToken;

        // 4. Réponse JSON
        return response()->json([
            'user'  => $user,
            'token' => $token,
        ], 201);
    }

    public function logout(Request $request)
    {
        // Révoquer le token actuel
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Déconnecté']);
    }
}
