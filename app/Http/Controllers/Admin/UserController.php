<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Models\Role;


class UserController extends Controller
{
    public function index()
    {
        // if (!Auth::user()->isAdmin()) abort(403);
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $roles_ids = $user->roles->pluck('id')->toArray();
        return view('admin.users.edit', compact('user', 'roles', 'roles_ids'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'nullable|exists:roles,id'
        ]);

        if (!$request->roles) $user->roles()->detach();
        else $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('alert-type', 'success')->with('alert-message', "Il ruolo dell'utente $user->name è stato modificato correttamente!");
    }
}
