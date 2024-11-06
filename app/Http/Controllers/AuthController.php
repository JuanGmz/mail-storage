<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

use App\Models\User;
use App\Mail\Activacion;
use App\Mail\Notificacion;

class AuthController extends Controller {
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        if ($user->id === 1) {
            $user->rol = 'admin';
            $user->save();
        }

        $url = URL::temporarySignedRoute('activate', now()->addMinutes(5), ['user' => $user->id]);

        Mail::to($user->email)->send(new Activacion($user, $url));

        return response()->json([
            'message' => 'User created successfully, check your email to activate your account'
        ], 200);
    }
    public function login(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $user = User::where('email', $data['email'])->first();

        if (!$user || !password_verify($data['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }
    
        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ], 401);
        }

        if (!$user->is_active) {
            return response()->json([
                'message' => 'Account not activated',
            ], 401);
        }

        $token = $user->createToken('Access Token')->plainTextToken;

        return response()->json([
            'token' => $token
        ], 200);
    }

    public function activate($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        if ($user->is_active) {
            return response()->json([
                'message' => 'Account already activated'
            ], 200);
        }

        $user->is_active = true;
        
        $user->save();

        $admin = User::where('rol', 'admin')->first();

        if (!$admin) {
            return response()->json([
                'message' => 'Admin not found'
            ], 404);
        }

        Mail::to($admin->email)->send(new Notificacion($user));

        return response()->json([
            'message' => 'Account activated successfully',
        ], 200);
    }

    public function resendActivation(Request $request) {
        $data = $request->all();

        $validate = Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors());
        }

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $url = URL::temporarySignedRoute('activate', now()->addMinutes(5), ['user' => $user->id]);

        $activarCuenta = new Activacion($user, $url);

        Mail::to($user->email)->send($activarCuenta);

        return response()->json([
            'message' => 'Check your email to activate your account',
        ]);
    }
}