<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:4',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $role = Role::create([
            'name' => $request->name,
        ]);
        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:4',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $role = Role::find($id);
        $role->update([
            'name' => $request->name,
        ]);
        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('role.index');
    }
}
