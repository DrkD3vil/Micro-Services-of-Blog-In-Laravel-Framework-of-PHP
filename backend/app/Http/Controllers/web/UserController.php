<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    //
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('adminBackend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('adminBackend.users.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'role' => 'nullable|string|max:100',
            'author_status' => 'boolean',
            'is_admin' => 'boolean',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('users', 'public');
        }

        // Generate UUID
        $validated['uuid'] = Str::uuid();
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified user.
     */
public function show(User $user)
{
    return view('adminBackend.users.show', compact('user'));
}

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        return view('adminBackend.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'role' => 'nullable|string|max:100',
            'author_status' => 'boolean',
            'is_admin' => 'boolean',
            'more_info' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $validated['image'] = $request->file('image')->store('users', 'public');
        }

        $user->update($validated);

        return redirect()->route('admin.users.show', $user)
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        // Prevent admin from deleting themselves
        if ($user->id === Auth::id()) {
            return redirect()->back()
                ->with('error', 'You cannot delete your own account.');
        }

        // Delete user image if exists
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }

    /**
     * Impersonate a user
     */
    public function impersonate(User $user)
    {
        // Prevent admin from impersonating themselves
        if ($user->id === Auth::id()) {
            return redirect()->back()
                ->with('error', 'You cannot impersonate yourself.');
        }

        auth()->user()->impersonate($user);

        return redirect()->route('home')
            ->with('success', "You are now impersonating {$user->name}.");
    }

    /**
     * Reset user password
     */
    public function resetPassword(User $user)
    {
        $tempPassword = Str::random(12);
        $user->update([
            'password' => Hash::make($tempPassword)
        ]);

        // Here you would typically send an email with the temp password
        // For now, we'll just show it (in real application, remove this)
        return redirect()->back()
            ->with('success', "Password reset successfully. Temporary password: {$tempPassword}")
            ->with('temp_password', $tempPassword); // Remove this in production
    }

    /**
     * Verify user email
     */
    public function verifyEmail(User $user)
    {
        $user->update([
            'email_verified_at' => now()
        ]);

        return redirect()->back()
            ->with('success', 'Email verified successfully.');
    }

    /**
     * Unverify user email
     */
    public function unverifyEmail(User $user)
    {
        $user->update([
            'email_verified_at' => null
        ]);

        return redirect()->back()
            ->with('success', 'Email unverified successfully.');
    }

    /**
     * Make user admin
     */
    public function makeAdmin(User $user)
    {
        $user->update([
            'is_admin' => true
        ]);

        return redirect()->back()
            ->with('success', 'User promoted to admin successfully.');
    }

    /**
     * Remove admin privileges
     */
    public function removeAdmin(User $user)
    {
        // Prevent admin from removing their own admin privileges
        if ($user->id === Auth::id()) {
            return redirect()->back()
                ->with('error', 'You cannot remove your own admin privileges.');
        }

        $user->update([
            'is_admin' => false
        ]);

        return redirect()->back()
            ->with('success', 'Admin privileges removed successfully.');
    }

}
