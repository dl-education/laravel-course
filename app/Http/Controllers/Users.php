<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\RolesSave as RolesSaveRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class Users extends Controller
{

    public function index()
    {
        return view('users.index', ['users' => User::all()]);
    }


    public function editRoles($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::orderBy('name')->pluck('name', 'id');
        return view("users.roles-edit", compact('user', 'roles'));
    }

    public function updateRoles(RolesSaveRequest $request, $id)
    {
        $data = $request->validated();
        $user = User::findOrFail($id);
        $user->roles()->sync($data['roles']);
        return redirect()->route('users.index');
    }
}
