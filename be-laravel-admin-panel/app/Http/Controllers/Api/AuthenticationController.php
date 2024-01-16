<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            // 'email' => 'required|email',
            'username' => 'required',
            'password' => 'required'
        ]);

        $role = Role::where('username', $request->username)->first();

        if (!$role || !Hash::check($request->password, $role->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $role->createToken('authToken')->plainTextToken;
    }

    public function logout(Request $request)
    {
        $role = $request->user();
        $role->currentAccessToken()->delete();
        return [
            'message' => "  '" . $role->username . "'" . ' logged out successfully  '
        ];
    }

    public function active()
    {
        $role = Auth::user();

        return response()->json([
            // 'data' => $role->,
            'data' => $role->username,
        ]);
    }
}