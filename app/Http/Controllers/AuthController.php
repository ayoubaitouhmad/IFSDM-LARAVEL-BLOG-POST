<?php
namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $user = User::where('email', $request->email)->first();
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
            'name'     => 'required|string|max:255',    // Required, must be string, max 255 chars
            'email'    => 'required|email|unique:users,email',    // Required, must be valid email, must be unique
            'password' => ['required', 'confirmed', 'min:8'],     // Required, must be confirmed, min 8 chars
        ]);

        $role = Role::where('name', 'admin')->first();
        // 2. Create user
        $user = User::create([
            'name'     => $data['name'],
            'username'     => $data['name'],
            'email'    => $data['email'],
            'role_id'    => $role->id,
            'password' => Hash::make($data['password']),
        ]);

        // 3. Generate Sanctum token
        $token = $user->createToken('token-personnel')->plainTextToken;

        // 4. JSON response
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
