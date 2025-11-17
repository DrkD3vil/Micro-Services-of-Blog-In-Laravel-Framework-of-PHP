<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    //
    // Show request form
    public function showRequestForm()
    {
        return view('adminBackend.author.request-author');
    }

    // User requests author access
    public function requestAuthor(Request $request)
    {
        $user = Auth::user();

        if ($user->author_status === 'approved') {
            return back()->with('error', 'You are already an approved author.');
        }

        if ($user->author_status === 'requested') {
            return back()->with('error', 'You already sent a request. Wait for admin approval.');
        }

        $user->author_status = 'requested';
        $user->save();

        return back()->with('success', 'Your request has been submitted. Wait for admin approval.');
    }


    // Admin: Show requested authors
    public function requestedAuthors()
    {
        $pending = User::where('author_status', 'requested')->get();
        return view('adminBackend.author.requested-authors', compact('pending'));
    }

    // Admin approve user
    public function approveAuthor($id)
    {
        $user = User::findOrFail($id);
        $user->author_status = 'approved';
        $user->save();

        return back()->with('success', 'Author approved successfully.');
    }

    // Admin: Show approved authors
    public function authors()
    {
        $authors = User::where('author_status', 'approved')->get();
        return view('adminBackend.author.authors', compact('authors'));
    }
}
