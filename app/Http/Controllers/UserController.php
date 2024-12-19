<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $users = User::with('roles')->get();
            return ResponseFormatter::success($users);
        }

        return view('pages.user.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:admin,superadmin'
        ]);

        // Create user
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign role
        $user->assignRole($request->role);

        return ResponseFormatter::success($user);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string|in:admin,superadmin'
        ]);

        // Update user
        $user = User::find($request->id);

        if ($request->password) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        // Sync role
        $user->syncRoles($request->role);

        return ResponseFormatter::success($user);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id'
        ]);

        // Delete user
        $user = User::find($request->id);

        // Remove role
        $user->removeRole($user->roles->first()->name);

        // Delete user
        $user->delete();

        return ResponseFormatter::success($user);
    }
}
