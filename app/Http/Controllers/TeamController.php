<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'teamIT');
        })
            ->where('email', 'like', '%' . $request->email . '%')
            ->get();

        return view('team.dashboard', compact('users'));
    }


    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,user,teamIT',
        ]);

        // Update role pengguna
        $user->syncRoles([$request->role]);

        // Redirect dengan pesan sukses
        return redirect()->route('team')->with('success', 'User role updated successfully.');
    }
}
