<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TeamController extends Controller
{
    /**
     * Display the list of users excluding teamIT.
     */
    public function index(Request $request)
    {

        // Query pengguna berdasarkan email
        $users = User::where('usertype', '!=', 'teamIT')
            ->where('email', 'like', '%' . $request->email . '%')
            ->get();

        return view('team.dashboard', compact('users'));
    }


    /**
     * Update user role.
     */
    public function updateRole(Request $request, User $user)
    {
        // Validasi input
        $request->validate([
            'usertype' => 'required|in:admin,user,teamIT',
        ]);

        // Update role pengguna
        $user->usertype = $request->usertype;
        $user->save();

        // Redirect ke team.index dengan pesan sukses
        return redirect()->route('team.index')->with('success', 'User role updated successfully.');
    }
}
