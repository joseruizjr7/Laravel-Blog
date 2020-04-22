<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $this->authorize('create', $user);

        $roles = Role::all();
        return view('admin.users.create', [
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $_user)
    {
        $this->authorize('create', $_user);

        $rules = [
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'password' => ['confirmed', 'min:8'],
        ];
        $params = [
            'name' => $rules['name'],
            'email' => $rules['email'],
            'password' => $rules['password'],
        ];

        $data = $request->validate($params);
        $user = User::create($data);
        $user->assignRole('Lector');
        

        return redirect(route('admin.users.index'))->withFlash('Usuario Actualizado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     * 
     */
    

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        if ($request->filled('password')) {
            $rules = [
                'name' => 'required',
                'email' => ['required', Rule::unique('users')->ignore($user->id)],
                'password' => ['confirmed', 'min:8'],
            ];
            $params = [
                'name' => $rules['name'],
                'email' => $rules['email'],
                'password' => $rules['password'],
            ];
        } else {
            $rules = [
                'name' => 'required',
                'email' => ['required', Rule::unique('users')->ignore($user->id)],
                /* 'password' => 'confirmed', 'min:8', */
            ];
            $params = [
                'name' => $rules['name'],
                'email' => $rules['email'],
            ];
        }

        $data = $request->validate($params);
        $user->update($data);

        return back()->withFlash('Usuario Actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index')->with('flash', 'El usuario ha sido eliminado correctamente.');
    }
}
