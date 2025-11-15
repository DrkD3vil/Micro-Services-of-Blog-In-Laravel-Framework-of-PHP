<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends Controller
{
    //Register
    public function register(Request $request): JsonResponse
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Return success response
        return response()->json([
            'status' => true,
            'message' => 'User registered successfully!',
            'user' => $user
        ], 201);
    }
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }




        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login successful!',
            'token' => $token,
            'user' => $user
        ], 200);


        if ($user->author_status == 'requested') {
            if ($user->author_status !== 'approved') {
                return response()->json([
                    'status' => true,
                    'message' => 'Your account is not approved by admin yet.',
                ], 201);
            }
        }
    }

    public function requestAuthor(Request $request): JsonResponse
    {
        $user = $request->user();

        if ($user->author_status === 'approved') {
            return response()->json([
                'status' => false,
                'message' => 'You are already an approved author.'
            ], 400);
        }

        if ($user->author_status === 'requested') {
            return response()->json([
                'status' => false,
                'message' => 'You have already requested author access. Wait for admin approval.'
            ], 400);
        }

        // Set as requested
        $user->author_status = 'requested';
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Author request submitted successfully. Wait for admin approval.'
        ], 200);
    }

    public function requestedAuthors(): JsonResponse
    {
        $this->authorizeAdmin();

        $pending = User::where('author_status', 'requested')->get();

        return response()->json($pending);
    }

    public function approveAuthor($id): JsonResponse
    {
        $this->authorizeAdmin();

        $user = User::findOrFail($id);
        $user->author_status = 'approved';
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Author approved successfully'
        ]);
    }

    public function authors(): JsonResponse
{
    // Optional: uncomment if you want only admins to access this
    // $this->authorizeAdmin();

    // Fetch only approved authors
    $approvedAuthors = User::where('author_status', 'approved')->get();

    return response()->json($approvedAuthors);
}

    private function authorizeAdmin()
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Unauthorized');
        }
    }


    public function me(Request $request): JsonResponse
    {
        return response()->json([
            'status' => true,
            'user' => Auth::user(),
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        // Get the authenticated user
        $user = Auth::user();

        if ($user) {
            // Revoke current access token
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'status' => true,
                'message' => 'Logged out successfully.',
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'User not authenticated.',
        ], 401);
    }

    public function users(Request $request): JsonResponse
    {
        // Check if the authenticated user is admin
        if ($request->user()->is_admin) {
            $users = User::all();

            return response()->json([
                'status' => true,
                'message' => 'Users fetched successfully',
                'data' => $users
            ], 200);
        }

        // If not admin, return unauthorized
        return response()->json([
            'status' => false,
            'message' => 'You are not authorized to view users.',
        ], 403);
    }
}
