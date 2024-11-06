<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class UsersController extends Controller {
    public function index() {
        $users = User::all();

        return response()->json([
            "users" => $users
        ], 200);
    }

    public function update(Request $request, $userId) {
        $user = User::find($userId);

        if (!$user) {
            return response()->json([
                'error' => 'User not found'
            ], 404);
        }

        $data = $request->all();
        $user->fill($data);
        $user->save();

        return response()->json([
            'message' => 'User updated',
        ]);
    }

    public function show($userId) {
        $user = User::find($userId);

        if (!$user) {
            return response()->json([
                'error' => 'User not found'
            ], 404);
        }

        return response()->json(
            $user
        );
    }

    public function destroy($userId) {
        $user = User::find($userId);

        if (!$user) {
            return response()->json([
                'error' => 'User not found'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'message' => 'User deleted'
        ]);
    }

    public function updateRol(Request $request) {   
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'rol' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        if ($request->rol !== 'admin' && $request->rol !== 'user' && $request->rol !== 'guest') {
            return response()->json([
                'message' => 'Invalid rol'
            ], 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'error' => 'User not found'
            ], 404);
        }

        $data = $request->all();

        if ($user->rol === 'admin') {
            return response()->json([
                'message' => 'User is admin'
            ], 400);
        }

        $user->rol = $data['rol'];
        $user->save();

        return response()->json([
            'message' => 'User updated the new rol is ' . $user->rol 
        ]);
    }
}